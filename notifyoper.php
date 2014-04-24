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
				$user_id=12;
				include "access_db.inc.php";
				$q = mysql_query("SELECT * from afm where approved='1' order by submit_time desc");
				$n = mysql_num_rows($q);
				if($n){
					$result=$q;
					$i=0;
					while($row=mysql_fetch_array($result)){
						if($i<10){
							$link='afm_search.php'.'?'.'id='.$row['form_id'].'&index=000';
							echo '<li><a href='.$link.'>Atomic Force Microscopy Facility'.$row['submit_time'].' | '.$row['id'].'| '.$row['sic_code'].'</a></li>';
							$i++;
						}
						else
							break;
					}

				}
				$q = mysql_query("SELECT * from ir_form where approved='1' order by submit_time desc");
				$n = mysql_num_rows($q);
				if($n){
					$result=$q;
					$i=0;
					while($row=mysql_fetch_array($result)){
						if($i<10){
							$link='ir_search.php'.'?'.'id='.$row['form_id'].'&index=000';
							echo '<li><a href='.$link.'> INFRA-RED SPECTROSCOPY REQUEST FORM'.$row['submit_time'].' | '.$row['id'].' | '.$row['scode'].'</a></li>'.'<hr>';
							$i++;
						}else
							break;
					}

				}
				$q = mysql_query("SELECT * from msrf where approved='1' order by submit_time desc");
				$n = mysql_num_rows($q);
				if($n){
					$result=$q;
					$i=0;
					while($row=mysql_fetch_array($result)){
						if($i<10){
							$link='msrf_search.php'.'?'.'id='.$row['form_id'].'&index=000';
							echo '<li><a href='.$link.'>MASS SPECTROMETRY REQUEST FORM'.$row['submit_time'].' | '.$row['id'].' | '.$row['scode'].'</a></li>'.'<hr>';
							$i++;
						}else
							break;
					}

				}

				$q = mysql_query("SELECT * from nmr where approved='1' order by submit_time desc");
				$n = mysql_num_rows($q);
				if($n){
					$result=$q;
					$i=0;
					while($row=mysql_fetch_array($result)){
						if($i<10){
							$link='nmr_search.php'.'?'.'id='.$row['form_id'].'&index=000';
							echo '<li><a href='.$link.'>NMR Spectrometry'.$row['submit_time'].' | '.$row['id'].' | '.$row['scode'].'</a></li>'.'<hr>';
							$i++;
						}else
							break;
					}

				}
				$q = mysql_query("SELECT * from scxr where approved='1' order by submit_time desc");
				$n = mysql_num_rows($q);
				if($n){
					$result=$q;
					$i=0;
					while($row=mysql_fetch_array($result)){
						if($i<10){
							$link='scxr_search.php'.'?'.'id='.$row['form_id'].'&index=000';
							echo '<li href='.$link.'><a>Single Crystal X-Ray Diffraction Facility '.$row['submit_time'].' | '.$row['id'].' | '.$row['sic_code'].'</a></li>'.'<hr>';
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
