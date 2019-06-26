<!-- Fetch email and phone number for menu suggestions-->
<?php
	session_start();
	$reg_no=$_SESSION['reg_no'];

	$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');
	$result=mysqli_query($connect,"SELECT phone_number, email FROM contactus WHERE reg_no='".$reg_no."'");
	$numRows=mysqli_num_rows($result);
	if($numRows){
		$info=mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
?>
<!DOCTYPE html>
<html>
<head lang='en'>		
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style>
		.bg-text{
			position:absolute;
			top:25%;
			left:30%;
		}
	</style>
</head>
<body>
<div class="container_fluid">
<div class="row mx-2 mt-1">	

	<div class="col-md-5 d-flex flex-column order-md-0 order-1">		
		<img class="image-fluid" src="../../img/contactus.jpg" style="width:inherit;opacity:0.3;z-index:-1">	
		<ul class="bg-text list-unstyled font-weight-lighter">		
		<li class="pb-5"><i class="fas fa-map-marker-alt">&nbsp;&nbsp;MAIN CAMPUS<br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-dark font-weight-bold small">admin block, room 51</span></i></li>
		<li class="pb-5"><i class="fas fa-phone"><a class="text-decoration-none text-reset" href="tel:+254743709788">&nbsp;&nbsp;Lets Talk</a><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-black small font-weight-bold">+254743709788</span></i></li>
		<li class="pb-5"><i class="fas fa-envelope"><a class="text-decoration-none text-reset" href="mailto:derrickmbarani@gmail.com">&nbsp;&nbsp;General Support</a><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-black font-weight-bold small">venuenquiry@gmail.com</span></i></li>
		</ul>
		
	</div> 

	<div class="col-md-7 d-flex flex-wrap flex-column h-100 align-content-center justify-content-center order-md-1 order-0">
		<p class="w-100 text-center text-monospace lead font-weight-bold text-secondary py-3">Send us a message</p>
		<form class="w-75 mx-auto" action="" method="POST" >
		<div class="form-group">						
			<input class="form-control" type="tel" id="phone_number" name="phone_number" placeholder="<?php echo $info['phone_number'];?>">
		</div>	
		<div class="form-group">		
			<input class="form-control" type="email" id="email" name="email" placeholder="<?php echo $info['email'];?>">
		</div>	
		<div class="form-group">			
			<textarea class="form-control" name="txtmsg" rows="6" cols="50" placeholder="message" id="message"></textarea>
		</div>
			<button class="btn btn-primary" type="submit" id="send"><i class="fas fa-paper-plane">Send</i></button>
		</form>
		<?php			
			session_start();
			$reg_no=$_SESSION['reg_no'];				
			// $reg_no='COM/15/17';
			$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');

			$result=mysqli_query($connect,"SELECT date, message, response FROM contactus WHERE reg_no='".$reg_no."' AND response IS NOT NULL ORDER BY contactus_id DESC");

			$numRows=mysqli_num_rows($result);

			echo '<hr>';				
			if($numRows<>0){		
			?>	
			<div class="table-responsive">
				<p class="text-center text-monospace lead font-weight-bold text-secondary pt-2">Your responses</p>
				<table class="table table-sm mx-auto table-striped">
				<thead class="thead-dark">
				<tr id="feedback_header_row border">
				<th>Sent on</th>
				<th>message</th>
				<th>response</th>
				</tr>
				</thead>
				<tbody>
			<?php
				foreach($result as $value){
					echo '<tr>';
					foreach($value as $val){
						echo '<td class="text-monospace">',$val,'</td>';
					}
					echo '</tr>';
				}
				echo '</tbody></table></div>';

			}else{
				echo '<h3 class="text-center text-info pt-3">No responses available</h3>';
			}
			echo '<hr>';

			mysqli_free_result($result);

		?>
	</div>

</div>	
</div>				
</body>
</html>
<?php

	$phone_number=$email=$message='';

	function get_post($var){
		$sanitized=trim($var);
		$sanitized=stripslashes($var);
		$sanitized=htmlspecialchars($var);
		return $sanitized;
	}

	$phone_number=get_post($_POST['phone_number']);
	$email=get_post($_POST['email']);
	$message=get_post($_POST['txtmsg']);

	if(isset($phone_number)&&isset($email)&&isset($message)&&isset($reg_no)){
		if(!empty($phone_number)&&!empty($email)&&!empty($message)&&!empty($reg_no)){
			
			$result=mysqli_query($connect,"INSERT INTO contactus (time, date,reg_no,phone_number,email,message) VALUES ((CURRENT_TIME),(CURRENT_DATE), '$reg_no','$phone_number','$email','$message')");

				if($result){
					echo "<script>alert('Message sent successfully')</script>";
				}else{
					echo "<script>alert('Sending Failed')</script>";					
				}
		}
	}

	mysqli_free_result($result);
	mysqli_close($connect);


?>

