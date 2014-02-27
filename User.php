<?php 
	session_start();
	if($_SESSION['isLoggedIn']!=3){
		session_destroy();
    	header("location: Login_form.php");
    }
?>


<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
	<link rel="stylesheet" type="text/css" href="css/Admin.css"/>
</head>

<body>

	<div class="introBar">
		<div class="introHead1">SICDOC</div>
		<div class="introHead2"><a href="http://iiti.ac.in/sic/"><font color="FFFFFF">Sophisticated Instrumentation Lab</font></a></div>
	</div>
	<iframe src="Notifications.html" style="position: absolute; top: 70px; left: 0px; width: 1090px; height: 500px; overflow: hidden;" scrolling="no"; seamless;>
 
	</iframe>
	
	<section class="sidebar">
		<div class="imagebox"></div>
		<div class="seperatorA" style="position: absolute;  top: 230px;  left: 12px;"></div>
		<div class="sidebartext" style=" position: absolute;  top: 231px;  left: 40px; text-align: center; padding-left: 0px; width: 140px;">User</div>
		<div class="seperatorA" style="position: absolute;  top: 270px;  left: 12px;"></div>
		<img src="images/home_blue.png" width="15" height="15" style="position: absolute; top: 305px; left: 25px;">
		<div class="sidebartext" style=" position: absolute;  top: 291px;  left: 40px;">Home</div>
		<div class="seperatorA" style="position: absolute;  top: 330px;  left: 12px;"></div>
		<img src="images/notifications_blue.png" width="15" height="15" style="position: absolute; top: 346px; left: 25px;">
		<div class="sidebartext" style=" position: absolute;  top: 331px;  left: 40px;">Notifications</div>
		<div class="seperatorA" style="position: absolute;  top: 370px;  left: 12px;"></div>
		<img src="images/sexperiment.png" width="15" height="15" style="position: absolute; top: 425px; left: 24px;">
		<div class="sidebartext" style="position: absolute;  top: 411px;  left: 40px;">Start Experiment</div>
		<div class="seperatorA" style="position: absolute;  top: 410px;  left: 12px;"></div>
		<img src="images/profile.png" width="15" height="15" style="position: absolute; top: 385px; left: 23px;">
		<div class="sidebartext" style=" position: absolute;  top: 371px;  left: 40px;">Profile</div>

	</section>
	<button class="logout" onClick="javascript:window.location.href ='logout.php'">Logout</button>
</body>

</html>
