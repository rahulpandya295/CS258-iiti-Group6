<?php 

session_start();
require_once 'connection.php';

function manPw($str){
	$str = stripslashes($str);
	$str = mysql_real_escape_string($str);
	$len = strlen($str);
	$len = 3*$len*$len-2;
	$str .= $len;
	$str = md5($str);
	return $str;
}

$oldPw = $_POST['oldPw'];
$newPw = $_POST['newPw'];
$confirmPw = $_POST['confirmPw'];
$uname = $_SESSION['usr'];

$oldPw = manPw($oldPw);
$newPw = manPw($newPw);
$confirmPw = manPw($confirmPw);

if($newPw != $confirmPw){
	$_SESSION['pwUnmatch']=1;
	header("location: ChangePassword.php");
}
else {
	$query = "SELECT `password` FROM `members` WHERE `username` = '$uname'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	
//	echo mysql_num_rows($result) . "  " . $oldPw . "  " . $row['password'];

	if( mysql_num_rows($result)==1 && $row['password'] == $oldPw){
		$query = "UPDATE `members` SET `password` = '$confirmPw' WHERE `username` = '$uname'";	
	
		if(mysql_query($query)){
			$_SESSION['pwChangeSuccess']=1;
			unset($_SESSION['isLoggedIn']);
			header("location: Login_form.php");
		}

		else{
			$_SESSION['pwChangeError']=1;
			header("location: ChangePassword.php");
		}
	}

	else{
		$_SESSION['pwChangeError']=2;
		header("location: ChangePassword.php");
	}
}

?>