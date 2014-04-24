<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
	<link rel="stylesheet" type="text/css" href="css/iframe.css"/>
	<link rel="stylesheet" type="text/css" href="css/Signup.css"/>
		
	<script type="text/javascript">
		function goToNewPage()
		{
			var a=document.getElementById('select').value;
			if(a!='none')
			{
				window.open(a,"_self");
			}
		}
	</script>

</head>

<body>
	<section class="container">
		<img src="images/sexperiment.png" width="25" height="25" style="position: absolute; top: 55px; left: 45px;">
		<h1 style="width: 400px;";>Select Form</h1>
		<div class="seperator" style="position: absolute; left: 40px; top: 100px;  width: 500px;"></div>
		<div class="Operation" style="width: 470px;">Type of Experiment : </div>
		<select name="select" id="select" class="input_pulldown" style="position: absolute; top:150px; left:260px;" >
 				<option value="none" selected>Select Form</option>
				<option value="MSRFForm.html">Mass Spectroscopy Request Form</option>
				<option value="NMRFacility.html">NMR Facility Request Form</option>
				<option value="SingleCrystalXRayModified.html">Single Crystal X-Ray  Request Form</option>
				<option value="IR.html">IR Form</option>
				<option value="AFM.html">AFM  Request Form</option>
		</select>
		
		<div class="submit"><input type="button" name="commit" value="GO for it" style="position: absolute; top: 250px; left: 325px; width :150px;"  onclick="goToNewPage()" /></div>

	</section>
</body>

</html>
