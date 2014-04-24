<?php
session_start();
if(isset($_POST['first_name'])&&isset($_POST['last_name'])&&isset($_POST['roll_no'])&&
	isset($_POST['radios'])&&isset($_POST['email'])&&
	isset($_POST['first_name'])&&!empty($_POST['first_name'])&&
	!empty($_POST['last_name'])&&!empty($_POST['roll_no'])&&
	!empty($_POST['radios'])&&!empty($_POST['email'])&&
	isset($_POST['dob_day'])&&!empty($_POST['dob_day'])&&
	isset($_POST['dob_year'])&&!empty($_POST['dob_year'])&&
	isset($_POST['dob_month'])&&!empty($_POST['dob_month']))
		{
			$first_name=$_POST['first_name'];
			$last_name=$_POST['last_name'];
			$roll_no=$_POST['roll_no'];
			$DAY=$_POST['dob_day'];
			$YEAR=$_POST['dob_year'];
			$MONTH=$_POST['dob_month'];
			$DOB=strtotime("$DAY $MONTH $YEAR ");
			$EMAIL=$_POST['email'];
			if($_POST['radios']==true){
				$gender=1;
			}
			else
				$gender=0;
				include 'access_db.inc.php';
				mysql_query("UPDATE profile SET firstname='$first_name' ,lastname='$last_name' ,date_of_birth='$DOB',email='$EMAIL' ,gender='$gender' ,confirmed=0 WHERE rollno='$roll_no'");
				//send_notification();
		}
	else
		header("location: Signup.html");
?>