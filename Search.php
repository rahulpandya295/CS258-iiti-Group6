

<?php

echo <<<_END

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<form action="search.php" method="POST">
    <input type="text" name="query" />
    <input type="submit" value="Search" />
	<input type="hidden" name="doSearch" value="1">
</form>
 
</body>
</html>

_END;

include 'access_db.inc.php';

if (@$_POST['doSearch']==1)
{
$query=$_POST['query'];

    $min_length = 0;
    
     
    if(strlen($query) >= $min_length ){ 
         
        $query = htmlspecialchars($query); 
		$query = mysql_real_escape_string($query);
		$query = htmlentities($query); 
		$query = stripslashes($query); 
		
		$raw_results = mysql_query("SELECT * FROM members
            WHERE (`firstname` LIKE '%".$query."%') OR (`lastname` LIKE '%".$query."%') OR (`username` LIKE '%".$query."%') ORDER BY firstname LIMIT 10 	" ) ;
             
		
        echo "<h1>Search Results : </h1>";
        if(mysql_num_rows($raw_results) > 0){ 
		
            
            
			while($results = mysql_fetch_array($raw_results)){
					echo " ".$results['firstname']."  ".$results['lastname']."<br />";
            }
			
			
        
		}
        else{ 
            echo "No results";
        }
         
    }
    


}

?>



