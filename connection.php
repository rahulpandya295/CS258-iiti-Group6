<?php

require_once 'myPassword.php';

$host="localhost";
$username="root"; 
$password=$var; 
$db_name="test";  
$tbl_name="members"; 

$con = mysql_connect($host, $username, $password)or die("cannot connect"); 

mysql_select_db($db_name)or die("cannot select DB");

?>