<?php
session_start();
include("backend.php");
$mailto=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['Message'];
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
    $from_mail="test_report@vishwasjain.webatu.com";
    $from_name="website admin";//change this name to user
    $replyto="pkjain735@gmail.com";
    mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message);
?>
