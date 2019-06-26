<!DOCTYPE html>
<html lang='en'>
<head>
	<title>Venue_Management_System|Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url(./img/dust_scratches.png)">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-5">
			<img class="img-fluid mx-auto d-none d-md-block" src="../img/matt-flores-1620018-unsplash.jpg" height="100%" width="100%" class="rounded">
		</div>
		<div class="col-md-7 pt-5 d-flex flex-wrap flex-column h-100 align-content-center justify-content-center">
		<form class="w-75 py-2 px-3 mx-auto bg-light" action="" method="POST"  name="form" id="regForm" onsubmit="return validate();" enctype="multipart/form-data">
			<div class="form-group mb-3">
				<label class="form-check-label" for="name">Name:</label>
				<input class="form-control" type="text" name="name" id="name" required="required" placeholder="name">
			</div>
			<div class="form-group mb-3">
				<label class="form-check-label" for="phone_number">Tel:</label>
				<input class="form-control" type="tel" id="phone_number" name="phone_number" max="13" required="required" placeholder="phone_number">
			</div>
			<div class="form-group mb-3">
				<label class="form-check-label" for="email">Email:</label>
				<input class="form-control" type="email" id="email" name="email" max="20" required="required" placeholder="email">
			</div>
			<div class="form-group mb-3">
				<label class="form-check-label" for="reg_no">Reg_no:</label>
				<input class="form-control" type="text" id="reg_no" name="reg_no" required="required" placeholder="reg_no">
			</div>
			<div class="form-group mb-3">
				<label class="form-check-label" for="cohort">Cohort:</label>
				<input class="form-control" type="text" id="cohort" name="cohort"  required="required" placeholder="cohort">
			</div>
			<div class="form-group mb-3">
				<label class="form-check-label" for="password">Password:</label>
				<input class="form-control" type="password" id="password" name="password" min="8" required="required" placeholder="password">
			</div>
			<div class="form-group mb-3">
				<button class="btn btn-primary" type="submit">Register</button>
			</div>		
		</form>		
		<p class="fixed-bottom text-right pt-3">&copy;&nbsp;2019&nbsp;MOI&nbsp;University.All&nbsp;rights&nbsp;reserved.</p>
		</div>
	</div>
</div>
<script src="js/registration_validation.js"></script>
<noscript>Javascript is disabled in your browser!</noscript>
</body>
</html>
<!-- 
	Registration Logic
 -->
 <?php

$name=$reg_no=$email=$cohort=$phone_number=$password="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name=get_post($_POST['name']);
$reg_no=get_post($_POST['reg_no']);
$email=get_post($_POST['email']);
$cohort=get_post($_POST['cohort']);
$phone_number=get_post($_POST['phone_number']);
$password=get_post($_POST['password']);

}

function get_post($var){
		$sanitized=trim($var);
		$sanitized=stripslashes($var);
		$sanitized=htmlspecialchars($var);
		return $sanitized;
	}	

	if(isset($name)&&isset($reg_no)&&isset($email)&&isset($cohort)&&isset($phone_number)&&isset($password))
		{
	
			if(!empty($name)&&!empty($reg_no)&&!empty($email)&&!empty($cohort)&&!empty($phone_number)&&!empty($password)){

					$connect=mysqli_connect("localhost","root","derrick8","school_venue_management_system");
					
					$result=mysqli_query($connect,"INSERT INTO classrep (reg_no,cohort, name, email, phone_number, password) VALUES('$reg_no','$cohort','$name','$email','$phone_number','$password')");
					
						if($result==true){
							?>
							<script>alert("Registration Successful!\nPlease wait for activation of your account after 24 hours")</script>						
							<?php
						}
						else{
							?>
							<script>alert("Registration Failed")</script>						
							<?php						
						}
						
						mysqli_close($connect);	
					
				}
}
	

	
	
	

?>


