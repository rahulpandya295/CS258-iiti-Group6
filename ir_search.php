<?php

session_start();
	if($_SESSION['isLoggedIn']!=1 || $_SESSION['isLoggedIn']!=2 ){
		session_destroy();
	   	header("location: Login_form.php");
	}
	
include ("access_db.inc.php");

$id=$_GET['id'];
$index=$_GET['index'];
$tb_name="ir_form";
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
		Solubility : '.$results['solubility'].'
		Hazards : '.$results['hazard'].'
		Calibration Concentration : '.$results['calcon'].'
		Excitation Wavelength : '.$results['ewave'].' um
		Molecular Formula : '.$results['mformula'].'
		Molecular Weight : '.$results['mweight'].'   Daltons 
		Range Scan : '.$results['rangescan'].'<br />
		Special Request : '.$results['request'].'<br />
		
		Request Analysis :
		</pre>
		';
		if($results['solid']=='0')  echo "Solid (KBr Pallate) : No<br />";
		else echo "Solid (KBr Pallate) : Yes<br />";
		
		if($results['liquid']=='0')  echo "Liquid (Liquid Cells): No<br />";
		else echo "Liquid (Liquid Cells) : Yes<br />";
		
		if($results['air']=='0')  echo "ATR : No<br />";
		else echo "ATR : Yes<br />";

		echo '
		<pre>
		Submit Time : '.$results['submit_time'].'<br />
		
		These samples do not contain Radioactivity
		</pre> ';
		
    }
	if($_SESSION['isLoggedIn']==1)
		{
		
			if($results['approved']=='0') 
			{
				
					$link='ir_search.php'.'?'.'id='.$_GET['id'].'&index=001';				
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
