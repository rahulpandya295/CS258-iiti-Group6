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

	<script src="js/modernizr.custom.js"></script>
</head>
<body>

	<!--Header Bar-->
	<div class="introBar">
		<div class="introHead1">SICDOC</div>
		<div class="introHead2"> Sophisticated Instrumentation Lab </div>

		<div class="column">
					<div id="sb-search" class="sb-search">
						<form method="POST" action="Search.html">
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
		
	</div>

		<!--SideBar Contents-->
	<section class="sidebar">
		<div class="imagebox"><img src='<?php echo $nameAdmin[6];?>' width="180" height="180"></div>
		
		<div class="seperatorinbox" style="position: absolute;  top: 230px;  left: 12px;"></div>
		<div class="sidebartext" style=" position: absolute;  top: 231px;  left: 40px; text-align: center; padding-left: 0px; width: 140px;"><?php echo $nameAdmin[1]." ".$nameAdmin[2]; ?></div>
		<div class="seperatorinbox" style="position: absolute;  top: 270px;  left: 12px;"></div>
		
		<div class="seperatorinbox" style="position: absolute;  top: 330px;  left: 12px;"></div>
		
		<a href="notifyadmin.php" style="text-decoration: none">	
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
	<!--End of Sidebar Content-->
	<button href="Logout.php" class="logout">Logout</button>







							<section class="container">
								<img src="images/notifications_blue.png" width="25" height="25" style="position: absolute; top: 55px; left: 45px;">
								<h1>Notifications</h1>
								<div class="seperator" style="position: absolute; left: 40px; top: 100px;  width: 500px;"></div>
								<div class="notifytext">
									<ul>	
				<?php
				$user_id=12;
				include "access_db.inc.php";
				$q = mysql_query("SELECT * from afm where approved='0' order by submit_time desc");
				$n = mysql_num_rows($q);
				if($n){
					$result=$q;
					$i=0;
					while($row=mysql_fetch_array($result)){
						if($i<10){
							$link='afm_search.php'.'?'.'id='.$row['form_id'].'&index=000';
							echo '<li><a href='.$link.'>ATOMIC FORCE MICROSCOPY FACILITY  || '.$row['submit_time'].' | '.$row['id'].'| '.$row['sic_code'].'</a></li>'.'<hr>';
							$i++;
						}
						else
							break;
					}

				}
				$q = mysql_query("SELECT * from ir_form where approved='0' order by submit_time desc");
				$n = mysql_num_rows($q);
				if($n){
					$result=$q;
					$i=0;
					while($row=mysql_fetch_array($result)){
						if($i<10){
							$link='ir_search.php'.'?'.'id='.$row['form_id'].'&index=000';
							echo '<li><a href='.$link.'> INFRA-RED SPECTROSCOPY REQUEST FORM  ||  '.$row['submit_time'].' | '.$row['id'].' | '.$row['scode'].'</a></li>'.'<hr>';
							$i++;
						}else
							break;
					}

				}
				$q = mysql_query("SELECT * from msrf where approved='0' order by submit_time desc");
				$n = mysql_num_rows($q);
				if($n){
					$result=$q;
					$i=0;
					while($row=mysql_fetch_array($result)){
						if($i<10){
							$link='msrf_search.php'.'?'.'id='.$row['form_id'].'&index=000';
							echo '<li><a href='.$link.'>MASS SPECTROMETRY REQUEST FORM || '.$row['submit_time'].' | '.$row['id'].' | '.$row['scode'].'</a></li>'.'<hr>';
							$i++;
						}else
							break;
					}

				}

				$q = mysql_query("SELECT * from nmr where approved='0' order by submit_time desc");
				$n = mysql_num_rows($q);
				if($n){
					$result=$q;
					$i=0;
					while($row=mysql_fetch_array($result)){
						if($i<10){
							$link='nmr_search.php'.'?'.'id='.$row['form_id'].'&index=000';
							echo '<li><a href='.$link.'>NMR Spectrometry  ||  '.$row['submit_time'].' | '.$row['id'].' | '.$row['scode'].'</a></li>'.'<hr>';
							$i++;
						}else
							break;
					}

				}
				$q = mysql_query("SELECT * from scxr where approved='0' order by submit_time desc");
				$n = mysql_num_rows($q);
				if($n){
					$result=$q;
					$i=0;
					while($row=mysql_fetch_array($result)){
						if($i<10){
							$link='scxr_search.php'.'?'.'id='.$row['form_id'].'&index=000';
							echo '<li ><a href='.$link.'>Single Crystal X-Ray Diffraction Facility || '.$row['submit_time'].' | '.$row['id'].' | '.$row['sic_code'].'</a></li>'.'<hr>';
							$i++;
						}else
							break;
					}

				}
					echo '<meta http-equiv="refresh" content="20">';
				?>
</ul>
								</div>
							</section>
						</body>
						</html>
