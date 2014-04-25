<?php 
	session_start();
	if($_SESSION['isLoggedIn']!=1){
		session_destroy();
    	header("location: Login_form.php");
    }

//require_once 'myPassword.php';
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
	<link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
	<link rel="stylesheet" type="text/css" href="css/Admin.css"/>
	<link rel="stylesheet" type="text/css" href="css/iframe.css"/>
	<link rel="stylesheet" type="text/css" href="css/search1.css" />
	<link rel="stylesheet" type="text/css" href="css/search2.css" />
	<link rel="stylesheet" type="text/css" href="css/Search.css" />
</head>
<body>

	<!--Header Bar-->
	<div class="introBar">
    	<div class="introHead1"><a href="Login_form.php" style="text-decoration: none; color: #FFF;">SICDOC</a></div>
	    <div class="introHead2" style="left: 1200px;"><a href="http://iiti.ac.in/SIC/" style="text-decoration: none; color: #FFF;">Sophisticated Instrumentation Lab</a></div>
			
			<div style="position: relative; top: 17px; left: 250px;">
	    		<form class="search" action="Search.php" method="POST">
				  <input type="search" name="search" placeholder="Search here..." required>
				  <button type="submit">Search</button>
				</form>   
			</div>
		
		</div>
		<!--
		<div class="column">
					<div id="sb-search" class="sb-search">
						<form method="POST" action="Search.php">
							<input class="sb-search-input" placeholder="Enter your search query" type="text" value="" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"></span>
						</form>
					</div>
			</div>

		<script src="js/classie.js"></script>
		<script src="js/uisearch.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>
		
		
		-->
	<!--End of Header Bar-->

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
		
		<a href="View_profile.php" style="text-decoration: none" >
			<img src="images/viewhistory.png" width="15" height="15" style="position: absolute; top: 385px; left: 24px;">
			<div class="sidebartext" style=" position: absolute;  top: 371px;  left: 40px;">Profile</div>
		</a>	
		
		<div class="seperatorinbox" style="position: absolute;  top: 450px;  left: 12px;"></div>

		<a href="settings.php" style="text-decoration: none">
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