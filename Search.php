<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
    <link rel="stylesheet" type="text/css" href="css/Search.css"/>
    <link rel="stylesheet" type="text/css" href="css/Admin.css"/>
    <link rel="stylesheet" type="text/css" href="css/Form.css"/>
    <link rel="stylesheet" type="text/css" href="css/iframe.css"/>
    <link rel="stylesheet" type="text/css" href="css/search1.css" />
    <link rel="stylesheet" type="text/css" href="css/search2.css" />

</head>

<body>
    <div class="introBar">
        <div class="introHead1"><a href="Login_form.php" style="text-decoration: none; color: #FFF;">SICDOC</a></div>
        <div class="introHead2" style="left: 1200px;"><a href="http://iiti.ac.in/SIC/" style="text-decoration: none; color: #FFF;">Sophisticated Instrumentation Lab</a></div>
            

        <div style="position: relative; top: 17px; left: 250px;">
                <form class="search" action="Search.php" method="POST">
                  <input type="search" name="search" placeholder="Search here..." required>
                  <button type="submit">Search</button>
                </form>   
        </div>

    </div>

<!--
<form action="search_query.php" class="search-wrapper cf" method="POST">
        <input type="text" style="position: absolute; top:0px; left:0px; padding-left: 15px; margin: 0px; height: 30px; width: 400px; " placeholder="Search" required="">
        <button type="submit">Search</button>
</form>
-->
        <div style="position: absolute; top: 100px; left:100px;">
            <section class="container">
                <img src="images/search.png" width="52" height="52" style="position: absolute; top: 55px; left: 15px;">
                <h1 style="position: absolute; top: 5px; left: 85px; font-size: 40px;">Search&nbspResults</h1>
                <div class="seperator" style="position: absolute; left: 87px; top: 100px;  width: 900px;"></div>        
            </section>
        </div>
<div style="position: absolute; top: 250px; left: 200px;">
<?php
include 'connection.php';

$q = $_POST['search'];
$q = mysql_real_escape_string($q);
$q = htmlentities($q);

if($q != ""){
    $qry = "SELECT CONCAT_WS(' ',`First Name`,`Last Name`) AS FullName, `email`, `imagePath` FROM `members` WHERE `First Name` LIKE '%$q%' OR `Last Name` LIKE '%$q%' OR `email` LIKE '%$q%' OR `phone_no` LIKE '%$q%' ORDER BY `id`";
    $sql_res=mysql_query($qry);

if(mysql_num_rows($sql_res) == 0){
        echo "<div class='SearchBox'><div class='Details'>No suggesstions</div></div>";
}else{
        while($name = mysql_fetch_assoc($sql_res)){
            echo "<div class='SearchBox'><div class='imageBox' style='padding-top:20px; padding-left:25px;'><img src='" . $name['imagePath'] . "' width='60px' height='60px'></div><div class='Name'>" . $name['FullName'] . "</div><div class='Details'>". $name['email'] ."</div></div><br><br>";
        }
      }
    }
?>
</div>
</body>
</html>
