<?php
require_once 'connection.php';
	session_start();

	if(isset($_SESSION['nameDel'])){
		$nameDel = $_SESSION['nameDel'];
		echo "<script type='text/javascript'>alert('" . $nameDel . " has been successfully removed from the database.')</script>";
		unset($_SESSION['nameDel']);
	}

	if(isset($_SESSION['errorDeletion'])){
		echo "<script type='text/javascript'>alert('Error deleting this user.')</script>";		
		unset($_SESSION['errorDeletion']);
	}

	if(isset($_SESSION['successSignUp'])){
		echo "<script type='text/javascript'>alert('User successfully added.')</script>";		
		unset($_SESSION['successSignUp']);
	}

    if(isset($_SESSION['errorSignUp'])){
		echo "<script type='text/javascript'>alert('There was a problem adding a new user.')</script>";		
		unset($_SESSION['errorSignUp']);
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
	<script src="js/modernizr.custom.js"></script>
</head>

<body>
	<!--Header Bar-->
	<div class="introBar">
		<div class="introHead1"><a href="Login_form.php" style="text-decoration: none; color: #FFF;">SICDOC</a></div>
	    <div class="introHead2" style="left: 1200px;"><a href="http://iiti.ac.in/SIC/" style="text-decoration: none; color: #FFF;">Sophisticated Instrumentation Lab</a></div>
			

		<div style="position: relative; top: 17px; left: 250px;">
	    		<form class="search" action="Search.php" method="POST">
				  <input type="search" placeholder="Search here..." required>
				  <button type="submit">Search</button>
				</form>   
		</div>

	</div>
	<!--End of Header Bar-->

	<!--Settings Contents-->
	<form action="settings_verify.php" method="POST" style="position: absolute; top: 55px; left: 45px;">
		<section class="container">
			<img src="images/settings.png" width="25" height="25" style="position: absolute; top: 55px; left: 45px;">
			<h1>&nbsp&nbsp&nbspSettings</h1>
			<div class="seperator" style="position: absolute; left: 40px; top: 100px;  width: 500px;"></div>
			<div class="Operation" style="width: 350px; left: 70px;">Select Operation: </div>
			<select name="select" id="select" class="input_pulldown" style="position: absolute; top:150px; left:230px;" >
 					<option value="0">Select action</option><option value="1">Add User</option><option value="2" >Remove User</option><option value="3">Change Password</option>
			</select>
			<input type="password" required title="Password required" placeholder="Admin Password" data-icon="x" id="pword" name="pword" style="position: absolute; top: 250px; left: 55px; height: 50px;">
			<div class="submit"><input type="submit" name="commit" value="Submit" style="position: absolute; top: 380px; left: 65px;"></div>
		</section>
	</form>
	<!--End of Settings Contents-->

	<!--SideBar Contents-->
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
		
		<div class="seperatorinbox" style="position: absolute;  top: 450px;  left: 12px;"></div>

		<a href="Settings.html" style="text-decoration: none">
   			<img src="images/settings.png" width="15" height="15" style="position: absolute; top: 425px; left: 23px;">
   			<div class="sidebartext" style=" position: absolute;  top: 411px;  left: 40px;">Settings</div>
   		</a>
   		

   		<a href="sliderGallery/Slider/index.html" style="text-decoration: none">
   			<img src="images/notification_blue.png" width="15" height="15" style="position: absolute; top: 465px; left: 23px;">
   			<div class="sidebartext" style=" position: absolute;  top: 451px;  left: 40px;">Gallery</div>
   		</a>


	</section>

	<!--End of Sidebar Content-->
	<button class="logout" onClick="javascript:window.location.href ='logout.php'">Logout</button>

</body>

</html>