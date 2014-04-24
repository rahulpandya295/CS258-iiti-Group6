<?php

require_once 'connection.php';

session_start();

$psword=$_SESSION['pswd'];
$usname=$_SESSION['usr'];


$query_field = mysql_query("SELECT * FROM $tbl_name WHERE username= '$usname' and password= '$psword'");
		$field_qr = mysql_fetch_object($query_field);
		$field = $field_qr->field;
		if($field==1){
			$_SESSION['isLoggedIn']=1;
			header("location: Admin.php");	
			}
		else if($field==2){
			$_SESSION['isLoggedIn']=2;
			header("location: Operator.php");
			}
		else if($field==3){
			$_SESSION['isLoggedIn']=3;
			header("location: User.php");
			}
		else{
			$_SESSION['invalid_login']=1;
			header("location: Login_form.php");
			}
?>
