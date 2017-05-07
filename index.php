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
    <style type="text/css">
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }
        .panelBtn {
            width: 50%;
        }
        .ui-datepicker {
            z-index:1051 !important;
            top:50% !important;
        }
        #home {
            background-color: grey;
            height: 100%;
            width: 100%;
            position: relative;
        }
        #calendar {
            background-color: black;
            background-image: url(/assets/images/milkyway.jpg);
            height: 100%;
            width: 100%;
            text-align: center;
        }
        #contact {
            background-color: rgb(51, 255, 119);
            height: 100%;
            width: 100%;
        }
        #panel {
            background-color: rgb(102, 224, 255);
            height: 100%;
            width: 100%;
        }
        #calendar-container {
            background-color: white;
            text-align: center;
            width: 400px;
            margin: auto;
        }
        .parallax-text {
            z-index: 1;
        }
        .title {
            font-family: 'accidental_presidency';
			font-size: 6em;
			color: white;
			text-align: center;
			padding-top: 60px;
        }
        .text {
			color: white;
			font-size: 24px;
			text-align: center;
			margin-left: 20px;
		    margin-right: 20px;
        }
        .mesh-1, .mesh-2 {
            height: 200%;
            width: 100%;
            background-image: url(/assets/images/honeycomb.png);
        }
        .mesh-2 {
            background-size: 15.6vw,9vw;
            background-position: 71.2% 28%;
            opacity: 0.18;
        }
        .mesh-1 {
            background-size: 17.4vw,10vw;
            background-position: 70% 30%;
            opacity: 0.25;
        }
        .parallax-element {
            position: absolute;
            -webkit-transform-origin: center center;
            transform-origin: center center;
        }
        .parallax-group {
            position: relative;
            left: 0px;
            top: 0px;
            height: 100%;
            transform-style: preserve-3d;
        }
        @font-face {
    		font-family: 'accidental_presidency';
    		src: url('assets/fonts/accidentalpresidency-webfont.eot');
    		src: url('assets/fonts/accidentalpresidency-webfont.eot?#iefix') format('embedded-opentype'),
    	         url('assets/fonts/accidentalpresidency-webfont.woff2') format('woff2'),
    		     url('assets/fonts/accidentalpresidency-webfont.woff') format('woff'),
    	         url('assets/fonts/accidentalpresidency-webfont.ttf') format('truetype'),
    		     url('assets/fonts/accidentalpresidency-webfont.svg#arnold_boecklin_stdregular') format('svg');
   			font-weight: normal;
			font-style: normal;
		}
		.navbar-nav {
            float: right;
        }
        .menu-icon {
            display: none;
            margin-top: 5px;
            margin-right: 20px;
            float: right;
        }
        .bar1, .bar2, .bar3 {
            width: 35px;
            height: 5px;
            background-color: #333;
            margin: 6px 0;
            transition: 0.4s;
        }   

        /* Rotate first bar */
        .change .bar1 {
            -webkit-transform: rotate(-45deg) translate(-9px, 6px) ;
            transform: rotate(-45deg) translate(-9px, 6px) ;
        }

        /* Fade out the second bar */
        .change .bar2 {
            opacity: 0;
        }

        /* Rotate last bar */
        .change .bar3 {
            -webkit-transform: rotate(45deg) translate(-8px, -8px) ;
            transform: rotate(45deg) translate(-8px, -8px) ;
        }
        
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 15px;
            border: 1px solid #888;
            width: 85%; /* Could be more or less, depending on screen size */
            height: 85%;
        }
        .modal-content-small {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 15px;
            border: 1px solid #888;
            text-align: center;
            font-weight: 18px;
            width: 20%; /* Could be more or less, depending on screen size */
            height: 20%;
        }
        .close {
            color: #aaa;
            font-size: 28px;
            float: right;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .back {
            color: #ededed;
            font-size: 28px;
            font-weight: bold;
            display: none;
        }
        .back:hover,
        .back:focus {
            color: #7f7f7f;
            text-decoration: none;
            cursor: pointer;
        }
        .btn {
            border: none;
        }
        .btn-primary {
            color: #ffffff;
            background-color: #60fff1;
        }
        .btn-primary:hover {
            color: #ffffff;
            background-color: #49c6bb;
        }
        .btn-primary:focus {
            color: #ffffff;
            background-color: #49c6bb;
        }
        .btn-primary:active {
            color: #ffffff;
            background-color: #31827a;
        }
        .btn-secondary {
            color: #ffffff;
            background-color: #f4415f;
        }
        .btn-secondary:hover {
            color: #ffffff;
            background-color: #9b293d;
        }
        .btn-secondary:focus {
            color: #ffffff;
            background-color: #9b293d;
        }
        .btn-secondary:active {
            color: #ffffff;
            background-color: #44121b;
        }
        .vertical-center {
            min-height: 100%;
            display: flex;
            align-items: center;
        }
        input[type=text], input[type=password]{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 3px solid #ccc;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            outline: none;
        }
        #loginForm input[type=text]:focus, #loginForm input[type=password]:focus {
            border: 3px solid #60fff1;
        }
        #registerForm input[type=text]:focus, #registerForm input[type=password]:focus {
            border: 3px solid #f4415f;
        }
        #addEventForm input[type=text]:focus, #loginForm input[type=password]:focus {
            border: 3px solid #ffc61a;
        }
        input[type='checkbox'] {
            position: relative;
            left: -9999px;
        }
        input[type="checkbox"] + label span {
            display:inline-block;
            width:19px;
            height:19px;
            margin:-2px 10px 0 0;
            vertical-align:middle;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            cursor:pointer;
        }
        #loginForm input[type='checkbox'] + label span {
            background: #60fff1;
            border: 3px solid #49c6bb;
        }
        #loginForm input[type='checkbox']:checked + label span {
            background: #49c6bb;
            border: 3px solid #31827a;
            border-radius: 50%;
        }
        #registerForm input[type='checkbox'] + label span {
            background: #f4415f;
            border: 3px solid #9b293d;
        }
        #registerForm input[type='checkbox']:checked + label span {
            background: #9b293d;
            border: 3px solid #44121b;
            border-radius: 50%;
        }
        .navbar-login {
            float: left;
            height: 50px;
            padding: 15px 15px;
            font-size: 18px;
            line-height: 20px;
            color: rgb(254,68,56);
        }
		@media (max-width: 767px) {
		    .panelBtn {
                width: 90%;
            }
		    .navbar-contents {
		        margin-left: 20px;
		        margin-right: 20px;
		    }
		    #calendar-container {
                width: 95%;
            }
            .text {
                font-size: 16px;
            }
            #menu-items {
                display:none;
                text-align: center;
                margin-left: 15px;
            }
            .menu-icon {
                display: inline-block;
            }
            .navbar-nav {
                float: none;
            }
            .title {
                padding-top: 30px;
            }
            .home-br {
                display: none;;
            }
            .vertical-center {
                min-height: 100%;
                display: block;
                align-items: default;
                padding-top: 25%;
            }
            .mobile-btn-spacing {
                padding-top: 10px;
            }
            @media screen and (orientation: landscape) {
                body, html {
                    height: 100vw;
                }
                #home {
                    height: 100vh;
                }
                #calendar {
                    height: 100vw;
                }
                #contact {
                    height: 100vw;
                }
                #panel {
                    height: 100vw;
                }
            }
            .modal {
               left: 0 !important;
               top: 0 !important;
               right: 0 !important;
            }
            .modal-content-small {
                width: 95%; /* Could be more or less, depending on screen size */
            }
            .navbar-login {
                float: none;
                height: default;
                padding: default;
                font-size: default;
                line-height: default;
                color: rgb(254,68,56);
            }
		}
    </style>
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
      					<div class="menu-icon" onclick="toggleMenu(this)">
  							<div class="bar1"></div>
  							<div class="bar2"></div>
  							<div class="bar3"></div>
						</div>
    				</div>
    				<div id="menu-items">
    					<ul class="nav navbar-nav" style="margin-right: 0;">
    						<?php if(isset($_SESSION['user'])) { ?>
      							<li id="loginText" class="navbar-login"><?php echo htmlspecialchars($_SESSION['user']['name']) ?></li>
      						<?php } else if(http_response_code() != 200) { ?>
      						    <li class="navbar-login"><?php echo $postResponse ?></li>
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
      					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam facilisis, nisl id scelerisque tempus, arcu eros aliquam dui, a fermentum mi felis vitae arcu. Praesent accumsan ipsum id tortor accumsan malesuada. Ut nec est finibus, convallis risus ut, suscipit eros.
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
    $(document).ready(function () {
        $(document).on("scroll", onScroll);
        
        //smoothscroll
        $('a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            $(document).off("scroll");
            
            $('a').each(function () {
                $(this).parent().removeClass('active');
            })
            $(this).parent().addClass('active');
          
            var target = this.hash,
                menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top+2
            }, 500, 'swing', function () {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        });
    });

    function onScroll(event){
        var scrollPos = $(document).scrollTop();
        $('#menu-items a').each(function () {
            var currLink = $(this);
            if($(currLink.attr("href"))) {
                var refElement = $(currLink.attr("href"));
                if(typeof(refElement.position()) == 'undefined') return;
                if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                    $('#menu-item ul li').removeClass("active");
                    currLink.parent().addClass("active");
                }
                else{
                    currLink.parent().removeClass("active");
                }
            }
        });
    }

    var images1 = document.querySelectorAll('.parallax-image1');
    var images2 = document.querySelectorAll('.parallax-image2');
	
    function setTopOffset(image, offset) {
      var imageHeight = image.offsetHeight;
      var containerHeight = image.parentNode.offsetHeight;
      var pageHeight = document.documentElement.clientHeight;
      var imageDistance = imageHeight - containerHeight;
      var containerTop = image.parentNode.getBoundingClientRect().top;
      var distancePercent = 0;
      var offsetTop = 0;

      if (containerTop >= pageHeight) {
        distancePercent = 0;
      } else if (containerTop <= -containerHeight) {
        distancePercent = 1;
      } else {
        distancePercent = (containerTop + containerHeight) / (pageHeight + containerHeight);
      }

      offsetTop = distancePercent * imageDistance * offset;
      if(/Mobi/.test(navigator.userAgent) && $('#menu-items').is(":visible")) {
          image.style.transform = 'translate3d(0,' + offsetTop - 10 + 'px, 0)';
      } else {
          image.style.transform = 'translate3d(0,' + offsetTop + 'px, 0)';
      }
    }

    function updateImages() {
      [].forEach.call(images1, function(item) {
          setTopOffset(item, -1)
      });
      [].forEach.call(images2, function(item) {
          setTopOffset(item, -1.3)
      });
    }

    function animate() {
      requestAnimationFrame(animate);
      updateImages();
    }

    animate();

    //Calendar
    var eventModal = document.getElementById('eventModal');
    var openEvent = function(event) {
        eventModal.style.display = "block";
        $('#existingEventTitle').html(event[0]);
        $('#existingEventTitle').attr('href', event[1]);
	}

	var events = <?php echo $events ?>;
	var settings = {
		EventClick: function(content) { openEvent(content); },
	    EventTargetWholeDay: true
	};
	var element = document.getElementById('calendar-container');
	caleandar(element, events, settings);

	function toggleMenu(menu) {
	    menu.classList.toggle("change");
		if($('#menu-items').is(":visible")) {
		    $('#menu-items').hide();
		}
		else {
		    $('#menu-items').show();
		}
	}

	var modal = document.getElementById('myModal');

	$('#back').click( function( ) {
		back();
	});
	$('#close').click( function( ) {
		close();
	});
	$('#closeEvent').click( function() {
		closeEvent();
	});
	$('#closeAddEvent').click( function() {
		closeAddEvent();
	});
	$('#closeChangeUsers').click( function() {
		closeChangeUsers();
	});

	function close() {
	    modal.style.display = "none";
	}

	function closeEvent() {
	    eventModal.style.display = "none";
	}

	function closeChangeUsers() {
	    changeUsersModal.style.display = "none";
	}

	function closeAddEvent() {
	    addEventModal.style.display = "none";
	}

	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	    else if (event.target == eventModal) {
	        eventModal.style.display = "none";
	    }
	}
	
	function openLoginModal() {
	    modal.style.display = "block";
	}
	
	function back() {
	    $("#buttons").fadeIn(3000);
	    $("#loginForm").fadeOut();
	    $("#registerForm").fadeOut();
	    $("#back").fadeOut();
	}

	function registerFadeIn() {
	    $("#buttons").fadeOut();
	    $("#registerForm").fadeIn(3000);
	    $("#back").fadeIn(3000);
	}

	function loginFadeIn() {
	    $("#buttons").fadeOut();
	    $("#loginForm").fadeIn(3000);
	    $("#back").fadeIn(3000);
	}

	function logout() {
	    $("#logout").submit();
	}

	//add events
	$('#eventDate').datepicker({
	      format: "dd-mm-yyyy",
	      todayBtn: "linked",
	      autoclose: true,
	      todayHighlight: true,
	      container: '#addEventModal modal-content modal-body'
	    });
	var submitDisabled = true;
	var numEvents = 0;
	var events = [];
	var event;
	var addEventModal = document.getElementById("addEventModal");
	function openAddEventsModal() {
	    addEventModal.style.display = "block";
	}

	$('#addEvent').click( function() {
		event = {};
		event.date = $("#eventDate").datepicker('getDate');
		event.title = $("#eventTitle").val();
		event.link = $("#eventLink").val();
		events.push(event);
		numEvents++;
		$("#eventTitle").val('');
		$("#eventLink").val('');
		$("#eventCounter").html(numEvents);
		if(submitDisabled) {
			$("#submitEvents").removeAttr("disabled");
			$("#eventCounterContainer").show();
			submitDisabled = false;
		}
	});

	$('#submitEvents').click( function() {
		if($("#eventsValue")) {
			if(events) {
				$("#eventsValue").val(JSON.stringify(events));
				$("#addEventsForm").submit();
			}
		}
		else {
			closeAddEvents();
		}
	});

	//change users
	var numChanges = 0;
	var changes = [];
	var change;
	var submitUserDisabled = true;
	
	var changeUsersModal = document.getElementById("changeUsersModal");
	function openChangeUserRolesModal() {
	    changeUsersModal.style.display = "block";
	}

	$('#addUser').click( function() {
		change = {};
		change.id = $("#userList").val();
		change.role = $("#roleList").val();
		changes.push(change);
		numChanges++;
		$("#userCounter").html(numChanges);
		if(submitUserDisabled) {
			$("#submitUsers").removeAttr("disabled");
			$("#userCounterContainer").show();
			submitUserDisabled = false;
		}
	});

	$('#submitUsers').click( function() {
		if($("#userChanges")) {
			if(events) {
				$("#userChanges").val(JSON.stringify(changes));
				$("#changeUsersForm").submit();
			}
		}
		else {
			closeChangeUsers();
		}
	});
    </script>
  </body>
</html>