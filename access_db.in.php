<?php
$connection_error="could not connect.";
			$server='localhost';
			$admin='root';
			$pass='';
			$db_name='siclab';
			$con=mysql_connect($server,$admin,$pass) || die();
			mysql_select_db($db_name) || die();	
?>
