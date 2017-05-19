<?php
session_start();
include_once __DIR__.'/dbconnect.php';
global $roleMap;
global $con;
$roles = $con->prepare("SELECT * FROM user_roles");
$roles->execute();
$roleMap = query_results($roles);
$roles->close();
$eventQuery = $con->prepare("SELECT * FROM events");
$eventQuery->execute();
$eventList = query_results($eventQuery);
$eventQuery->close();
$events = '[';
foreach($eventList as $singleEvent) {
    $date = explode("-", $singleEvent['date']);
    $events .= "{'Date': new Date(".$date[0].",".($date[1] - 1).",".$date[2]."), 'Title': '".$singleEvent['title']."'";
    if($singleEvent['link']) {
        $events .= ", 'Link': '".$singleEvent['link']."'";
    }
    $events .= "},";
}
$events .= "]";

if(isset($_COOKIE["pahskeyclub_rememberme"])) {
    $loginUser = json_decode($_COOKIE["pahskeyclub_rememberme"], true);
    cookieLogin($loginUser);
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['register'])) {
        //register
        $postResponse = register();
    }
    else if(isset($_POST['login'])) {
        //login
        $postResponse = login();
    }
    else if(isset($_POST['logout'])) {
        //logout
        $postResponse = logout();
    }
    else if(isset($_POST['addEvent'])) {
        //add an event
        $postResponse = addEvents();
    }
    else if(isset($_POST['changeUsers'])) {
        //change user roles
        $postResponse = changeUsers();
    }
}

$users = getUsers();
if($users) {
    $userlist = '<select id="userList">';
    foreach($users as $user)
    {
        $userlist .= '<option value="' . htmlspecialchars($user['id']) . '">'
            . htmlspecialchars($user['username'])
            . '</option>';
    }
    $userlist .= '</select>';
    $rolelist = '<select id="roleList">';
    $rolelist .= '<option value="1">User</option><option value="2">Member</option><option value="3">Officer</option>';
    if(getUserRoleId($_SESSION["user"]["role"]) == 4) { //webmaster
        $rolelist .= '<option value="4">Webmaster</option>';
    }
    $rolelist .= '</select>';
}

function register() {
    global $con;
    if(!isset($_POST['username']) || !isset($_POST['password'])) {
        http_response_code(400);
        return 'Fill all fields';
    }
    $query = $con->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param('s', $_POST['username']);
    $query->execute();
    $results = query_results($query);
    $query->close();
    $num_rows = sizeof($results);
    if($num_rows > 0) {
        http_response_code(400);
        return 'Username exists';
    }
    else if(strlen($_POST['username']) > 16) {
        http_response_code(400);
        return 'Username too long';
    }
    else if(preg_match('/[^a-zA-Z0-9_]/', $_POST['username']) == 0) {
        http_response_code(400);
        return 'Invalid characters';
    }
    else {
        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $auth_token = bin2hex(openssl_random_pseudo_bytes(16));
        $remember_token = password_hash(bin2hex(openssl_random_pseudo_bytes(16)), PASSWORD_DEFAULT);
        $role = 'user';
        $user = $con->prepare("INSERT INTO users (username, password, role, auth_token, remember_token) VALUES (?, ?, ?, ?, ?)");
        $user->bind_param('sssss', $_POST['username'], $passwordHash, $role, $auth_token, $remember_token);
        $user->execute();
        login();
    }
}

function login() {
    global $con;
    if(!isset($_POST['username']) || !isset($_POST['password'])) {
        http_response_code(400);
        return 'Fill all fields';
    }
    $query = $con->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param('s', $_POST['username']);
    $query->execute();
    $results = query_results($query);
    $query->close();
    $num_rows = sizeof($results);
    if($num_rows <= 0) {
        http_response_code(400);
        return 'Username doesn\'t exist';
    }
    else if(strlen($_POST['username']) > 16) {
        http_response_code(400);
        return 'Username too long';
    }
    else if(preg_match('/[^a-zA-Z0-9_]/', $_POST['username']) == 0) {
        http_response_code(400);
        return 'Invalid characters';
    }
    else {
        $userData = $results[0];
        if(password_verify($_POST['password'], $userData['password'])) {
            $_SESSION['user'] = array(
                    'id' => $userData['id'],
                    'name' => $userData['username'],
                    'role' => $userData['role'],
                    'auth_token' => $userData['auth_token'],
                    'login' => 'login'
            );
            if(isset($_POST['remember']) && $_POST['remember'] == true) {
                $rememberArray = [$userData['username'], $userData['remember_token']];
                setcookie("pahskeyclub_rememberme", json_encode($rememberArray), time() + (7 * 24 * 60 * 60), '/');
            }
            http_response_code(200);
            return 'Login successful';
        }
        else {
            http_response_code(400);
            return 'Wrong password';
        }
    }
}

