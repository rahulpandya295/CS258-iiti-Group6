<?php
	session_start();

	if(isset($_SESSION['successSignUp'])){
		session_destroy();
		echo "<script type='text/javascript'>alert('Successful SignUp!')</script>";
	}

	if(isset($_SESSION['pwChangeSuccess'])){
		session_destroy();
		echo "<script type='text/javascript'>alert('Password successfully changed!')</script>";	
	}

	if(isset($_SESSION['invalid_login'])){
		session_destroy();
		echo "<script type='text/javascript'>alert('Invalid Login!')</script>";
	}

	if(!empty($_GET['status']) && isset($_SESSION['isLoggedOut'])){
         	$alert_msg = base64_decode(urldecode($_GET['status']));
			session_destroy();
   			echo "<script type='text/javascript'>alert('$alert_msg')</script>";
	}
	
	if(isset($_SESSION['wrongPassword'])){
			session_destroy();
			echo "<script type='text/javascript'>alert('Invalid Credentials')</script>";
		}

	if(isset($_SESSION['pwReset'])){
			session_destroy();
			echo "<script type='text/javascript'>alert('Successful Password reset done! Please check your inbox for new password.')</script>";
		}

	if(isset($_SESSION['noUserFound'])){
			session_destroy();
			echo "<script type='text/javascript'>alert('No such User exist in the database!')</script>";
	}

	if(isset($_SESSION['isLoggedIn'])){
			header('location: checkField.php');
	}

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
</head>

<body>
<!--
	<div class="introBar">
		<div class="introHead1">SICDOC</div>
		<div class="introHead2"><a href="http://iiti.ac.in/sic/"><font color="#FFFFFF">Sophisticated Instrumentation Lab</font></a></div>
	</div>
	<section class="loginbox">
		<div class="logintext">Log In</div>
		<form method="post" action="login.php" >
			<input type="text" required title="Username required" placeholder="Username" data-icon="U" id="uname" name="uname" style="height: 30px;">
       		<input type="password" required title="Password required" placeholder="Password" data-icon="x" id="pword" name="pword">	
       		<div class="submit"><input type="submit" name="commit" value="Login"></div>
       		
       		<div class="seperator"></div>
      		
      		<button class="f_password" type="button" onclick="window.location.href = 'signUp.php'">Sign Up</button>
			
			
			<section class="flat">
            	<button type="button" onclick="window.location.href = 'signUp.html'" style="position: relative; top: 140px; left: 45px;">Sign Up</button>
        	</section>
		
		</form>
	</section>
	<div class="login-help">
   		<a style="text-decoration: none" href="forgotPsWord.html">Forgot your password?</a>
   	</div>

-->
	<div class="introBar" style="background-color: #34495e;">
		<div class="introHead1">SICDOC</div>
		<div class="introHead2" style="left: 1200px;"><a href="http://iiti.ac.in/SIC/" style="text-decoration: none; color: #FFF;">Sophisticated Instrumentation Lab</a></div>
	</div>
	
	<section class="loginbox" style="position: fixed; height: 250px; width: 600px">
		<div class="logintext" style="position: absolute; top: 1px;">LOGIN</div>
		<form method="post" action="login.php" >
			<input style=" position: absolute; top: 95px; left: 40px;" type="text" required title="Username required" placeholder="Username" data-icon="U" id="uname" name="uname">
       		<input style=" position: absolute; top: 95px; left: 310px;" type="password" required title="Password required" placeholder="**********" data-icon="x" id="pword" name="pword">	
       		<div class="submit" style=" position: absolute; top: 137px; left: 140px;"><input type="submit" name="commit" value="Login"></div>
       		<div class="seperator" style="position: absolute; top: 170px; left: 55px; width: 510px;"></div>
      		
		</form>
	</section>
	<div class="login-help" style="position: fixed; top: 435px; left: 780px;">
   		<a style="text-decoration: none; color: #2c3e50" href="forgotPsWord.html"><strong>Forgot your password?</strong></a>
   	</div>

</body>

</html>