<?php 
	session_start();
	if($_SESSION['isLoggedIn']!=2){
		session_destroy();
    	header("location: Login_form.php");
    }
?>

This is home page for the operator!!
