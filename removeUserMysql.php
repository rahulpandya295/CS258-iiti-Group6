<?php 
require_once 'connection.php';
session_start();

$uname = $_SESSION['usr'];
echo $uname;

$qry = "SELECT `id` FROM members WHERE `username` = '$uname'";
$result = mysql_query($qry);

if(mysql_num_rows($result) == 1){
	$qry = "DELETE FROM members WHERE `username` = '$uname'";
	$result = mysql_query($qry);
	$_SESSION['nameDel'] = $uname;
}else{
	$_SESSION['errorDeletion'] = 1;
}

header("location: settings.php");
?>