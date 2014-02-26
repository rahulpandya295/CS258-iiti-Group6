<?php
require_once 'myPassword.php';

$host="localhost"; 
$username="root"; 
$password=$var; 
$db_name="test";
$tbl_name = "members";
session_start();
//echo $_SESSION['usr'];
$psword=$_SESSION['pswd'];
$usname=$_SESSION['usr'];
//echo $usname . $psword . 'hey';

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


$query_field = mysql_query("SELECT * FROM $tbl_name WHERE username= '$usname' and password= '$psword'"); 
		$field_qr = mysql_fetch_object($query_field);
		$field = $field_qr->field;
		echo $field;
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
			echo "<script type='text/javascript'>alert('Invalid Login!')</script>";
			}
?>
