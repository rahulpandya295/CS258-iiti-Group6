<?php

session_start();
	if($_SESSION['isLoggedIn']!=1 || $_SESSION['isLoggedIn']!=2 ){
		session_destroy();
	   	header("location: Login_form.php");
	}


include ("access_db.inc.php");

$id=$_GET['id'];
$index=$_GET['index'];
$tb_name="afm";

$query= "select * from $tb_name where `form_id` = $id";

$raw_results=mysql_query($query);

if(mysql_num_rows($raw_results) > 0)
{ 
		
            
            
	while($results = mysql_fetch_array($raw_results))
	{
		
		if($index=='001' && $results['approved']=='0')
		{
			$query1="UPDATE $tb_name SET approved='1' where `form_id` = $id";
			$results['approved']='1';
			mysql_query($query1);
			
		}
		
		echo '
		
		
		SIC CODE : '.$results['sic_code'].'<br />
		User Code : '.$results['user_code'].'<br />
		Name of Supervisor : '.$results['supervisor_name'].'<br />
		Sample Type : '.$results['Stype'].'<br />
		Substrate : '.$results['Substrate'].'<br />
		Mode for Scanning : '.$results['Mode_of_scanning'].'<br />
		Scan Extents : <br />
		X-axis : '.$results['x'].' um<br />
		Y-axis : '.$results['y'].' um<br />
		Z-axis : '.$results['z'].' um<br />
		Electrical Properties : '.$results['electricalproperties'].'<br />
		Magnetic Properties : '.$results['magneticproperties'].' <br />

		Short Description : '.$results['details'].'<br />
		Submit Time : '.$results['submit_time'].'<br />
		 ';

		if($_SESSION['isLoggedIn']==1)
		{
		
			if($results['approved']=='0') 
			{
				
					$link='afm_search.php'.'?'.'id='.$_GET['id'].'&index=001';				
					echo '<a href='.$link.'>Approve</a>';
			}
			else 
				echo "<b>Approved</b><br />";
		}
		
		if($_SESSION['isLoggedIn']==2)
		{
			$query2="UPDATE $tb_name SET approved='2' where `form_id` = $id";
			mysql_query($query2);
		}
		
		
    }
	
	
	
	
			
  }
?>
