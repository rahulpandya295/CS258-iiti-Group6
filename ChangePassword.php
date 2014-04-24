<?php
	session_start();

	if(isset($_SESSION['pwChangeError'])){
		if($_SESSION['pwChangeError'] == 1){
			echo "<script type='text/javascript'>alert('Please try again!')</script>";	
		}
		else{
			echo "<script type='text/javascript'>alert('Wrong Password!')</script>";
		}
		unset($_SESSION['pwChangeError']);
	}

	if(isset($_SESSION['pwUnmatch'])){
		echo "<script type='text/javascript'>alert('Password did not match!')</script>";
		unset($_SESSION['pwUnmatch']);
	}

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
	<link rel="stylesheet" type="text/css" href="css/iframe.css"/>
	<link rel="stylesheet" type="text/css" href="css/Signup.css"/>

</head>

<body>

	<div class="introBar">
		<div class="introHead1">SICDOC</div>
		<div class="introHead2">Sophisticated Instrumentation Lab</div>
	</div>
	<div style="position: absolute; top: 100px; left:100px;">
	<section class="container">
		<img src="images/sexperiment.png" width="25" height="25" style="position: absolute; top: 55px; left: 45px;">
		<h1 style="width: 300px;">Change Password</h1>
		<div class="seperator" style="position: absolute; left: 40px; top: 100px;  width: 500px;"></div>
		
		<form method="POST" action="ChangePwMysql.php" enctype="multipart/form-data">
			<input type="password" required title="Current Password" placeholder="Current Password" data-icon="x" id="oldPw" name="oldPw" style="position: absolute; top: 150px; left: 30px;">
			<input type="password" required title="New Password" placeholder="New Password" data-icon="y" id="newPw" name="newPw" style="position: absolute; top: 220px; left: 30px;">
			<input type="password" required title="Confirm Password" placeholder="Confirm New Password" data-icon="z" id="confirmPw" name="confirmPw" style="position: absolute; top: 220px; left: 300px;">
			<div class="submit">
			<input type="submit" name="commit" value="Submit" style="position: absolute; top: 350px; left: 65px;"></div>
		</form>
	</section>
	</div>
</body>

</html>