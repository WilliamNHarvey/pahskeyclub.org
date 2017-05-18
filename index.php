<?php header("Content-Type: text/html; charset=ISO-8859-1"); ?>
<?php include __DIR__.'/assets/Zk8zafW4f/internal_api.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Key Club</title>
    <link rel="shortcut icon" href="http://www.pahskeyclub.org/favicon.ico" />
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
	<meta property="og:image" content="http://www.pahskeyclub.org/assets/images/serene.jpg"/>
	<META name="description" content="PAHS Key Club Site">
	<META name="keywords" content="PAHS, key, club, pennsylvania, high, school">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="William Harvey">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/calendar/theme2.css">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>
	<!--<div class="span6">
    	<div class="flex-video widescreen"><iframe src="https://www.youtube-nocookie.com/embed/..." frameborder="0" allowfullscreen=""></iframe></div>
 	</div>-->
 	<body>
      		<nav class="navbar navbar-inverse navbar-fixed-top" style="margin: 0;">
      			<div class="container container-fluid navbar-contents">
    				<div class="navbar-header">
      					<a class="navbar-brand" href="/">PAHS Key Club</a>
                        <?php if(isset($_SESSION['user'])) { ?>
                            <div id="loginText" class="mobile-only navbar-login"><?php echo htmlspecialchars($_SESSION['user']['name']) ?></div>
                        <?php } else if(http_response_code() != 200) { ?>
                            <div class="mobile-only navbar-login"><?php echo $postResponse ?></div>
                        <?php } ?>
      					<div class="menu-icon" onclick="toggleMenu(this)">
  							<div class="bar1"></div>
  							<div class="bar2"></div>
  							<div class="bar3"></div>
						</div>
    				</div>
    				<div id="menu-items">
    					<ul class="nav navbar-nav" style="margin-right: 0;">
    						<?php if(isset($_SESSION['user'])) { ?>
      							<li id="loginText" class="web-only navbar-login"><?php echo htmlspecialchars($_SESSION['user']['name']) ?></li>
      						<?php } else if(http_response_code() != 200) { ?>
      						    <li class="web-only navbar-login"><?php echo $postResponse ?></li>
      						<?php } ?>
          					<li class="active"><a href="#home">About Us</a></li>
          					<li><a href="#calendar">Calendar</a></li>
          					<li><a href="#contact">Contact</a></li>
          					<?php if(isset($_SESSION['user']) && getUserRoleId($_SESSION['user']['role']) >= 3) { ?>
      							<li><a href="#panel">Administration</a></li>
      						<?php }
          					if(isset($_SESSION['user'])) { ?>
          						<li><a onclick='logout()' style="cursor: pointer;">Logout</a></li>
      						<?php } else { ?>
      						    <li><a onclick='openLoginModal()' style="cursor: pointer;">Login/Register</a></li>
      						<?php } ?>
        				</ul>
        			</div>
  				</div>
      		</nav>
      			
      		<div id="home" style="display:block; z-index: -2;">
      			<div class="home-body">
      				<div class="title">
      					<br class="home-br">
      					About Us
      				</div>
      				<div class="text">
      					Key Club is an international student-led organization that provides its members with opportunities to perform service, build character, and develop leadership. With over 270,000 members from approximately 5,000 clubs in 30 countries, the organization is unique because a local Kiwanis club, composed of the leading business and professional people of the community, sponsors a local Key Club. In addition, Key Club not only functions on a local level, but also on a district (state) and international level as well. The Pennsylvania District, chartered in 1947, has over 12,000 members with over 200 clubs.
     				</div>
      			</div>
     			<div class="parallax-group" style="z-index: -1;">
      				<div class="mesh-1 parallax-element parallax-image1"></div>
      				<div class="mesh-2 parallax-element parallax-image2"></div>
      			</div>
      		</div>
			<div id="calendar" style="text-align:center;">
				<div class="title">
					Calendar
				</div>
				<div id="calendar-container"></div>
			</div>
			<div id="contact">
				<div class="text-center">
					<div class="title">
						Contact Us
					</div>
					<br>
					<br>
					<div class="col-md-4" style="text-align: center;">
  						<img id="facebook" onclick='window.open("https://www.facebook.com/PittstonAreaKeyClub")' src="/assets/images/links/fb-art.png" alt="Facebook Logo" height='100px'></img>
					</div>
          			<div class="col-md-4" style="text-align: center;">
  						<img id="twitter" onclick='window.open("https://twitter.com/pakeyclub")' src="/assets/images/links/twitter-icon-9.png" alt="Twitter Logo" height='100px'></img>
          			</div>
         			<div class="col-md-4" style="text-align: center;">
  						<img id="youtube" onclick='window.open("https://www.youtube.com/user/pakeyclubintl")' src="/assets/images/links/YouTube-icon-full_color.png" alt="YouTube Logo" height='100px'></img>
					</div>
				</div>
			</div>
			<?php if(isset($_SESSION['user']) && getUserRoleId($_SESSION['user']['role']) >= 3) { ?>
      			<div id="panel">
      				<div class="text-center">
						<div class="title">
							Administration
						</div>
						</br>
						</br>
      					<div class="col-sm-12">
      						<button class="panelBtn btn btn-primary btn-lg" onclick="openChangeUserRolesModal()">Change user roles</button>
      						</br>
      						</br>
							<button class="panelBtn btn btn-secondary btn-lg" onclick="openAddEventsModal()">Add events</button>
      					</div>
      				</div>
				</div>
      		<?php } ?>
			
    <div id="myModal" class="modal">
		<div class="modal-content">
			<div class="row-fluid modal-header">
				<span id="back" style="position: absolute; top: 23px; left: 25px;" class="back">&lsaquo;</span>
				<span id="close" class="close">&times;</span>
			</div>
      		<div id="buttons" class="modal-body vertical-center">
      			<div class="col-sm-3"></div>
      			<div class="col-sm-3">
      				<button type="button" class="btn btn-secondary btn-block btn-lg" onclick="registerFadeIn()">Register</button>
      			</div>
      			<div class="mobile-btn-spacing"></div>
      			<div class="col-sm-3">
      				<button type="button" class="btn btn-primary btn-block btn-lg" onclick="loginFadeIn()">Login</button>
      			</div>
      			<div class="col-sm-3"></div>
      		</div>
      		<div id="loginForm" style="display:none" class="modal-body text-center vertical-center">
      			<div class="col-sm-3"></div>
      			<div class="col-sm-6">
      				<form action="" method="post">
    					<input type="text" placeholder="Enter Username" name="username" required>
    					<input type="password" placeholder="Enter Password" name="password" required>
    					<input type="hidden" name="login">
    					<button class="btn btn-primary btn-block btn-lg" type="submit">Login</button>
    					<input type="checkbox" id="loginCheck" name="remember" />
    					<label for="loginCheck"><span></span>Stay logged in</label>
					</form>
      			</div>
      			<div class="col-sm-3"></div>
      		</div>
      		<div id="registerForm" style="display:none" class="modal-body text-center vertical-center">
      			<div class="col-sm-3"></div>
      			<div class="col-sm-6">
      				<form action="" method="post">
    					<input type="text" placeholder="Enter Username" name="username" required>
    					<input type="password" placeholder="Enter Password" name="password" required>
    					<input type="hidden" name="register">
    					<button class="btn btn-secondary btn-block btn-lg" type="submit">Register</button>
    					<input type="checkbox" id="registerCheck" name="remember" />
    					<label for="registerCheck"><span></span>Stay logged in</label>
					</form>
      			</div>
      			<div class="col-sm-3"></div>
      		</div>
      	</div>
    </div>

    <div id="eventModal" class="modal">
		<div class="modal-content-small">
			<div class="row-fluid modal-header">
				<span id="closeEvent" class="close">&times;</span>
			</div>
      		<div class="modal-body">
      			<div class="col-sm-3"></div>
      			<div class="col-sm-6 text-center">
      				<a id="existingEventTitle"></a>
      			</div>
      			<div class="col-sm-3"></div>
      		</div>
      	</div>
    </div>

    <?php if(isset($_SESSION['user']) && getUserRoleId($_SESSION['user']['role']) >= 3) { ?>
    <div id="addEventModal" class="modal">
		<div class="modal-content">
			<div class="row-fluid modal-header">
				<span id="closeAddEvent" class="close">&times;</span>
			</div>
      		<div id="addEventForm" class="modal-body text-center vertical-center">
      				<div class="col-sm-3"></div>
      				<div class="col-sm-6">
      					<input type="text" id="eventDate" class="required-field" maxlength="10" placeholder="dd/mm/yyyy (required)" autocomplete="off">
      					<input id="eventTitle" type="text" class="required-field" placeholder="Title (required)" maxlength="50">
      					<input id="eventLink" type="text" placeholder="Link" maxlength="255">
      					<button id="addEvent" class="btn btn-primary btn-block btn-lg">Add This Event</button>
      					<button id="submitEvents" disabled="disabled" class="btn btn-secondary btn-block btn-lg">Submit Events</button>
      					<p id="eventCounterContainer" style="display: none">Events added: <span id="eventCounter"></span></p>
      				</div>
      				<div class="col-sm-3"></div>
      		</div>
      	</div>
	</div>
    <div id="changeUsersModal" class="modal">
		<div class="modal-content">
			<div class="row-fluid modal-header">
				<span id="closeChangeUsers" class="close">&times;</span>
			</div>
      		<div id="addEventForm" class="modal-body text-center vertical-center">
      				<div class="col-sm-3"></div>
      				<div class="col-sm-6">
      					Member: <?php echo $userlist ?>
      					
      					Role: <?php echo $rolelist ?>
      					</br>
      					</br>
      					<button id="addUser" class="btn btn-primary btn-block btn-lg">Change This User</button>
      					<button id="submitUsers" disabled="disabled" class="btn btn-secondary btn-block btn-lg">Submit Changes</button>
      					<p id="userCounterContainer" style="display: none">Users changed: <span id="userCounter"></span></p>
      				</div>
      				<div class="col-sm-3"></div>
      		</div>
      	</div>
	</div>
	<form id="addEventsForm" action="/authenticate" method="post">
    	<input type="hidden" name="addEvent">
    	<input id="auth_token" type="hidden" name="auth" value="<?php echo $_SESSION['user']['auth_token'] ?>">
    	<input type="hidden" name="events" id="eventsValue">
    </form>
    <form id="changeUsersForm" action="/authenticate" method="post">
   		<input type="hidden" name="changeUsers">
   		<input id="auth_token" type="hidden" name="auth" value="<?php echo $_SESSION['user']['auth_token'] ?>">
   		<input type="hidden" name="users" id="userChanges">
   	</form>
	<?php } ?>

    <form id="logout" action="" method="post">
    	<input type="hidden" name="logout">
    </form>
    
    <?php if(isset($_SESSION['user']) && getUserRoleId($_SESSION['user']['role']) >= 3) { ?>
    	
    <?php } ?>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery-3.1.0.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--  <script src="../assets/js/jquery-ui.js"></script>-->
    <script src="../assets/js/transition.js"></script>
    <script src="../assets/js/alert.js"></script>
    <script src="../assets/js/modal.js"></script>
    <script src="../assets/js/dropdown.js"></script>
    <script src="../assets/js/scrollspy.js"></script>
    <script src="../assets/js/tab.js"></script>
    <script src="../assets/js/tooltip.js"></script>
    <script src="../assets/js/popover.js"></script>
    <script src="../assets/js/button.js"></script>
    <script src="../assets/js/collapse.js"></script>
    <script src="../assets/js/carousel.js"></script>
    <script src="../assets/js/typeahead.js"></script>
    <script src="../assets/js/calendar/caleandar.js"></script>
    <script>
    var events = <?php echo $events ?>;
    
    </script>
    <script src="../assets/js/scripts.js"></script>
  </body>
</html>