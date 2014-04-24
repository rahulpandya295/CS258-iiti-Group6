<?php            ////search results for table msrf
session_start();
	if($_SESSION['isLoggedIn']!=1 && $_SESSION['isLoggedIn']!=2 ){
		session_destroy();
	   	header("location: Login_form.php");
	}

include ("access_db.inc.php");

    $uname = $_SESSION['usr'];
    $uname = stripslashes($uname);
    $uname = mysql_real_escape_string($uname);
    
    $result = mysql_query("SELECT * FROM members WHERE username = '$uname'");
    $nameAdmin = mysql_fetch_row($result);
$id=$_GET['id'];

$index=$_GET['index'];
$tb_name="msrf";
$query= "select * from $tb_name where `form_id` = $id";
$raw_results=mysql_query($query);

if(mysql_num_rows($raw_results) > 0)
{ 
	while($results = mysql_fetch_array($raw_results))
	{
		if($index=='001' && $results['approved']=='0')
		{
			$query1="UPDATE $tb_name SET approved='1' where `form_id` = $id";
			$results['approved']='1';
			mysql_query($query1);
		}
		
		echo '
		
		<pre><br /><br /><br /><br />
		General Information<br />
		USER ID : '.$results['id'].'
		Sample CODE : '.$results['scode'].'
		Reasearch Group : '.$results['rgroup'].'<br />
		Sample Information : 
		Hazards : '.$results['hazard'].'
		Molecular Formula : '.$results['mformula'].' 
		Molecular Weight : '.$results['mweight'].'   Daltons <br />
		
		Solubility :
		</pre>
		';
		if($results['CH3CN']=='0')  echo "CH3CN : No<br />";
		else echo "CH3CN : Yes<br />";
		
		if($results['MeOH']=='0')  echo "MeOH : No<br />";
		else echo "MeOH : Yes<br />";
		
		if($results['CHCl3']=='0')  echo "CHCl3 : No<br />";
		else echo "CHCl3 : Yes<br />";
		
		if($results['IPA']=='0')  echo "IPA : No<br />";
		else echo "IPA : Yes<br />";
		
		if($results['H2O']=='0')  echo "H2O : No<br />";
		else echo "H2O : Yes<br />";
		
		echo "Request Analysis : <br />HRMS : ";
		
		if($results['HRMS']=='0')  echo " Positive Mode <br />";
		else echo " Negative Mode <br />";
		
		echo "ESI_MS : ";
		if($results['ESI_MS']=='0')  echo " Positive Mode <br />";
		else echo " Negative Mode <br />";

		echo '
		<pre>
		Submit Time : '.$results['submit_time'].'
		
		These samples do not contain Radioactivity
		</pre> ';
		if($_SESSION['isLoggedIn']==1)
		{
		
			if($results['approved']=='0') 
			{
				
					$link='msrf_search.php'.'?'.'id='.$_GET['id'].'&index=001';				
					echo '<a href='.$link.'>Approve</a>';
			}
			else 
				echo "<b>Approved</b><br />";
		}
		
		if($_SESSION['isLoggedIn']==2)
		{
			$query2="UPDATE $tb_name SET approved='2' where `form_id` = $id";
			mysql_query($query2);
		}
		
    }
	
}
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
	<!--End of Header Bar-->	

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
</body>

</html>
