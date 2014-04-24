<?php

require_once 'connection.php';

$usname = $_POST['uname'];
$psword = $_POST['pword'];
$usname = stripslashes($usname);
$psword = stripslashes($psword);

$usname = mysql_real_escape_string($usname);
$psword = mysql_real_escape_string($psword);

$passLength=strlen($psword);
$passLength*=$passLength;
$passLength+=2*$passLength;
$passLength-=2;
//Encryption algorithm => 3*x*x-2
$psword.=$passLength;
$psword = md5($psword);
$sql="SELECT * FROM $tbl_name WHERE username='$usname' and password= '$psword'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
session_start();
	if($count==1){
		$_SESSION['pswd']=$psword;
		$_SESSION['usr']=$usname;
		header("location: checkField.php");
		}
	else {
		//echo $_SESSION['pswd'] . $_SESSION['usr'];
		$_SESSION['wrongPassword']=1;
		header("location: Login_form.php");
		}
?>

</body>
</html>