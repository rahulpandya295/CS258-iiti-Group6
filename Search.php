<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/Search.css"/>
<link rel="stylesheet" type="text/css" href="css/layout0.css"/>
</head>

<body>
<div class="introBar">
        <div class="introHead1">SICDOC</div>
        <div class="introHead2"> Sophisticated Instrumentation Lab </div>
 </div>


<form action="Search.php" class="search-wrapper cf">
        <input type="text" style="position: absolute; top:0px; left:0px; padding-left: 15px; margin: 0px; height: 30px; width: 400px; " placeholder="Search" required="">
        <button type="submit">Search</button>
</form>

<?php
include 'connection.php';

$q = $_POST['search'];
$q = mysql_real_escape_string($q);
$q = htmlentities($q); 

if($q != ""){

$query_str = "SELECT CONCAT_WS(' ',`First Name`,`Last Name`) AS FullName FROM `members` WHERE (`username` LIKE '%".$q."%' OR `email` LIKE '%".$q."%' OR `phone_no` LIKE '%".$q."%' OR `First Name` LIKE '%".$q."%' OR `Last Name` LIKE '%".$q."%')";
$result = mysql_query($query_str);

if(mysql_num_rows($result) == 0){
        echo "<div class='SearchBox' style='top: 250px; left: 125px;'><div class='imagebox'></div><div class='Name'>No results found!</div></div>";
}else{
        echo "<div class='SearchBox' style='top: 250px; left: 125px;'>";
        while($name = mysql_fetch_assoc($result)){
            echo "<div class='imagebox'></div><div class='Name'>" . $name['FullName'] . "</div><div class='Details'>Indian Institute of Technology, Indore.</div>";
        }
        echo "</div>";
    }
}
?>

<a href="Admin.html">
<div class="SearchBox" style="top: 250px; left: 125px;">
    <div class="imagebox">
    </div> 
    <div class="Name">Aman Doshi
    </div>
    <div class="Details">Indian Institute of Technology, Indore.
    </div>             
</div>
</a>

<a href="Admin.html">
<div class="SearchBox" style="top: 450px; left: 125px;">
    <div class="imagebox">
    </div> 
    <div class="Name">RadhaKishan
    </div>
    <div class="Details">Indian Institute of Technology, Indore.
    </div>             
</div>
</a>

<a href="Operator.html">
<div class="SearchBox" style="top: 650px; left: 125px;">
    <div class="imagebox">
    </div> 
    <div class="Name">Rahul Pandya
    </div>
    <div class="Details">Indian Institute of Technology, Indore.
    </div>             
</div>
</a>

<a href="User.html">
<div class="SearchBox" style="top: 850px; left: 125px;">
    <div class="imagebox">
    </div> 
    <div class="Name">Vishwas Jains
    </div>
    <div class="Details">Indian Institute of Technology, Indore.
    </div>             
</div>
</a>

</body>
</html>
