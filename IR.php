<?php             /// IR 
session_start();
if(isset($_POST['scode']) && isset($_POST['rgroup']) && isset($_POST['solubility']) && isset($_POST['hazard']) && isset($_POST['calcon'])
		&& isset($_POST['ewave']) && isset($_POST['mformula']) && isset($_POST['mweight']) && isset($_POST['rangeScan']) 
		&& isset($_POST['request'])
		
		){
	include("access_db.inc.php");
	$tb_name="ir_form";

	$id=$_SESSION['usr'];
	$scode=$_POST['scode'];
	$rgroup=$_POST['rgroup'];
	$hazard=$_POST['hazard'];
	$mweight=$_POST['mweight'];
	$mformula=$_POST['mformula'];
	$solubility=$_POST['solubility'];
	$calcon=$_POST['calcon'];
	$ewave=$_POST['ewave'];
	$rangeScan=$_POST['rangeScan'];
	if(isset($_POST['checkbox1']))
		$checkbox1='1';
	else
		$checkbox1='0';	
	if(isset($_POST['checkbox2']))
		$checkbox2='1';
	else
		$checkbox2='0';	
	if(isset($_POST['checkbox3']))
		$checkbox3='1';
	else
		$checkbox3='0';	
	$details=$_POST['request'];
	$approved='0';
    $submit_time=date('d/m/Y h:i:s a');

    $scode = stripslashes($scode);
	$rgroup = stripslashes($rgroup);
	$hazard = stripslashes($hazard);
	$mweight = stripslashes($mweight);
	$mformula = stripslashes($mformula);
	$solubility = stripslashes($solubility);
	$calcon = stripslashes($calcon);
	$ewave = stripslashes($ewave);
	$details= stripslashes($details);
	$rangeScan = stripslashes($rangeScan);




	$scode = mysql_real_escape_string($scode);
	$rgroup = mysql_real_escape_string($rgroup);
	$hazard = mysql_real_escape_string($hazard);
	$mweight = mysql_real_escape_string($mweight);
	$mformula = mysql_real_escape_string($mformula);
	$solubility = mysql_real_escape_string($solubility);
	$calcon = mysql_real_escape_string($calcon);
	$ewave = mysql_real_escape_string($ewave);
	$details= mysql_real_escape_string($details);
	$rangeScan = mysql_real_escape_string($rangeScan);


    $scode = htmlentities($scode);
	$rgroup = htmlentities($rgroup);
	$hazard = htmlentities($hazard);
	$mweight = htmlentities($mweight);
	$mformula = htmlentities($mformula);
	$solubility = htmlentities($solubility);
	$calcon = htmlentities($calcon);
	$ewave = htmlentities($ewave);
	$details= htmlentities($details);
	$rangeScan = htmlentities($rangeScan);






	$query="insert into $tb_name (id,scode,rgroup,solubility,hazard,calcon,ewave,mformula,mweight,rangescan,request,
		solid,liquid,air,submit_time,approved) 
	values ('$id','$scode','$rgroup','$solubility','$hazard','$calcon','$ewave','$mformula','$mweight','$rangeScan','$details',
		'$checkbox1','$checkbox2','$checkbox3','$submit_time','$approved')";

	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>alert('Success')</script>";
		//header("Location: User.html");
	}
	else
	{
		echo "<script type='text/javascript'>alert('Try Again')</script>";
		//header("Location: IR.html");
	}

	


}

?>
