<!DOCTYPE html>
<html lang='en'>
<head>
	<title>School Venue Management System</title>
	<link href="../../css/all.css" rel="stylesheet" type="text/css"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="header">
		<h1>Moi University Venue System</h1>
	</div>
	<div class="nav">
	<!--sidebar-->	
		<button id="sidebar_close">Close &times;</button>
		<table>		
			<tr><td><i class="fas fa-home">&nbsp;&nbsp;<a href="index">Home</a></i></td></tr>		
			<tr><td><i class="fas fa-university">&nbsp;&nbsp;<a href="index?p=venueprofiles">Venues</a></i></td></tr>			
			<tr><td><i class="fas fa-phone">&nbsp;&nbsp;<a href="index?p=contactus">Contact&nbsp;Us</a></i></td></tr>
			<tr><td><i class="fas fa-code">&nbsp;&nbsp;<a href="index?p=credits">Credits</a></i></td></tr>		
			<tr><td><i class="fas fa-lock-open">&nbsp;&nbsp;<a href="../login.html">Login</a></i></td></tr>	
		</table>		
	</div>
	<div class="main">
	<!--Page Content-->		
		<button id="sidebar_open">&#9776;</button>
		<?php

					$dir="pages";


			if(!empty($_GET['p'])){
				$dir_files=scandir($dir,0);
				unset($dir_files[0],$dir_files[1]);
				$p=$_GET['p'];
					if(in_array($p.'.inc.php', $dir_files)){
						include($dir.'/'.$p.'.inc.php');
					}
					else{					
						echo 'Sorry, Page Not Found!';
					}
			}else{
				include($dir.'/'.'home.inc.php');
			}
			
		?>
	</div>	
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/sidemenu_effects.js"></script>
</html>