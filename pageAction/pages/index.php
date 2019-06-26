<!DOCTYPE html>
<html>
<head>	
<title>SVMS|Admin</title>	
	<link href="../../css/all.css" rel="stylesheet" type="text/css"/>style="background-image:url(../../img/doodles.png)"
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-image:url(../../img/doodles.png)">
<div class="container-fluid">
<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">	
	<!--Brand-->
	<a class="navbar-brand" href="https://www.mu.ac.ke/index.php/en/">
		<img src="../../img/mulogo.png" alt="Logo" style="width:40px;">
	</a>
	<!--Toggler/collapsible Button-->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!--Navbar links-->
	<div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
		<ul class="navbar-nav">		
		<span class="navbar-text pl-4 d-none d-md-block"><i class="fas fa-user-edit"></i></span>
		<li class="nav-item"><a class="nav-link" href="#">User</a></li>
		<span class="navbar-text pl-4 d-none d-md-block"><i class="fas fa-database"></i></span>			
		<li class="nav-item"><a class="nav-link" href="adminpages/database.inc.php" target="_blank">Database</a></li>
		<span class="navbar-text pl-4 d-none d-md-block"><i class="far fa-comments" target="_blank"></i></span>
		<li class="nav-item"><a class="nav-link" href="adminpages/support.inc.php"  target="_blank">Support</a></li>		
		<span class="navbar-text pl-4 d-none d-md-block"><i class="fas fa-laptop-code"></i></span>
		<li class="nav-item"><a class="nav-link" href="../index.php" target="_blank">System</a></li>	
		</ul>
	</div>
</nav>	
</div>
<div class="main">
<div class="container my-5 py-3 bg-light">
<?php require_once("adminpages/user.inc.php");?>
</div>
</div>
</body>
</html>

