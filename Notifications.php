<?php
session_start();
?>
<!DOCTYPE html>
						<html>

						<head>
							<link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
							<link rel="stylesheet" type="text/css" href="css/iframe.css"/>
						</head>

						<body>
							<section class="container">
								<img src="images/notifications_blue.png" width="25" height="25" style="position: absolute; top: 55px; left: 45px;">
								<h1>Notifications</h1>
								<div class="seperator" style="position: absolute; left: 40px; top: 100px;  width: 500px;"></div>
								<div class="notifytext">
									<ul>	
				<?php
				$user_id=$_SESSION['usr'];
				include "access_db.inc.php";
				$q = mysql_query("SELECT user_id,form_id,viewed,form_no,time from notifications where user_id='$user_id' order by time desc");
				$n = mysql_num_rows($q);
				if($n){
					$result=$q;
					$i=0;
					while($row=mysql_fetch_array($result)){
						if($i<10){
						$formid=$row['form_id'];
						$forms="form".$row['form_no'];
						$form_array=array();
						$j=45+10*$i;
						$form_result=mysql_query("SELECT details from $forms where id='$formid'");
						$form_array=mysql_fetch_array($form_result);
							echo "<li>".$row['time']." | ".$form_array['details']."</li>"."<hr>";
							$i++;
						}
					}

				}
					echo '<meta http-equiv="refresh" content="10000">';
				?>
</ul>
								</div>
							</section>
						</body>
						</html>
