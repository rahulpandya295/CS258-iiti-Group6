<?php

require_once 'connection.php';
require_once 'myPassword.php';

if(!mysql_ping($con)){
	die("cant connect!");
}

$uname = $_POST['uname'];
$dob_day = $_POST['dob_day'];
$dob_month = $_POST['dob_month'];
$dob_year = $_POST['dob_year'];

$uname = stripslashes($uname);
$dob_day = stripslashes($dob_day);
$dob_month = stripslashes($dob_month);
$dob_year = stripslashes($dob_year);

$uname = mysql_real_escape_string($uname);
$dob_day = mysql_real_escape_string($dob_day);
$dob_month = mysql_real_escape_string($dob_month);
$dob_year = mysql_real_escape_string($dob_year);

$queryString = "SELECT email from $tbl_name WHERE username = '$uname' AND dob_day = '$dob_day' AND dob_month = '$dob_month' AND dob_year = '$dob_year'";

$result = mysql_query($queryString);

$num = mysql_num_rows($result);
$length = 6;
$lenght+=rand(0,2);
$ran = substr(str_shuffle("0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

session_start();

if($num == 1){
	$_SESSION['username']=$uname;
	$_SESSION['updatePsWord']=$ran; //to be updated
	$_SESSION['semail']='r4.0radhe79@gmail.com'; //Any ID From which we will send the new password.
	$_SESSION['psword']= $gmailPw; //Password of that ID.
	$_SESSION['name']= "X-Ray Server";
	$row = mysql_result($result,0);
	$_SESSION['remail']=$row;// this will extract email value from $result// alternatively use $row=mysql_fetch_array($result) and then $row['email']
	$_SESSION['message']="Hello, Your new password is '". $ran . "'. Please change it after login!";
	$_SESSION['sub']="Password Reset"; 
	$_SESSION['pw']=1; //this variable will differentiate this page from Operator.php while sending mail.
	$_SESSION['sendmail']=1; //this is the permission to this page to access send_mail.php;
	header("location: send_mail.php");
	//echo $_SESSION['remail'];
}
else{
	$_SESSION['noUserFound']=1;
	header("location: Login_form.php");
}
?>