<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>Autocomplete search using php, mysql and ajax</title>

	<link rel="stylesheet" type="text/css" href="css/Layout0.css"/>

	<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
	<script type="text/javascript">
	
	$(function(){
		$(".search").keyup(function() { 
		var searchid = $(this).val();
		var dataString = 'search='+ searchid;
			if(searchid!='') {
				$.ajax({
				type: "POST",
				url: "search.php",
				data: dataString,
				cache: false,
				success: function(html){
						$("#result").html(html).show();
					}
				});
			}return false;    
		});

		jQuery("#result").live("click",function(e){ 
			var $clicked = $(e.target);
			var $name = $clicked.find('.name').html();
			var decoded = $("<div/>").html($name).text();
			$('#searchid').val(decoded);
		});
		
		jQuery(document).live("click", function(e) { 
			var $clicked = $(e.target);
				if (! $clicked.hasClass("search")){
					jQuery("#result").fadeOut(); 
				}
		});

		$('#searchid').click(function(){
			jQuery("#result").fadeIn();
			});
	});
	
	</script>

	<style type="text/css">
		body{ 
			font-family:'Lato', Geneva, sans-serif;
		}

		.content {
			width:900px;
			margin:0 auto;
		}

		#searchid {
			position: absolute;
			left:800px;
			top:80px;
			width:500px;
			height:30px;
			padding:10px;
			font-size: 14px;
  			font-weight: 800;
  			margin-left: 35px;
  			margin-right: 15px;
  			margin-bottom: 30px;
  			margin-top: 10px;
  			color: #404040;
			background: #f9f9f9;
			border: 1px solid;
			border-color: #c4c4c4 #d1d1d1 #d4d4d4;
	   	    border-radius: 2px;
		    outline: 3px solid #eff4f7;
  			-moz-outline-radius: 3px;
  			@include box-shadow(inset 0 1px 3px rgba(black, .12));
  				 &:focus {

		    border-color: #7dc9e2;
		    outline-color: #dceefc;
    		outline-offset: 0;
  			
		}
	
		#result {
			position: absolute;
			left:884px;
			top:51px;
			width:480px;
			padding:10px;
			display:none;
			margin-top:-1px;
			border-top:0px;
			overflow:hidden;
			border:2px black solid;
			background-color: #404040;
		}
		
		.show {
			padding:10px;
			border-bottom:1px #999 dashed;
			font-size:15px; 
			height:50px;
		}
		
		.show:hover {
			background:#4c66a4;
			color:#FFF;
			cursor:pointer;
		}

	</style>
</head>

<body>
	<div class="introBar">
		<div class="introHead1">SICDOC</div>
		<div class="introHead2">Sophisticated Instrumentation Lab</div>
	</div>

<div class="content">
	<input type="text" class="search" id="searchid" placeholder="Search for people" /><br /> 
	<div id="result" style="position: absolute; left:835px; top:121px;"></div>
</div>
</body>
</html>
