<?php
session_start();

include ("access_db.inc.php");

$mailto=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['Message'];
$sent_time=date('d/m/Y h:i:s a');
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      header("location: Operater.html");
      }
    $filename=$_FILES["file"]["name"];
    $path="upload/";
	$saved_file_path="upload/".$filename;
    $from_mail="test_report@vishwasjain.webatu.com";
    $from_name="Website admin";//change this name to user
    
	include("backend.php");
	
	$replyto=$from;
	
    mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message);
?>
