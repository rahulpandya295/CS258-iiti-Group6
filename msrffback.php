<?php             /// MRSFFORM 
session_start();
if(isset($_POST['hazard']) && isset($_POST['mformula']) && isset($_POST['scode']) && isset($_POST['rgroup']) && isset($_POST['mweight'])){
	include("access_db.inc.php");
	$tb_name="msrf";

	$id=$_SESSION['usr'];
	$scode=$_POST['scode'];
	$rgroup=$_POST['rgroup'];
	$hazard=$_POST['hazard'];
	$mweight=$_POST['mweight'];
	$mformula=$_POST['mformula'];
	$HRMS=$_POST['radios1'];
	$ESI_MS=$_POST['radios2'];
	$checkbox1=$_POST['checkbox1'];
	$checkbox2=$_POST['checkbox2'];
	$checkbox3=$_POST['checkbox3'];
	$checkbox4=$_POST['checkbox4'];
    $checkbox5=$_POST['checkbox5'];
    $submit_time=date('d/m/Y h:i:s a');

    $scode = stripslashes($scode);
	$rgroup = stripslashes($rgroup);
	$hazard = stripslashes($hazard);
	$mweight = stripslashes($mweight);
	$mformula = stripslashes($mformula);




	$scode = mysql_real_escape_string($scode);
	$rgroup = mysql_real_escape_string($rgroup);
	$hazard = mysql_real_escape_string($hazard);
	$mweight = mysql_real_escape_string($mweight);
	$mformula = mysql_real_escape_string($mformula);


	$scode = htmlentities($scode);
	$rgroup = htmlentities($rgroup);
	$hazard = htmlentities($hazard);
	$mweight = htmlentities($mweight);
	$mformula = htmlentities($mformula);





	$query="insert into $tb_name (id,scode,rgroup,hazard,mweight,mformula,HRMS,ESI_MS,CH3CN,MeOH,CHCl3,
		IPA,H2O,submit_time) 
	values ('$id','$scode','$rgroup','$hazard','$mweight','$mformula','$HRMS','$ESI_MS','$checkbox1','$checkbox2','$checkbox3',
		'$checkbox4','$checkbox5','$submit_time')";

	if(mysql_query($query))
	{
		//echo "<script type='text/javascript'>alert('Success')</script>";
		header("Location: User.html");
	}
	else
	{
		//echo "<script type='text/javascript'>alert('Try Again')</script>";
		header("Location: MSRFForm.html");
	}

	


}

?>
