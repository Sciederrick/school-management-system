<!DOCTYPE html>
<html lang='en'>
<head>
	<title>SVMS</title>
	<link href="../../css/all.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-image:url(../img/dust_scratches.png)">
<div class="container-fluid">
	<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">	
		<!--Brand-->
		<a class="navbar-brand" href="https://www.mu.ac.ke/index.php/en/">
			<img src="../img/mulogo.png" alt="Logo" style="width:40px;">
		</a>
		<!--Toggler/collapsible Button-->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!--Navbar links-->
		<div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
			<ul class="navbar-nav">		
			<span class="navbar-text d-none d-md-block"><i class="fas fa-home"></i></span>
			<li class="nav-item"><a class="nav-link" href="index">Home</a></li>	
			<span class="navbar-text pl-4 d-none d-md-block"><i class="fas fa-university"></i></span>
			<li class="nav-item"><a class="nav-link" href="index?p=contactus">Contact&nbsp;Us</a></li>
			<span class="navbar-text pl-4 d-none d-md-block"><i class="fas fa-lock-open"></i></span>
			<li class="nav-item"><a class="nav-link" href="../login.html">Login</a></li>	
			</ul>
		</div>
	</nav>		
	<div class="main">
	<!--Page Content-->		
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
</div>
</body>
</html>