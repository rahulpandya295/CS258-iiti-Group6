<?php

include 'connection.php';

$q = $_POST['queryString'];
$q = mysql_real_escape_string($q);
$q = htmlentities($q); 

if($q != ""){

$query_str = "SELECT CONCAT_WS(' ',`First Name`,`Last Name`) AS FullName FROM `members` WHERE (`username` LIKE '%".$q."%' OR `email` LIKE '%".$q."%' OR `phone_no` LIKE '%".$q."%' OR `First Name` LIKE '%".$q."%' OR `Last Name` LIKE '%".$q."%')";

$result = mysql_query($query_str);

if(mysql_num_rows($result) == 0){
		echo "<p>No suggestions!</p>";
}else{
		echo "<select name=>";
		while($name = mysql_fetch_assoc($result)){
			echo "<option value=".$name['FullName'].">" . $name['FullName'] . "</option>";
		}
		echo "</select>";
	}
}
?>
