<!-- Fetch email and phone number for menu suggestions-->
<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	require 'vendor/autoload.php';

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
		<li class="pb-5"><i class="fas fa-map-marker-alt text-primary">&nbsp;&nbsp;MAIN CAMPUS<br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-white font-weight-bold small">admin block, room 51</span></i></li>
		<li class="pb-5"><i class="fas fa-phone text-primary"><a class="text-decoration-none text-reset" href="tel:+254743709788">&nbsp;&nbsp;Lets Talk</a><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-white small font-weight-bold">+254743709788</span></i></li>
		<li class="pb-5"><i class="fas fa-envelope text-primary"><a class="text-decoration-none text-reset" href="mailto:derrickmbarani@gmail.com">&nbsp;&nbsp;General Support</a><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-white font-weight-bold small">venuenquiry@gmail.com</span></i></li>
		</ul>
		
	</div> 

	<div class="col-md-7 d-flex flex-wrap flex-column h-100 align-content-center justify-content-center order-md-1 order-0">
		<p class="w-100 text-center text-monospace lead font-weight-normal text-secondary py-5">Send us a message</p>
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
			$reg_no=$_SESSION['reg_no'];				
			$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');
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
			$msg='Phone: '.$_POST['phone_number']."\n"
				.'Email: '.$_POST['email']."\n"
				.'Comment: '.$_POST['txtmsg'];

	$mail=new PHPMailer(true);

	try{
	$mail->SMTPDebug = 2; 
	$mail->isSMTP();
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
	$mail->Host='smtp.gmail.com';
	$mail->Port='587';//465 or 25 or 587
	$mail->isHTML();
	$mail->Username='example@gmail.com';
	$mail->Password='';
	$mail->setFrom($email);
	$mail->Subject='Venue Management Request';
	$mail->Body=$msg;
	$mail->AddAddress('example2@gmail.com'); /*  Forwading to another address */

	$mail->send();?>
	<script>alert(Message has been sent')</script><?php

	}catch(Exception $e){
    ?><script>alert(Message could not be sent.')</script><?php /* Mailer Error:{$mail->ErrorInfo}"; */
}

				if($mail->send()){
				$result=mysqli_query($connect,"INSERT INTO contactus (time, date,reg_no,phone_number,email,message) VALUES ((CURRENT_TIME),(CURRENT_DATE), '$reg_no','$phone_number','$email','$message')");
	 			echo "<script>alert('Message sent successfully')</script>";
				}else{
					echo "<script>alert('Sending Failed')</script>";					
				} 
		}
	}

	mysqli_free_result($result);
	mysqli_close($connect);


?>

