<html>

<head>
	<link rel="stylesheet" type="text/css" href="operator.css">
</head>
<?php 
	session_start();
	if($_SESSION['isLoggedIn']!=2){
		session_destroy();
	   	header("location: Login_form.php");
	}

	if(isset($_SESSION['errorSending'])){
		$alert_msg = $_SESSION['errorSending'];
		echo "<script type='text/javascript'>alert('$alert_msg')</script>";
		unset($_SESSION['errorSending']);
    }
?>

<body>
<div class="pagehead">Send Mail</div>
<div class="container">
	<form action="send_mail.php" method="POST" enctype="multipart/form-data">
	<div class="content" style="position: absolute; top: 30px; left: 25px;">Sender's Name: </div><input placeholder="Sender's Name" style="position: absolute; top: 27px; width: 250px; height: 25px; left: 165px;" type="text" name="operatorName"><br><br>
	<div class="content" style="position: absolute; top: 60px; left: 25px;">Sender's Email: </div><input placeholder="Sender's Email" style="position: absolute; top: 57px; width: 250px; height: 25px; left: 165px;"type="text" name="operatorEmail"><br><br>
	<div class="content" style="position: absolute; top: 90px; left: 25px;">Sender's Password: </div><input placeholder="Sender's Password" style="position: absolute; top: 87px; width: 250px; height: 25px; left: 165px;" type="password" name="operatorPass"><br><br>
	<div class="content" style="position: absolute; top: 120px; left: 25px;">Receipent's Email: </div><input placeholder="Receipent's Mail" style="position: absolute; top: 117px; width: 250px; height: 25px; left: 165px;" type="text" name="receipentEmail"><br><hr><br>
	<div class="content" style="position: absolute; top: 200px; left: 25px;">Subject:  </div><input placeholder="Subject" style="position: absolute; top: 190px; width: 450px; height: 35px; left: 105px;" type="text" name="subject"><br><br>
	<input style="position: absolute; top: 400px; left: 525px;" type="file" name="file" ><br><br>
	<div class="content" style="position: absolute; top: 270px; left: 20px;">Message Body:</div><br><textarea placeholder="Message" style="position: absolute; top: 300px; left: 20px;" rows="12" cols="80" name="comment"></textarea><br><br>
<button style="position: absolute; top: 450px; left: 525px;" type="submit">Send</button>
</div>
</form>
</body>
