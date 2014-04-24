<?php
require 'PHPMailerAutoload.php';
require 'class.phpmailer.php';
require 'class.smtp.php';
require_once 'myPassword.php';
//require '../projectCSE/class.pop3.php';

//$http_proxy = 'cse1200125:'.$var.'@webproxy.indore.iiti.ac.in:8080';

session_start();

	if(!isset($_SESSION['sendmail'])){
		session_destroy();
		header("location: Login_form.php");
	}

$mail = new PHPMailer;
$mail->isSMTP();
	

	if(isset($_SESSION['pw'])){
		$opEmail = $_SESSION['semail'];
		$mail->Username = $opEmail; 
		$mail->Password = $_SESSION['psword'];
	}else{
		$opEmail = $_POST['semail'];
		$mail->Username = $opEmail; 
		$mail->Password = $_POST['psword'];
	}

$smtpServer = strtolower(substr($opEmail,strpos($opEmail,'@')+1));                                    

$mail->SMTPDebug  = 2;
$mail->SMTPAuth = true;                             

if($smtpServer == "gmail.com"){
		$mail->Host = "smtp.gmail.com";	
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
	
	}
else if($smtpServer == "hotmail.com"){
		$mail->Host = "smtp.live.com";
		$mail->Port = 587;//25
		$mail->SMTPSecure = 'tls';
	}
else if($smtpServer == "iiti.ac.in"){
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
	}
else if($smtpServer == "yahoo.com"){
		$mail->Host = "smtp.mail.yahoo.com";	
		$mail->Port = 25;//995//465
		$mail->SMTPSecure = 'tls';//ssl
	}
else {
	echo "<script type='text/javascript'>alert('Please Choose a mail ID out of the following: gmail.com, hotmail.com, iiti.ac.in')</script>";
	if(!isset($_SESSION['pw'])){
		header("location: Operator.php");
	}
}

//$mail->SMTPSecure = 'ssl'; 

if(isset($_FILES['file']['name'])){
	$name = $_FILES['file']['name'];
}
	if(!empty($name)){
		$size = $_FILES['file']['size'];
		$type = $_FILES['file']['type'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$error = $_FILES['file']['error']; //0 means no error
		$extension = strtolower(substr($name,strpos($name,'.')+1));//this will extract out the string after first period
		$max_size=1048576;
		$alert_msg='';
		if(isset($name)){
			if($extension != 'jpg' || $extension != 'jpeg' || $extension != 'png' || $size>=$max_size){
				if($size>=$max_size){
					$alert_msg.="<br>Please Choose a file of size less than ".$max_size/1024 ."KB<br>";
					}
				else if($extension != 'jpg' || $extension != 'jpeg' || $extension != 'png'){
					$alert_msg.="<br>Please Choose a file of valid Extension!<br>";
					}
			}
			
			//if there is any error msg then show it and revert back to the home page of the Operator else attach the attachment with the object of the mailer
			if(!empty($alert_msg)){
				echo "<script type='text/javascript'>alert('$alert_msg')</script>";
				header("location: Operator.php");
				die();
			}
			else{
				$mail->addAttachment('upload_button.png');
				}
		}
		}

	if(isset($_SESSION['pw'])){
		$mail->From = $_SESSION['semail'];
		$mail->FromName = $_SESSION['name'];
		$mail->addAddress($_SESSION['remail']);	
		$mail->Subject = $_SESSION['sub'];
		$mail->Body = $_SESSION['message'];
	}else{
		$mail->From = $_POST['semail'];
		$mail->FromName = $_POST['name'];
		$mail->addAddress($_POST['remail']);
		$mail->Subject = $_POST['sub'];
		$mail->Body = $_POST['message'];
		}

//$mail->addReplyTo('r4.0radhe79@gmail.com', 'Information');

if(isset($_POST['ccEmail'])){
	$mail->addCC($_POST['ccEmail']);
}

//$mail->WordWrap = '500';
$mail->isHTML(TRUE);

if(!$mail->send()) {
   $alert_msg = 'Message could not be sent.' . '\n\n';
   $alert_msg.= 'Mailer Error: ' . $mail->ErrorInfo;
   $_SESSION['errorSending']=$alert_msg . " hi ";
   if(isset($_SESSION['pw'])){			
   		header("location: forgotPsWord.html");
   	}else{
   		header("location: Operator.php");
   }
   
}else{
		if(isset($_SESSION['pw'])){
			header("location: updatePW.php");	
		}else{
			$_SESSION['sendMailCheck']=1;
			header("location: Operator.php");
		}	
}
die();

?>