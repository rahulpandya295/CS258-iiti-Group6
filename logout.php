<?php 
	session_start();
	if(!isset($_SESSION['isLoggedIn'])){
			session_destroy();
			header("location: Login_form.php");
			die();
		}
	session_destroy();
	session_start();
	$_SESSION['isLoggedOut']=1;
	header('location: Login_form.php?status='.urlencode(base64_encode("You have been successfully logged out!")));
	
?>