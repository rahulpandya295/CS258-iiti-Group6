<?php
session_start();
include('access_db.inc.php');

function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    if (mail($mailto, $subject, "", $header)) {
              include("access_db.inc.php");
    $tb_name="sent_mail";
    $id=$_SESSION['usr']; 

    $query1="select email from members where username='$id'";

    $raw_results=mysql_query($query1);
    $results=mysql_fetch_array($raw_results);

    $from='rjk2399@gmail.com';

    $query2="   insert into sent_mail (sent_from,sent_to,subject,msg_details,msg_path)  
          values ('$from','$mailto','$subject','$message','$saved_file_path')";

    if(mysql_query($query2))
    {
      header("location : operator.html");
    }
    else 
    {
      header("location : sendmail.html");
    }
    
    
      
    } else {
        header("location : http://www.facebook.com");
    }
}
$mailto=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['Message'];
$sent_time=date('d/m/Y h:i:s a');
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      //echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
            }
    $filename=$_FILES["file"]["name"];
    $path="upload/";
  $saved_file_path="upload/".$filename;
    $from_mail="test_report@vishwasjain.webatu.com";
    $from_name="Website admin";//change this name to user
    $replyto="rjk2399@gmail.com";
  //include("backend.php");
    mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message);
?>      
