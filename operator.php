<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <title>HTML5 Contact Form</title>
    
    <link rel="stylesheet" media="screen" href="operator.css">
    <link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
    <link rel="stylesheet" type="text/css" href="css/Admin.css"/>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    
    <script>
    $(document).ready(function(){
    var totalChars      = 100; //Total characters allowed in textarea
    var countTextBox    = $('#message'); // Textarea input box
    var charsCountEl    = $('#countchars'); // Remaining chars count will be displayed here
    
    charsCountEl.text(totalChars); //initial value of countchars element
    countTextBox.keyup(function() { //user releases a key on the keyboard
        var thisChars = this.value.replace(/{.*}/g, '').length; //get chars count in textarea
        if(thisChars > totalChars) //if we have more chars than it should be
        {
            var CharsToDel = (thisChars-totalChars); // total extra chars to delete
            this.value = this.value.substring(0,this.value.length-CharsToDel); //remove excess chars from textarea
        }else{
            charsCountEl.text( totalChars - thisChars ); //count remaining chars
        }
        });
    });

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
        $('#file').change(function(){
            $('.filename').html($(this).val());
            });
        });
    </script>

</head>

<?php 

require_once 'connection.php';
session_start();

    $_SESSION['sendmail']=1;

    if($_SESSION['isLoggedIn']!=2){
        session_destroy();
        header("location: Login_form.php");
    }

    if(isset($_SESSION['errorSending'])){
        $alert_msg = $_SESSION['errorSending'];
        echo "<script type='text/javascript'>alert($alert_msg)</script>";
        unset($_SESSION['errorSending']);
    }
    if(isset($_SESSION['sendMailCheck'])){
        echo "<script type='text/javascript'>alert('Message has been sent')</script>";
        unset($_SESSION['sendMailCheck']);
    }

    $uname = $_SESSION['usr'];
    $uname = stripslashes($uname);
    $uname = mysql_real_escape_string($uname);
    
    $result = mysql_query("SELECT * FROM members WHERE username = '$uname'");
    $nameOperator = mysql_fetch_row($result);
        
?>

<body>

    <div class="introBar">
        <div class="introHead1">SICDOC</div>
        <div class="introHead2"><a href="http://iiti.ac.in/sic/"><font color="FFFFFF">Sophisticated Instrumentation Lab</font></a></div>
    </div>

    <iframe src="notifications.html" name="notifications" style="position: absolute; top: 70px; left: 0px; width: 1090px; height: 500px;" scrolling="no"; seamless;></iframe>
    <iframe src="approvals.html" name="approvals" style="position: absolute; top: 70px; left: 0px; width: 1090px; height: 500px; " scrolling="no"; seamless;></iframe>
    <iframe src="settings.html" name="settings" style="position: absolute; top: 70px; left: 0px; width: 1090px; height: 500px; " scrolling="no"; seamless;></iframe>
    <iframe src="view_profile.html" name="viewprofile" style="position: absolute; top: 70px; left: 0px; width: 1090px; height: 500px; " scrolling="no"; seamless;></iframe>
    <iframe src="home_operator.php" name="home" style="position: absolute; top: 0px; left: 0px; width: 1090px; height: 850px;" scrolling="no"; seamless;></iframe>

    <section class="sidebar">
        <div class="imagebox"><img src='<?php echo $nameOperator[6];?>' width="180" height="180"></div>
        <div class="seperatorA" style="position: absolute;  top: 230px;  left: 12px;"></div>
        <div class="sidebartext" style=" position: absolute;  top: 231px;  left: 40px; text-align: center; padding-left: 0px; width: 140px;"><?php echo $nameOperator[1]." ".$nameOperator[2]; ?></div>

        <div class="seperatorA" style="position: absolute;  top: 270px;  left: 12px;"></div>
        <a href="home_operator.php" target="home" id="home1" name="home1" style="text-decoration: none">
            <img src="images/home_blue.png" width="15" height="15" style="position: absolute; top: 305px; left: 25px;">
            <div class="sidebartext" style=" position: absolute;  top: 291px;  left: 40px;">Home</div>
        </a>

        <div class="seperatorA" style="position: absolute;  top: 330px;  left: 12px;"></div>
        <a href="notifications.html" target="notifications" id="notifications1" name="notifications1" style="text-decoration: none">    
            <img src="images/notifications_blue.png" width="15" height="15" style="position: absolute; top: 346px; left: 25px;">
            <div class="sidebartext" style=" position: absolute;  top: 331px;  left: 40px;">Notifications</div>
        </a>

        <div class="seperatorA" style="position: absolute;  top: 370px;  left: 12px;"></div>
        <a href="approvals.html" target="approvals" id="approvals1" name="approvals1" style="text-decoration: none" >
            <img src="images/approvals_blue.png" width="15" height="15" style="position: absolute; top: 385px; left: 24px;">
            <div class="sidebartext" style=" position: absolute;  top: 371px;  left: 40px;">Approvals</div>
        </a>
        
        <div class="seperatorA" style="position: absolute;  top: 410px;  left: 12px;"></div>
        <a href="view_profile.html" target="viewprofile" id="viewprofile1" name="viewprofile1" style="text-decoration: none" >
            <img src="images/viewhistory_blue.png" width="15" height="15" style="position: absolute; top: 425px; left: 24px;">
            <div class="sidebartext" style=" position: absolute;  top: 411px;  left: 40px;">View Profile</div>
        </a>    
        
        <div class="seperatorA" style="position: absolute;  top: 450px;  left: 12px;"></div>        
        <a href="settings.html" target="settings"  id="settings1" name="settings1" style="text-decoration: none">
            <img src="images/settings_blue.png" width="15" height="15" style="position: absolute; top: 464px; left: 23px;">
            <div class="sidebartext" style=" position: absolute;  top: 451px;  left: 40px;">Settings</div>
        </a>
        
    </section>
    <button class="logout" onClick="javascript:window.location.href ='logout.php'">Logout</button>    
</body>
</html>