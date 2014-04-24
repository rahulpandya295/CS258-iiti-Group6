<?php 
session_start();

require_once 'connection.php';

$psWord = $_SESSION['updatePsWord'];
$len = strlen($psWord);
$len = 3*$len*$len -2;
$psWord.=$len;
$psWord = md5($psWord);

$query = "UPDATE members SET `password` = '" . $psWord . "' WHERE  `members`.`username`='" . $_SESSION['username']. "'";
	
	if(mysql_query($query)){
		$_SESSION['pwReset']=1;
	}else{
		$_SESSION['noUserFound']=1;
	}
	
	header("location: Login_form.php");
?>