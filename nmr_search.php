<?php            ////search results for table nmr

session_start();
	if($_SESSION['isLoggedIn']!=1 || $_SESSION['isLoggedIn']!=2 ){
		session_destroy();
	   	header("location: Login_form.php");
	}

include ("access_db.inc.php");

$id=$_GET['id'];
$index=$_GET['index'];
$tb_name="nmr";
$query= "select * from $tb_name where `form_id` = $id";
$raw_results=mysql_query($query);

if(mysql_num_rows($raw_results) > 0)
{ 
	while($results = mysql_fetch_array($raw_results))
	{
		
		if($index=='001' && $results['approved']=='0')
		{
			$query1="UPDATE $tb_name SET approved=1 where `form_id` = $id";
			$results['approved']='1';
			mysql_query($query1);
		}
		
		
		echo '
		
		<pre>
		Experiment Information<br />
		USER ID : '.$results['id'].'<br />
		Sample CODE : '.$results['scode'].'<br />
		Sample Amount : '.$results['samount'].'  (in mg) <br />
		Molecular Formula : '.$results['mformula'].' <br />
		Solvent : '.$results['solvent'].' <br />
		Details : '.$results['details'].' <br />
		
		Submit Time : '.$results['submit_time'].'<br />
		</pre> ';
		
    }
	if($_SESSION['isLoggedIn']==1)
		{
		
			if($results['approved']=='0') 
			{
				
					$link='nmr_search.php'.'?'.'id='.$_GET['id'].'&index=001';				
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
?>
