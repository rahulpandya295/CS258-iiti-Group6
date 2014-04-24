<?php
session_start();
if(isset($_POST['first'])&&isset($_POST['last'])&&!empty($_POST['last'])&&!empty($_POST['first'])){
	include 'access_db.inc.php';
	for($it=intval($_POST['first']);$it<=intval($_POST['last']);$it++){
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		for($i=0;$i<8;$i++){
			$pass[]=$alphabet[rand()%strlen($alphabet)];
		}
		$pass=str_shuffle($pass);
		$password=md5($pass);
		mysql_query("INSERT INTO profile (username ,password ,rollno) values('$it','$password','$it')");
		echo "thank you";
		//send_email($it,$pass,$it);
	}
}

?>