<?php             /// Single Crystal   ///diagram still left
session_start();
if(isset($_POST['sname']) && isset($_POST['user_code']) && isset($_POST['color']) 
     && isset($_POST['mpoint']) && isset($_POST['info']) && isset($_POST['sic_code'])){
	include("access_db.inc.php");
	$tb_name="scxr";

	$id=$_SESSION['usr'];
	$sname=$_POST['sname'];
	$user_code=$_POST['user_code'];
	$color=$_POST['color'];
	$mpoint=$_POST['mpoint'];
	$info=$_POST['info'];
	$sic_code=$_POST['sic_code'];
	if(isset($_POST['checkbox1']))
		$stable='1';
	else
		$stable='0';	
	if(isset($_POST['checkbox2']))
		$airSensitive='1';
	else
		$airSensitive='0';	
	if(isset($_POST['checkbox3']))
		$moistureSensitive='1';
	else
		$moistureSensitive='0';	
	if(isset($_POST['checkbox4']))
		$ir='1';
	else
		$ir='0';	
	if(isset($_POST['checkbox5']))
		$nmr='1';
	else
		$nmr='0';
	if(isset($_POST['checkbox6']))
		$massSpectrum='1';
	else
		$massSpectrum='0';	
	$approved='0';
    $submit_time=date('d/m/Y h:i:s a');

    $sname = stripslashes($sname);
	$user_code = stripslashes($user_code);
	$color = stripslashes($color);
	$mpoint = stripslashes($mpoint);
	$info = stripslashes($info);
	$sic_code = stripslashes($sic_code);


	$sname = mysql_real_escape_string($sname);
	$user_code = mysql_real_escape_string($user_code);
	$color = mysql_real_escape_string($color);
	$mpoint = mysql_real_escape_string($mpoint);
	$info = mysql_real_escape_string($info);
	$sic_code = mysql_real_escape_string($sic_code);


	$sname = htmlentities($sname);
	$user_code = htmlentities($user_code);
	$color = htmlentities($color);
	$mpoint = htmlentities($mpoint);
	$info = htmlentities($info);
	$sic_code = htmlentities($sic_code);
	
	


	$query="insert into $tb_name (id,sname,user_code,color,mpoint,info,sic_code,Stable,AirSensitive,MoistureSensitive,IR,
		NMR,MassSpectrum,submit_time,approved) 	
	values ('$id','$sname','$user_code','$color','$mpoint','$info','$sic_code','$stable','$airSensitive','$moistureSensitive','$ir',
		'$nmr','$massSpectrum','$submit_time','$approved')";

	if(mysql_query($query))
	{
		//echo "<script type='text/javascript'>alert('Success')</script>";
		header("Location: User.html");
	}
	else
	{
		//echo "<script type='text/javascript'>alert('Try Again')</script>";
		header("Location: SingleCrystalXRay.html");
	}

	


}

?>
