<!DOCTYPE html>
<html>
	<head>		
		<link href="" rel="stylesheet"/>
	</head>
	<body>
		<div id="contactus_container">
			<div class="contactus_header">			
				<p>For any Assistance...!</p>
			</div>
			<div class="contactus_form">
			<form action="" method="POST" >
				<table>			
					<tr>					
						<td><input type="tel" id="phone_number" name="phone_number" placeholder="phone_number"></td>
					</tr>
						
					<tr>					
						<td><input type="email" id="email" name="email" placeholder="email"></td>
					</tr>
					<tr>					
						<td><textarea name="txtmsg" rows="6" cols="50" placeholder="message" id="message"></textarea>
						</td>
					</tr>
					<tr colspan="2">
						<td><input type="submit" value="send" id="send"></td>
					</tr>
				</table>						
			</form>
			</div>
			<div class="contactus_feedback">
				<?php			
					session_start();
					$reg_no=$_SESSION['reg_no'];				

					$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');

					$result=mysqli_query($connect,"SELECT date, message, response FROM contactus WHERE reg_no='".$reg_no."' AND response IS NOT NULL ORDER BY contactus_id DESC");

					$numRows=mysqli_num_rows($result);

					echo '<hr>';				
					if($numRows<>0){		
					?>
						<table>
						<caption><h3>Your responses</h3></caption>
						<tr id="feedback_header_row">
						<td>Sent on</td>
						<td>message</td>
						<td>response</td>
						</tr>
					<?php
						foreach($result as $value){
							echo '<tr>';
							foreach($value as $val){
								echo '<td>',$val,'</td>',':';
							}
							echo '</tr>';
						}
						echo '</table>';

					}else{
						echo '<h3>No responses available</h3>';
					}
					echo '<hr>';

					mysqli_free_result($result);

				?>
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
					echo 'Message sent successfully';
				}else{
					echo 'error';					
				}
		}
	}

	mysqli_free_result($result);
	mysqli_close($connect);


?>

