<?php
//error_reporting(E_ALL ^ E_STRICT);

require_once 'connection.php';

if(!mysql_ping()){
	die();
}

//include("createimage.php");
//&& isset($_POST['captcha'])  && $md5_hash==$_POST['captcha']
if(isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['uName']) && isset($_POST['psWord'])){

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$uName = $_POST['uName'];
$psWord = $_POST['psWord'];
$phone_no = $_POST['phoneno'];
$email = $_POST['email'];

$fName = stripslashes($fName);
$lName = stripslashes($lName);
$uName = stripslashes($uName);
$psWord = stripslashes($psWord);
$phone_no = stripslashes($phone_no);
$email = stripslashes($email);




$fName = mysql_real_escape_string($fName);
$lName = mysql_real_escape_string($lName);
$uName = mysql_real_escape_string($uName);
$psWord = mysql_real_escape_string($psWord);
$phone_no = mysql_real_escape_string($phone_no);
$email = mysql_real_escape_string($email);

$len=strlen($psWord);
$len = 3*$len*$len -2;
$psWord.=$len;
$psWord = md5($psWord);
$val = $_POST['select'];
$gender = $_POST['gender'];

$uploadDir= "imagesUPLOAD/";
$fileName = $_FILES['Photo']['name'];

$tmpName  = $_FILES['Photo']['tmp_name'];
$filePath = $uploadDir.$fileName;
$result = move_uploaded_file($tmpName, $filePath);

if(!get_magic_quotes_gpc()){
 	$filePath = addslashes($filePath);
}

$dobDay = $_POST['dob_day'];
$dobMonth = $_POST['dob_month'];
$dobYear = $_POST['dob_year'];

$uploadStr = "INSERT INTO $tableName (`id`, `First Name`, `Last Name`, `username`, `password`, `gender` , `imagePath` ,`dob_day` , `dob_month` , `dob_year` , `field` , `email`, `phone_no`) VALUES (NULL , '$fName', '$lName' , '$uName' , '$psWord' , '$gender', '$filePath' , '$dobDay' , '$dobMonth' , '$dobYear' , '$val' , '$email' , '$phone_no')";

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
	$_SESSION['errorSignUp']=1;
	header("location: signUp.php");
}
}

?>