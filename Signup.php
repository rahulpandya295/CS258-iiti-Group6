<?php
error_reporting(E_ALL ^ E_STRICT);

$host = "localhost";
$db_name = "members";
$username = "root";
$password = "";
$tableName = "members";
$con = mysql_connect($host , $username , $password) or die("can't connect");
mysql_select_db($db_name) or die("can't connect to db");

if(!mysql_ping()){
	die();
}
include("captcha.php");
if(isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['uName']) && isset($_POST['psWord']) && isset($_POST['captcha'])  && $md5_hash==$_POST['captcha'])
{
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$uName = $_POST['uName'];
$psWord = $_POST['psWord'];
$len=strlen($psWord);
$len = 3*$len*$len -2;
$psWord.=$len;
$psWord = md5($psWord);
$level = $_POST['val'];
$gender = $_POST['gender'];
$image = addslashes(file_get_contents($_FILE['dpimage']['tmp_name']));
$image_name = addslashes($_FILES['dpimage']['name']);
$dob_day = $POST['dob_day'];
$dob_month = $_POST['dob_month'];
$dob_year = $_POST['dob_year'];
$phone_no = $_POST['phone_no'];

$uploadStr = "INSERT INTO $tableName (`id`, `First Name`, `Last Name`, `username`, `password`, `gender`, `image` , `image_name` ,`dob_day` , `dob_month` , `dob_year` , `field` , `phone_no`) VALUES (NULL , '$fName', '$lName' , '$uName' , '$psWord' , '$gender', '$image' , '$image_name', '$dob_day' , 'dob_month' , '$dob_year' , '$val' , '$phone_no')";

//$uploadStr=mysql_real_escape_string($uploadStr);
//mysql_query($uploadStr , $con) or die(mysql_error());
session_start();
if(mysql_query($uploadStr , $con)){
	mysql_close($con);
	$_SESSION['successSignUp']=1;
	header("location: Login_form.php");
	die();
}else{
	mysql_close($con);
	echo "<script type='text/javascript'>alert('<br>Error detected in Signing Up<br>')</script>";
}
}
header("location: signUp.html");
?>
