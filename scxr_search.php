<?php            ////search results for table scxr

session_start();
	if($_SESSION['isLoggedIn']!=1 || $_SESSION['isLoggedIn']!=2 ){
		session_destroy();
	   	header("location: Login_form.php");
	}

include ("access_db.inc.php");

$id=$_GET['id'];
$index=$_GET['index'];

$tb_name="scxr";
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
		<b>Single Crystal X-Ray Diffraction Facility</b><br />
		<b>Instrument: Dual Source Super Nova CCD System from Agilent Technologies (Oxford Diffraction)</b><br />
		General Information : 
		USER ID : '.$results['id'].'
		User CODE : '.$results['scode'].'
		Supervisor Name : '.$results['sname'].'
		SIC Code : '.$results['sic_code'].'
		
		Stability :
		</pre>
		';
		if($results['Stable']=='0')  echo "Stable : No<br />";
		else echo "Stable : Yes<br />";
		
		if($results['AirSensitive']=='0')  echo "Air Sensitive : No<br />";
		else echo "Air Sensitive : Yes<br />";
		
		if($results['MoistureSensitive']=='0')  echo "Moisture Sensitive : No<br />";
		else echo "Moisture Sensitive : Yes<br />";
		
		echo "Other* <br />";
		
		if($results['IR']=='0')  echo "IR : No<br />";
		else echo "IR : Yes<br />";
		
		if($results['NMR']=='0')  echo "NMR : No<br />";
		else echo "NMR : Yes<br />";
		
		if($results['MassSpectrum']=='0')  echo "MassSpectrum : No<br />";
		else echo "MassSpectrum : Yes<br />";
		
		echo " *other techniques used for characterisation. <br />";
		
		echo "Crystal Information : <br />";

		echo '
		<pre>
		Color : '.$results['color'].'<br />
		Melting Point : '.$results['mpoint'].'<br />
		Starting material and Solvent Information : '.$results['info'].'<br />
		
		Submit Time : '.$results['submit_time'].'<br />
		
		</pre> ';
		
		
		
    }
	if($_SESSION['isLoggedIn']==1)
		{
		
			if($results['approved']=='0') 
			{
				
					$link='scxr_search.php'.'?'.'id='.$_GET['id'].'&index=001';				
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
