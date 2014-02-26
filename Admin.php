<?php 
	session_start();
	if($_SESSION['isLoggedIn']!=1){
		session_destroy();
    	header("location: Login_form.php");
    }
?>


<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
	<link rel="stylesheet" type="text/css" href="css/Admin.css"/>
	<script>
		
	</script>
</head>

<body>

	<div class="introBar">
		<div class="introHead1">SICDOC</div>
		<div class="introHead2"><a href="http://iiti.ac.in/sic/"><font color="FFFFFF">Sophisticated Instrumentation Lab</font></a></div>
	</div>

	<iframe src="home.html" name="home" style="position: absolute; top: 70px; left: 0px; width: 1090px; height: 500px;" scrolling="no"; seamless;></iframe>
	<iframe src="notifications.html" name="notifications" style="position: absolute; top: 70px; left: 0px; width: 1090px; height: 500px;" scrolling="no"; seamless;></iframe>
	<iframe src="approvals.html" name="approvals" style="position: absolute; top: 70px; left: 0px; width: 1090px; height: 500px; " scrolling="no"; seamless;></iframe>
	<iframe src="view_history.html" name="viewhistory" style="position: absolute; top: 70px; left: 0px; width: 1090px; height: 500px; " scrolling="no"; seamless;></iframe>
	<iframe src="settings.html" name="settings" style="position: absolute; top: 70px; left: 0px; width: 1090px; height: 500px; " scrolling="no"; seamless;></iframe>

	<section class="sidebar">
		<div class="imagebox"></div>
		<div class="seperatorA" style="position: absolute;  top: 230px;  left: 12px;"></div>
		<div class="sidebartext" style=" position: absolute;  top: 231px;  left: 40px; text-align: center; padding-left: 0px; width: 140px;">Admin</div>

		<div class="seperatorA" style="position: absolute;  top: 270px;  left: 12px;"></div>
		<a href="home.html" target="home" id="home1" name="home1" style="text-decoration: none">
			<img src="images/home_blue.png" width="15" height="15" style="position: absolute; top: 305px; left: 25px;">
			<div class="sidebartext" style=" position: absolute;  top: 291px;  left: 40px;">Home</div>
		</a>

		<div class="seperatorA" style="position: absolute;  top: 330px;  left: 12px;"></div>
		<a href="notifications.html" target="notifications" id="notifications1" name="notifications1" style="text-decoration: none">	
			<img src="images/notifications_blue.png" width="15" height="15" style="position: absolute; top: 346px; left: 25px;">
			<div class="sidebartext" style=" position: absolute;  top: 331px;  left: 40px;">Notifications</div>
		</a>

		<div class="seperatorA" style="position: absolute;  top: 370px;  left: 12px;"></div>
		<a href="approvals.html" target="approvals" id="approvals1" name="approvals1" style="text-decoration: none" >
			<img src="images/approvals_blue.png" width="15" height="15" style="position: absolute; top: 385px; left: 24px;">
			<div class="sidebartext" style=" position: absolute;  top: 371px;  left: 40px;">Approvals</div>
		</a>
		
		<div class="seperatorA" style="position: absolute;  top: 410px;  left: 12px;"></div>
		<a href="view_history.html" target="viewhistory" id="viewhistory1" name="viewhistory1" style="text-decoration: none" >
			<img src="images/viewhistory_blue.png" width="15" height="15" style="position: absolute; top: 425px; left: 24px;">
			<div class="sidebartext" style=" position: absolute;  top: 411px;  left: 40px;">View History</div>
		</a>	
		
		<div class="seperatorA" style="position: absolute;  top: 450px;  left: 12px;"></div>		
		<a href="settings.html" target="settings"  id="settings1" name="settings1" style="text-decoration: none">
   			<img src="images/settings_blue.png" width="15" height="15" style="position: absolute; top: 464px; left: 23px;">
   			<div class="sidebartext" style=" position: absolute;  top: 451px;  left: 40px;">Settings</div>
   		</a>
   		
	</section>
	<button class="logout" onClick="javascript:window.location.href ='logout.php'">Logout</button>
</body>
</html>
