<?php             /// AFM 
session_start();
if    (  isset($_POST['sic_code']) && isset($_POST['user_code']) && isset($_POST['sname']) 
         && isset($_POST['sample_of_type']) && isset($_POST['substrat']) 
	     && isset($_POST['mode_of_scanning'])  && isset($_POST['x_along']) 
		 && isset($_POST['y_along'])  && isset($_POST['z_along']) 
		 && isset($_POST['elec_prop']) && isset($_POST['mag_prop']) && isset($_POST['details']))
	{
	include("access_db.inc.php");
	$tb_name=afm;

	$id=$_SESSION['usr'];
	$sicCode=$_POST['sic_code'];
	$UCode=$_POST['user_code'];
	$SuperName=$_POST['sname'];
	$type_sample=$_POST['sample_of_type'];
	$substrte=$_POST['substrat'];
	$scanning_mode=$_POST['mode_of_scanning'];
	$x_along=$_POST['x_along'];
	$y_along=$_POST['y_along'];
	$z_along=$_POST['z_along'];
	$prop_elec=$_POST['elec_prop'];
	$prop_mag=$_POST['mag_prop'];
	$details=$_POST['details'];
	
    $submit_time=date('d/m/Y h:i:s a');

	
	$id = stripslashes($id);
	$sicCode = stripslashes($sicCode);
	$UCode = stripslashes($UCode);
	$SuperName = stripslashes($SuperName);
	$type_sample = stripslashes($type_sample);
	$substrte = stripslashes($substrte);
	$scanning_mode = stripslashes($scanning_mode);
	$x_along = stripslashes($x_along);
	$y_along = stripslashes($y_along);
	$z_along = stripslashes($z_along);
	$prop_elec = stripslashes($prop_elec);
	$prop_mag = stripslashes($prop_mag);
	$details = stripslashes($details);
	




	$id = mysql_real_escape_string($id);
	$sicCode = mysql_real_escape_string($sicCode);
	$UCode = mysql_real_escape_string($UCode);
	$SuperName = mysql_real_escape_string($SuperName);
	$type_sample = mysql_real_escape_string($type_sample);
	$substrte = mysql_real_escape_string($substrte);
	$scanning_mode = mysql_real_escape_string($scanning_mode);
	$x_along = mysql_real_escape_string($x_along);
	$y_along = mysql_real_escape_string($y_along);
	$z_along = mysql_real_escape_string($z_along);
	$prop_elec = mysql_real_escape_string($prop_elec);
	$prop_mag = mysql_real_escape_string($prop_mag);
	$details = mysql_real_escape_string($details);
	
	
	$id = htmlentities($id);
	$sicCode = htmlentities($sicCode);
	$UCode = htmlentities($UCode);
	$SuperName = htmlentities($SuperName);
	$type_sample = htmlentities($type_sample);
	$substrte = htmlentities($substrte);
	$scanning_mode = htmlentities($scanning_mode);
	$x_along = htmlentities($x_along);
	$y_along = htmlentities($y_along);
	$z_along = htmlentities($z_along);
	$prop_elec = htmlentities($prop_elec);
	$prop_mag = htmlentities($prop_mag);
	$details = htmlentities($details);





	$query="insert into $tb_name('id','sic_code','user_code','supervisor_name','Stype','Substrate','Mode_of_scanning','x','y','z',
									'electricalproperties','magneticproperties','details','submit_time'	) 
	values ('$id','$sicCode','$UCode','$SuperName','$type_sample','$substrte','$scanning_mode', '$x_along' , '$y_along', '$z_along',
			 'prop_elec','prop_mag','details','$submit_time' )";

	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>alert('Success')</script>";
		header("Location: User.html");
	}
	else
	{
		echo "<script type='text/javascript'>alert('Try Again')</script>";
		header("Location: AFM.html");
	}

	


}

?>
