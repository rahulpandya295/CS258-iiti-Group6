<?php
	require_once 'connection.php';
  session_start();

	$uname = $_SESSION['usr'];	
	$uname = stripslashes($uname);
  $uname = mysql_real_escape_string($uname);
    
  $result = mysql_query("SELECT * FROM members WHERE username = '$uname'");
  $nameAdmin = mysql_fetch_row($result);
  
  if($nameAdmin[10] == 1){
    $field = "Admin";
  }else if($nameAdmin[10] == 2){
    $field = "Operator";
  }else{
    $field = "User";
  }


  if($nameAdmin[5] == 1){
    $sex = "Male";
  }else if($nameAdmin[5] == 2){
    $sex = "Female";
   }



?>
<html>
<head>
	<title>Profile</title>
  <link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
  <link rel="stylesheet" type="text/css" href="css/Admin.css"/>
  <link rel="stylesheet" type="text/css" href="css/iframe.css"/>
  <link rel="stylesheet" type="text/css" href="css/search1.css" />
  <link rel="stylesheet" type="text/css" href="css/search2.css" />
  <link rel="stylesheet" type="text/css" href="css/Search.css" />
</head>
<body>
  <div class="introBar">
    <div class="introHead1"><a href="Login_form.php" style="text-decoration: none; color: #FFF;">SICDOC</a></div>
    <div class="introHead2" style="left: 1200px;"><a href="http://iiti.ac.in/SIC/" style="text-decoration: none; color: #FFF;">Sophisticated Instrumentation Lab</a></div>
  

    <div style="position: relative; top: 17px; left: 250px;">
          <form class="search" action="Search.php" method="POST">
          <input type="search" placeholder="Search here..." required>
          <button type="submit">Search</button>
        </form>   
      </div>

      
  </div>
  <div style="position: absolute; top:120px; width: 0; height: 0; border-top: 26px solid transparent; border-bottom: 24px solid transparent; border-right:24px solid #00cc66;"></div>
  <button class="submit" onClick="javascript:window.location.href ='Login_form.php'" style="position: fixed; left:24px; width:150px; height:50px; top: 120px; font-size: 18px; font-weight: normal; color: #fff; text-shadow: 0 1px #e3f1f1; background: #00cc66; border: 1px solid; border-color: #b4ccce #b3c0c8 #9eb9c2; border-left: 0px;">Back to Home</button>
	<div class="f_password" style="position:absolute; width:800px; height:400px; top:160px; left:200px; background-color: #FFF;">
      <div style="padding-top:10px; padding-left:20px;"><img src='<?php echo $nameAdmin[6];?>' width="180" height="180"></div>
      <div style="position: absolute; top: 50px; left: 300px; font-size: 2.3em; font-weight: 600; font-family: 'Lato', cursive;"><?php echo $nameAdmin[1]." ".$nameAdmin[2]; ?></div>
      <div class="seperator" style="position: absolute; top: 110px; left: 215px; width: 510px;"></div>
      <div style="position: absolute; left: 300px; top: 130px;">
            <div style="padding-left:2em; padding-top:0.5em;"><strong>Username: </strong>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $nameAdmin[3];?><br></div>
            <div style="padding-left:2em; padding-top:0.5em;"><strong>Hierarchy: </strong>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $field;?><br></div>
            <div style="padding-left:4.9em; padding-top:0.5em;"><strong>Sex: </strong>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $sex;?><br></div>
            <div style="padding-left:0.9em; padding-top:0.5em;"><strong>Date of Birth: </strong>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $nameAdmin[7] . "/" . $nameAdmin[8] . "/" . $nameAdmin[9];?><br></div>
            <div style="padding-left:3em; padding-top:0.5em;"><strong>Contact: </strong>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $nameAdmin[12];?><br></div>
            <div style="padding-left:4.1em; padding-top:0.5em;"><strong>Email: </strong>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $nameAdmin[11];?><br></div>
            
      </div>
	</div>
</body>
</html>
