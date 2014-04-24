<?php             /// NMR 
session_start();
if(isset($_POST['scode']) && isset($_POST['samount']) && isset($_POST['mformula']) && isset($_POST['solvent']) && isset($_POST['details'])){
	include("access_db.inc.php");
	$tb_name="nmr";

	$id=$_SESSION['usr'];
	$scode=$_POST['scode'];
	$samount=$_POST['samount'];
	$mformula=$_POST['hazard'];
	$solvent=$_POST['solvent'];
	$details=$_POST['details'];
	$approved='0';
	
    $submit_time=date('d/m/Y h:i:s a');

	$scode = stripslashes($scode);
	$samount = stripslashes($samount);
	$mformula = stripslashes($mformula);
	$solvent = stripslashes($solvent);
	$details = stripslashes($details);




	$scode = mysql_real_escape_string($scode);
	$samount = mysql_real_escape_string($samount);
	$mformula = mysql_real_escape_string($mformula);
	$solvent = mysql_real_escape_string($solvent);
	$details = mysql_real_escape_string($details);


	$scode = htmlentities($scode);
	$samount = htmlentities($samount);
	$mformula = htmlentities($mformula);
	$solvent = htmlentities($solvent);
	$details = htmlentities($details);





	$query="insert into $tb_name (id,scode,samount,mformula,solvent,details,submit_time,approved) 
	values ('$id','$scode','$samount','$mformula','$solvent','$details','$submit_time','$approved')";

	if(mysql_query($query))
	{
		//echo "<script type='text/javascript'>alert('Success')</script>";
		header("Location: User.html");
	}
	else
	{
		//echo "<script type='text/javascript'>alert('Try Again')</script>";
		header("Location: NMRFacility.html");
	}

	


}

?>
