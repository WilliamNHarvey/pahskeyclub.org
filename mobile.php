<?php header("Content-Type: text/html; charset=ISO-8859-1"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Key Club</title>
    <link rel="shortcut icon" href="http://www.pahskeyclub.org/favicon.ico" />
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
        .full-width {
            padding-right: -20px;
            padding-left: -20px;
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
            background-color: green;
            height: 100%;
            width: 100%;
        }
        #resources {
            background-color: red;
            height: 100%;
            width: 100%;
        }
        #calendar-container {
            background-color: white;
            text-align: center;
            width: 400px;
            margin: auto;
        }
        .title {
            font-family: 'accidental_presidency';
			font-size: 6em;
			color: white;
			text-align: center;
        }
        .text {
			color: white;
			font-size: 24px;
			text-align: center;
			margin: 20px 100px 20px 100px;
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
		@media (max-width: 767px) {
		  .navbar-contents {
		      margin-left: 20px;
		  }
		}
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

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
    				</div>
    				<div id="menu-items">
    					<ul class="nav navbar-nav">
          					<li class="active"><a href="#home">About Us</a></li>
          					<li><a href="#calendar">Calendar</a></li>
          					<li><a href="#contact">Contact</a></li>
          					<li><a href="#resources">Resources</a></li>
        				</ul>
        			</div>
  				</div>
      		</nav>
      		<div id="home" style="display:block; z-index: -2;">
      			<div class="title">
      				</br>
      				About Us
      			</div>
      			<div class="text">
      				test
      			</div>
      		</div>
			<div id="calendar" style="text-align:center;">
				</br>
				<div class="title">
					Calendar
				</div>
			</div>
			<div id="contact">
				<div class="text-center">
					<div class="title">
						Contact Us
					</div>
					<br>
					<br>
					<div class="col-md-4" style="text-align: center;">
  						<img id="facebook" onclick='window.open("https://www.facebook.com/pakeyclub")' src="/assets/images/links/fb-art.png" alt="Facebook Logo" height='100px'></img>
					</div>
          			<div class="col-md-4" style="text-align: center;">
  						<img id="twitter" onclick='window.open("https://twitter.com/pakeyclub")' src="/assets/images/links/twitter-icon-9.png" alt="Twitter Logo" height='100px'></img>
          			</div>
         			<div class="col-md-4" style="text-align: center;">
  						<img id="youtube" onclick='window.open("https://www.youtube.com/user/pakeyclubintl")' src="/assets/images/links/YouTube-icon-full_color.png" alt="YouTube Logo" height='100px'></img>
					</div>
				</div>
			</div>
			<div id="resources">
				
			</div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery-3.1.0.js"></script>
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
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('#menu-item ul li').removeClass("active");
                currLink.parent().addClass("active");
            }
            else{
                currLink.parent().removeClass("active");
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
      image.style.transform = 'translate3d(0,' + offsetTop + 'px, 0)';
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
    var events = [
  		{'Date': new Date(2017, 0, 4), 'Title': 'Doctor appointment at 3:25pm.'},
  		{'Date': new Date(2017, 1, 5), 'Title': 'New Garfield movie comes out!', 'Link': 'https://garfield.com'},
  		{'Date': new Date(2017, 2, 9), 'Title': '25 year anniversary', 'Link': 'https://www.google.com.au/#q=anniversary+gifts'},
	];
	var settings = {};
	var element = document.getElementById('calendar-container');
	caleandar(element, events, settings);
    </script>
  </body>
</html>