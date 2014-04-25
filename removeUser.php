<?php
require_once 'connection.php';

	session_start();

    $uname = $_SESSION['usr'];
    $uname = stripslashes($uname);
    $uname = mysql_real_escape_string($uname);
    
    $result = mysql_query("SELECT * FROM members WHERE username = '$uname'");
    $nameAdmin = mysql_fetch_row($result);
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/Form1.css"/>
	<link rel="stylesheet" type="text/css" href="css/signup.css"/>
	<link rel="stylesheet" type="text/css" href="css/forgotPw.css"/>
	<link rel="stylesheet" type="text/css" href="css/Admin.css"/>
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

	<!--Delete User-->
	<section class="pwResetbox" style="left: 180px;">
		<div class="resetText">Delete User</div>
		<div class="seperatorS"></div>
		
	<form method="POST" action="removeUserMysql.php" enctype="multipart/form-data">

		<input type="text" style="width:330px; position: absolute; top: 192px; left: 50px; height: 50px;" required title="Username required" placeholder="Username" data-icon="N" id="name" name="uname">
		<input type="password" required title="Admin Password" placeholder="Admin Password" data-icon="x" id="adminpword" name="adminpword" style="position: absolute; top: 275px; left: 50px; height: 50px; width: 330px;">

		<input type="submit" name="submit" value="Submit" style="position: absolute; top: 390px; left: 220px;">
	</form>
	</section>
	<!--End of Delte User-->

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