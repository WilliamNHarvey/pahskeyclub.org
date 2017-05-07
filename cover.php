<?php
header("Content-Type: text/html; charset=ISO-8859-1");

?>
<html>
	<head>
		<link rel="shortcut icon" href="http://www.pahskeyclub.org/favicon.ico" />
		<meta property="og:image" content="http://www.pahskeyclub.org/assets/images/serene.jpg"/>
		<META name="description" content="PAHS Key Club Site">
		<META name="keywords" content="PAHS, key, club, pennsylvania, high, school">
		<title>PAHS Key Club</title>
		<style>
			body {
				background: rgba(0,0,0,1);
				margin: 0;
				height: 100%;
				background-repeat:no-repeat;
				background-size:cover;
			}
		</style>
		<style>
			html {
    			background-image: url("/assets/images/serene.jpg");
    			background-repeat:no-repeat;
				/* background-size: 100% 100%; */
				background-size: cover;
			}
		</style>
		<style type="text/css">
			#centered_div{ 
				font-family: 'accidental_presidency';
    			margin-right: -50%;
				font-size: 12em;
				color: white;
				opacity: 0;
				-moz-user-select: -moz-none;
 				-khtml-user-select: none;
				-webkit-user-select: none;
				-o-user-select: none;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				cursor: default;
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
		</style>
	</head>
	<body>
		<div id="centered_div" class='default'> 
			<span>Coming Soon</span>
		</div>
		<script>
			var opacityBg = 1;
			var visibility;
			var text;
			window.onload = function(){ visibility = setInterval("toVisible();", 50); }
			function toVisible(){
				if(opacityBg > 0.1) {
					document.body.style.background = "rgba(0,0,0,"+opacityBg+")";
				}else clearInterval(visibility);

				if(opacityBg < 0.8) text = setInterval("greet()", 100);
				opacityBg -= opacityBg * 0.02;
			}
			var opacityGr = 0.01;
			function greet(){
				if(opacityGr < 1) document.getElementById('centered_div').style.opacity = opacityGr;
				else clearInterval(text);
	
				opacityGr += opacityGr * 0.025;
			}
		</script>
	</body>
</html>