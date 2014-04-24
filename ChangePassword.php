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

require_once 'connection.php';

    $uname = $_SESSION['usr'];
    $uname = stripslashes($uname);
    $uname = mysql_real_escape_string($uname);
    
    $result = mysql_query("SELECT * FROM members WHERE username = '$uname'");
    $nameAdmin = mysql_fetch_row($result);

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/Admin.css"/>
	<link rel="stylesheet" type="text/css" href="css/Form.css"/>
	<link rel="stylesheet" type="text/css" href="css/iframe.css"/>
	<link rel="stylesheet" type="text/css" href="css/search1.css" />
	<link rel="stylesheet" type="text/css" href="css/search2.css" />
	<link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
	<link rel="stylesheet" type="text/css" href="css/signup.css"/>
	<script src="js/modernizr.custom.js"></script>

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
	<section class="sidebar">
		<div class="imagebox"><img src='<?php echo $nameAdmin[6];?>' width="180" height="180"></div>
		
		<div class="seperatorinbox" style="position: absolute;  top: 230px;  left: 12px;"></div>
		<div class="sidebartext" style=" position: absolute;  top: 231px;  left: 40px; text-align: center; padding-left: 0px; width: 140px;"><?php echo $nameAdmin[1]." ".$nameAdmin[2]; ?></div>

		<div class="seperatorinbox" style="position: absolute;  top: 270px;  left: 12px;"></div>
		
		<div class="seperatorinbox" style="position: absolute;  top: 330px;  left: 12px;"></div>
		
		<a href="Notifications_Admin.html" style="text-decoration: none">	
			<img src="images/notification.png" width="15" height="15" style="position: absolute; top: 305px; left: 25px;">
			<div class="sidebartext" style=" position: absolute;  top: 291px;  left: 40px;">Notifications</div>
		</a>
		
		<div class="seperatorinbox" style="position: absolute;  top: 370px;  left: 12px;"></div>
		
		<a href="Approvals.html" style="text-decoration: none" >
			<img src="images/approval.png" width="15" height="15" style="position: absolute; top: 346px; left: 24px;">
			<div class="sidebartext" style=" position: absolute;  top: 331px;  left: 40px;">Approvals</div>
		</a>
		
		<div class="seperatorinbox" style="position: absolute;  top: 410px;  left: 12px;"></div>
		
		<a href="View_history.html" style="text-decoration: none" >
			<img src="images/viewhistory.png" width="15" height="15" style="position: absolute; top: 385px; left: 24px;">
			<div class="sidebartext" style=" position: absolute;  top: 371px;  left: 40px;">View History</div>
		</a>	
		
		<a href="Settings.html" style="text-decoration: none">
   			<img src="images/settings.png" width="15" height="15" style="position: absolute; top: 425px; left: 23px;">
   			<div class="sidebartext" style=" position: absolute;  top: 411px;  left: 40px;">Settings</div>
   		</a>
   		
	</section>
	<button class="logout" onClick="javascript:window.location.href ='logout.php'">Logout</button>
</body>

</html>