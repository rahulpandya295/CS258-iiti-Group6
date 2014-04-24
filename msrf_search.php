<?php            ////search results for table msrf
session_start();
	if($_SESSION['isLoggedIn']!=1 || $_SESSION['isLoggedIn']!=2 ){
		session_destroy();
	   	header("location: Login_form.php");
	}

include ("access_db.inc.php");

$id=$_GET['id'];

$index=$_GET['index'];
$tb_name="msrf";
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
		General Information<br />
		USER ID : '.$results['id'].'
		Sample CODE : '.$results['scode'].'
		Reasearch Group : '.$results['rgroup'].'<br />
		Sample Information : 
		Hazards : '.$results['hazard'].'
		Molecular Formula : '.$results['mformula'].' 
		Molecular Weight : '.$results['mweight'].'   Daltons <br />
		
		Solubility :
		</pre>
		';
		if($results['CH3CN']=='0')  echo "CH3CN : No<br />";
		else echo "CH3CN : Yes<br />";
		
		if($results['MeOH']=='0')  echo "MeOH : No<br />";
		else echo "MeOH : Yes<br />";
		
		if($results['CHCl3']=='0')  echo "CHCl3 : No<br />";
		else echo "CHCl3 : Yes<br />";
		
		if($results['IPA']=='0')  echo "IPA : No<br />";
		else echo "IPA : Yes<br />";
		
		if($results['H2O']=='0')  echo "H2O : No<br />";
		else echo "H2O : Yes<br />";
		
		echo "Request Analysis : <br />HRMS : ";
		
		if($results['HRMS']=='0')  echo " Positive Mode <br />";
		else echo " Negative Mode <br />";
		
		echo "ESI_MS : ";
		if($results['ESI_MS']=='0')  echo " Positive Mode <br />";
		else echo " Negative Mode <br />";

		echo '
		<pre>
		Submit Time : '.$results['submit_time'].'
		
		These samples do not contain Radioactivity
		</pre> ';
		
    }
	if($_SESSION['isLoggedIn']==1)
		{
		
			if($results['approved']=='0') 
			{
				
					$link='msrf_search.php'.'?'.'id='.$_GET['id'].'&index=001';				
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