function cookieLogin($login) {
    global $con;
    $query = $con->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param('s', $login[0]);
    $query->execute();
    $results = query_results($query);
    $query->close();
    $num_rows = sizeof($results);
    if($num_rows > 0) {
        $userData = $results[0];
        if($login[1] === $userData['remember_token']) {
            $_SESSION['user'] = array(
                    'id' => $userData['id'],
                    'name' => $userData['username'],
                    'role' => $userData['role'],
                    'auth_token' => $userData['auth_token'],
                    'login' => 'login'
            );
            $remember_token = password_hash(bin2hex(openssl_random_pseudo_bytes(16)), PASSWORD_DEFAULT);
            $update = $con->prepare("UPDATE users SET remember_token=? WHERE id=?");
            $update->bind_param('ss', $remember_token, $userData['id']);
            $update->execute();
            $update->close();
            $rememberArray = [$userData['username'], $remember_token];
            setcookie("pahskeyclub_rememberme", json_encode($rememberArray), time() + (7 * 24 * 60 * 60), '/');
        }
    }
}

function logout() {
    unset($_SESSION['user']);
    setcookie("pahskeyclub_rememberme", '', time() - 1, '/');
    http_response_code(200);
    return 'Logout successful';
}

function getUsers() {
    global $con;
    if(!isset($_SESSION["user"]) || getUserRoleId($_SESSION["user"]["role"]) < 3) {
        return [];
    }
    else if(getUserRoleId($_SESSION["user"]["role"]) == 3) { //admin
        $userQuery = $con->prepare("SELECT * FROM users WHERE role='user' || role='member'");
        $userQuery->execute();
        $users = query_results($userQuery);
        $userQuery->close();
    }
    else if(getUserRoleId($_SESSION["user"]["role"]) >= 4) { //webmaster
        $userQuery = $con->prepare("SELECT * FROM users WHERE role='user' || role='member' || role='admin'");
        $userQuery->execute();
        $users = query_results($userQuery);
        $userQuery->close();
    }

    return $users;
}

function addEvents() {
    global $con;
    $events = json_decode($_POST['events']);
    if(!isset($_SESSION["user"]) || getUserRoleId($_SESSION["user"]["role"]) < 3 || $_SESSION['user']['auth_token'] != $_POST['auth']) {
        redirect('/');
    }

    foreach($events as $event) {
        $dateObj = new DateTime($event->date);
        $date = $dateObj->format('Y-m-d');
        $query = $con->prepare("INSERT INTO events (date, title, link, user) VALUES (?, ?, ?, ?)");
        $query->bind_param('sssi', $date, $event->title, $event->link, $_SESSION['user']['id']);
        $query->execute();
        $query->close();
    }
    redirect('/');
}

function changeUsers() {
    global $con;
    $users = json_decode($_POST['users']);
    if(!isset($_SESSION["user"]) || getUserRoleId($_SESSION["user"]["role"]) < 3 || $_SESSION['user']['auth_token'] != $_POST['auth']) {
        redirect('/');
    }

    foreach($users as $user) {
        if($user->role <= $_SESSION["user"]["role"]) {
            $currentQuery = $con->prepare("SELECT * FROM users WHERE id=?");
            $currentQuery->bind_param('s', $user->id);
            $currentQuery->execute();
            $current = query_results($currentQuery);
            $currentQuery->close();
            if(getUserRoleId($current[0]['role']) < getUserRoleId($_SESSION["user"]["role"])) {
                $update = $con->prepare("UPDATE users SET role=? WHERE id=?");
                $update->bind_param('ss', getUserRoleSlug($user->role), $user->id);
                $update->execute();
                $update->close();
            }
        }
    }
    redirect('/');
}

function query_results($query) {
    $meta = $query->result_metadata();
    
    while ($field = $meta->fetch_field()) {
        $parameters[] = &$row[$field->name];
    }
    
    call_user_func_array(array($query, 'bind_result'), $parameters);
    $results = [];
    while ($query->fetch()) {
        foreach($row as $key => $val) {
            $x[$key] = $val;
        }
        $results[] = $x;
    }
    
    return $results;
}

function getUserRoleId($userRole) {
    global $roleMap;
    foreach($roleMap as $role) {
        if($role['slug'] == $userRole) return $role['id'];
    }
}

function getUserRoleSlug($userRole) {
    global $roleMap;
    foreach($roleMap as $role) {
        if($role['id'] == $userRole) return $role['slug'];
    }
}

function redirect($url, $permanent = false) {
    if($permanent) {
        header('HTTP/1.1 301 Moved Permanently');
    }
    header('Location: '.$url);
    exit();
}