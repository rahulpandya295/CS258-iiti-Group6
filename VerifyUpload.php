<?php
	session_start();
	$name = $_FILES['file']['name'];
	if(empty($name)){
		$_SESSION['veifyAttachment']=1;
		header("location: send_mail.php");
		die();
		}
	$size = $_FILES['file']['size'];
	$type = $_FILES['file']['type'];
	$tmp_name = $_FILES['file']['tmp_name'];//temperory location of uploaded file on the server
	$_SESSION['attachment']=$tmp_name;
	$error = $_FILES['file']['error']; //0 means no error
	$extension = strtolower(substr($name,strpos($name,'.')+1));//this will extract out the string after first period
	$max_size=1048576;
	$alert_msg='';
	if(isset($name)){
		if(($extension != 'jpg' || $extension != 'jpeg') && $size>=$max_size && ($type!='image/jpeg' || $type!='image/jpg')){
			if($size>=$max_size){
				$alert_msg.="<br>Please Choose a file of size less than ".$max_size/1024 ."KB<br>";
				}
			else if($extension != 'jpg' || $extension != 'jpeg'){
				$alert_msg.="<br>Please Choose a file of valid Extension!<br>";
				}
			else{
				$alert_msg.= "Please Choose a file of valid type!<br>";
				}
		}
		else{
			$_SESSION['veifyAttachment']=1;
			header("location: send_mail.php");
			die();
		}
	}
		
		echo "<script type='text/javascript'>alert('$alert_msg')</script>";
		header("location: Operator.php");
		die();

?>