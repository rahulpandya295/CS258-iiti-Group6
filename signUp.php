<?php
	session_start();
	if(isset($_SESSION['errorSignUp'])){
		echo "<script type='text/javascript'>alert('Error Signing Up!')</script>";
		session_destroy();
    }

require_once 'connection.php';

    $uname = $_SESSION['usr'];
    $uname = stripslashes($uname);
    $uname = mysql_real_escape_string($uname);
    
    $result = mysql_query("SELECT * FROM members WHERE username = '$uname'");
    $nameAdmin = mysql_fetch_row($result);


?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
	<link rel="stylesheet" type="text/css" href="css/Admin.css"/>
	<link rel="stylesheet" type="text/css" href="css/Signup.css"/>
	<link rel="stylesheet" type="text/css" href="css/Form1.css"/>
	<link rel="stylesheet" type="text/css" href="css/Admin.css"/>
	<link rel="stylesheet" type="text/css" href="css/iframe.css"/>
	<link rel="stylesheet" type="text/css" href="css/search1.css" />
	<link rel="stylesheet" type="text/css" href="css/search2.css" />
	
	<script type="text/javascript">
		$('#dob_month, #dob_year').change(function() {
			var year = $('#dob_year').val();
			var month = $('#dob_month').val();
			if ((year != 0) && (month!=0)) {
				var lastday = 32 - new Date(year, month - 1, 32).getDate();
				var selected_day = $('#dob_day').val();

				// Change selected day if it is greater than the number of days in current month
				if (selected_day > lastday) {
					$('#dob_day > option[value=' + selected_day + ']').attr('selected', false);
					$('#dob_day > option[value=' + lastday + ']').attr('selected', true);
				}

				// Remove possibly offending days
				for (var i = lastday + 1; i < 32; i++) {
					$('#dob_day > option[value=' + i + ']').remove();	
				}

				// Add possibly missing days
				for (var i = 29; i < lastday + 1; i++) {
					if (!$('#dob_day > option[value=' + i + ']').length) {
						$('#dob_day').append($("<option></option>").attr("value",i).text(i));
					} 
				}
			}
		});
	</script>

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
	<section class="Signupbox" style="position: fixed; width: 990px; height: 500px; left: 40px; top: 90px;">
		<div class="Signuptext"style="position: absolute; width: 500px;left: 200px; top: 30px;" >Add User</div>
		<div class="seperatorS" style="width: 900px; top: 100px;"></div>
		<form method="post" action="signUpMysql.php" enctype="multipart/form-data">
			<input type="text" required title="First Name required" placeholder="First Name" data-icon="F" id="fName" name="fName" style="position: absolute; width: 275px; top: 120px; left: 50px; height: 40px;">
        	<input type="text" required title="Last Name required" placeholder="Last Name" data-icon="L" id="lName" name="lName" style="position: absolute; width: 275px; top: 120px; left: 375px; height: 40px;">
        	<input type="text" required title="Username required" placeholder="Username" data-icon="U" id="uName" name="uName" style="position: absolute; width: 275px; top: 200px; left: 50px; height: 40px;"><br>
        	<input type="Password" required title="Password required" placeholder="Password" data-icon="P" id="psWord" name="psWord" style="position: absolute; width: 275px; top: 200px; left: 375px; height: 40px;">
        	
        	<div class="infobar" style="position: absolute; top: 300px; left: 70px; width: 80px;">+91</div>

        	<input type="text" style="position: absolute; width: 200px; top: 290px; left: 100px; height: 40px;" required title="Phone Number required" placeholder="Phone Number" data-icon="H" name="phoneno">
        	
        	<div class="imagebox" style="left: 750px; top: 130px;"><img src="images/userdefault.png" width="190" height="190" style="position: absolute; top: 6px; left: -10px;"></div>
        	
        	<div class="Date" style="width: 390px; position: absolute; top:430px; left:85px; height: 40px;">Date of Birth: </div>

        	<select name="dob_month" id="dob_month" class="input_pulldown" style="width: 100px; position: absolute; top:425px; left:195px;">
 				<option value="0">Month</option>
 				<option value="1" selected="selected">January</option>
 				<option value="2">February</option>
 				<option value="3">March</option>
 				<option value="4">April</option>
 				<option value="5">May</option>
 				<option value="6">June</option>
 				<option value="7">July</option>    
 				<option value="8">August</option>
 				<option value="9">September</option>
 				<option value="10">October</option>
 				<option value="11">November</option>        
 				<option value="12">December</option>
			</select>

			<select name="dob_day" id="dob_day" class="input_pulldown" style="width: 100px position: absolute; top:425px; left:315px;">
  				<option value="0">Day</option>
  				<option value="1" selected="selected">1</option>
  				<option value="2">2</option>
  				<option value="3">3</option>
  				<option value="4">4</option>      
  				<option value="5">5</option>
  				<option value="6">6</option>
  				<option value="7">7</option>
  				<option value="8">8</option>                
  				<option value="9">9</option>
  				<option value="10">10</option>
  				<option value="11">11</option>
  				<option value="12">12</option>
  				<option value="13">13</option>
  				<option value="14">14</option>
  				<option value="15">15</option>
  				<option value="16">16</option>
  				<option value="17">17</option>                            
  				<option value="18">18</option>
  				<option value="19">19</option>
  				<option value="20">20</option>
  				<option value="21">21</option>                            
  				<option value="22">22</option>
  				<option value="23">23</option>
  				<option value="24">24</option>
  				<option value="25">25</option>                            
  				<option value="26">26</option>
  				<option value="27">27</option>
  				<option value="28">28</option>
  				<option value="29">29</option>                            
  				<option value="30">30</option>
  				<option value="31">31</option>
			</select>

			<select name="dob_year" id="dob_year" class="input_pulldown" style="width: 100px position: absolute; top:425px; left:385px;">
				<option value="0">Year</option>
				<option value="2000" selected="selected">2000</option>
				<option value="1999">1999</option>                             
				<option value="1998">1998</option>
				<option value="1997">1997</option>
				<option value="1996">1996</option>
				<option value="1995">1995</option>            
				<option value="1994">1994</option>
				<option value="1993">1993</option>
				<option value="1992">1992</option>
				<option value="1991">1991</option>            
				<option value="1990">1990</option>
				<option value="1989">1989</option>
				<option value="1988">1988</option>
				<option value="1987">1987</option>
				<option value="1986">1986</option>
				<option value="1985">1985</option>
				<option value="1984">1984</option>
				<option value="1983">1983</option>
				<option value="1982">1982</option>
				<option value="1981">1981</option>
				<option value="1980">1980</option>
				<option value="1979">1979</option>
				<option value="1978">1978</option>
				<option value="1977">1977</option>
				<option value="1976">1976</option>
				<option value="1975">1975</option>
				<option value="1974">1974</option>
				<option value="1973">1973</option>
				<option value="1972">1972</option>
				<option value="1971">1971</option>
				<option value="1970">1970</option>
				<option value="1969">1969</option>
				<option value="1968">1968</option>
				<option value="1967">1967</option>
				<option value="1966">1966</option>
				<option value="1965">1965</option>
				<option value="1964">1964</option>
				<option value="1963">1963</option>
				<option value="1962">1962</option>
				<option value="1961">1961</option>
				<option value="1960">1960</option>
				<option value="1959">1959</option>
				<option value="1958">1958</option>
				<option value="1957">1957</option>
				<option value="1956">1956</option>
				<option value="1955">1955</option>
				<option value="1954">1954</option>
				<option value="1953">1953</option>
				<option value="1952">1952</option>
				<option value="1951">1951</option>
				<option value="1950">1950</option>
				<option value="1949">1949</option>
				<option value="1948">1948</option>
				<option value="1947">1947</option>
			</select>

			<div class="Operation" style="top: 340px; left: 705px; width: 270px; height: 40px;">Select Rank: </div>
		<select name="select" class="input_pulldown" style="position: absolute; top:335px; left:800px;" >
 				<option value="0">Select Your Rank</option>
 				<option value="1">Admin</option>
 				<option value="2">Operator</option>
 				<option value="3" >User</option>
		</select>

			<div class="Gender" style="position: absolute; width: 245px; top: 300px; left: 410px; height: 40px;">Gender: </div>
			<input type="radio" id="radio1" name="gender" value="1" style="width: 100px; position: absolute; top:472px; left:50px;" checked>
  			 <label for="radio1" style="position: absolute; top: 310px; left: 500px;">Male</label>
			<input type="radio" id="radio2" name="gender" value="2" style="width: 100px; position: absolute; top:358px; left:50px;">
  			 <label for="radio2" style="position: absolute; top: 310px; left: 560px;">Female</label>

        	<input type="text" required title="Email Name required" style="position: absolute; width: 450px; top: 350px; height: 40px; left: 51px;" placeholder="Your Email" data-icon="E" id="email" name="email"></br>
        	
        	<div class="uploadTag" style="left: 750px; top: 130px;"></div>
        	<div class="submit"><input type="submit" style="position: absolute; top:420px; left:710px" name="submit" value="Sign Up"></div>
    		<div class="submit"><input type="file" style="position: absolute; top: 171px; left: 750px; cursor: pointer; width: 183px; height: 182px;" name="Photo" value="Upload Photo"></div>
    		</div>
		</form>
	</section>
	
	<!--SideBar Contents-->
	<section class="sidebar">
		<div class="imagebox"><img src='<?php echo $nameAdmin[6];?>' width="180" height="180"></div>
		
		<div class="seperatorinbox" style="position: absolute;  top: 230px;  left: 12px;"></div>
		<div class="sidebartext" style=" position: absolute;  top: 231px;  left: 40px; text-align: center; padding-left: 0px; width: 140px;"><?php echo $nameAdmin[1]." ".$nameAdmin[2]; ?></div>
		<div class="seperatorinbox" style="position: absolute;  top: 270px;  left: 12px;"></div>
		
		<div class="seperatorinbox" style="position: absolute;  top: 330px;  left: 12px;"></div>
		
		<a href="Notifications_Admin.html" style="text-decoration: none">	
			<img src="images/notification.png" width="15" height="15" style="position: absolute; top: 305px; left: 25px;">
			<div class="sidebartext" style=" position: absolute;  top: 291px;  left: 40px;">Notifications</div>
		</a>
		
		<div class="seperatorinbox" style="position: absolute;  top: 370px;  left: 12px;"></div>
		
		<a href="Approvals.html" style="text-decoration: none" >
			<img src="images/approval.png" width="15" height="15" style="position: absolute; top: 346px; left: 24px;">
			<div class="sidebartext" style=" position: absolute;  top: 331px;  left: 40px;">Approvals</div>
		</a>
		
		<div class="seperatorinbox" style="position: absolute;  top: 410px;  left: 12px;"></div>
		
		<a href="View_history.html" style="text-decoration: none" >
			<img src="images/viewhistory.png" width="15" height="15" style="position: absolute; top: 385px; left: 24px;">
			<div class="sidebartext" style=" position: absolute;  top: 371px;  left: 40px;">View History</div>
		</a>	
		
		<div class="seperatorinbox" style="position: absolute;  top: 450px;  left: 12px;"></div>

		<a href="Settings.html" style="text-decoration: none">
   			<img src="images/settings.png" width="15" height="15" style="position: absolute; top: 425px; left: 23px;">
   			<div class="sidebartext" style=" position: absolute;  top: 411px;  left: 40px;">Settings</div>
   		</a>
   		

   		<a href="sliderGallery/Slider/index.html" style="text-decoration: none">
   			<img src="images/notification_blue.png" width="15" height="15" style="position: absolute; top: 465px; left: 23px;">
   			<div class="sidebartext" style=" position: absolute;  top: 451px;  left: 40px;">Gallery</div>
   		</a>


	</section>
	<!--End of Sidebar Content-->
	<button class="logout" onClick="javascript:window.location.href ='logout.php'">Logout</button>
	
</body>

</html>