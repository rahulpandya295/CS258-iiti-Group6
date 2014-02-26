<?php
	session_start();
	if(isset($_SESSION['isLoggedIn'])){
			header('location: checkField.php');
		}
	if(!empty($_GET['status']) && isset($_SESSION['isLoggedOut'])){
         	$alert_msg = base64_decode(urldecode($_GET['status']));
			unset($_SESSION['isLoggedOut']);
   			echo "<script type='text/javascript'>alert('$alert_msg')</script>";
	}
	if(isset($_SESSION['wrongPassword'])){
			unset($_SESSION['wrongPassword']);
			echo "<script type='text/javascript'>alert('Invalid Credentials')</script>";
		}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
</head>

<body>

	<div class="introBar">
		<div class="introHead1">SICDOC</div>
		<div class="introHead2"><a href="http://iiti.ac.in/sic/"><font color="FFFFFF">Sophisticated Instrumentation Lab</font></a></div>
	</div>
	<section class="loginbox">
		<div class="logintext">Log In</div>
		<form method="post" action="login.php" >
			<input type="text" required title="Username required" placeholder="Username" data-icon="U" id="uname" name="uname">
       		<input type="password" required title="Password required" placeholder="Password" data-icon="x" id="pword" name="pword">	
       		<div class="submit"><input type="submit" name="commit" value="Login"></div>
       		<div class="seperator"></div>
      		<button class="f_password">Sign Up</button>
		</form>
	</section>
	<div class="login-help">
   		<a style="text-decoration: none" href="index.html">Forgot your password?</a>
   	</div>
</body>

</html>
