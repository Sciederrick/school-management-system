<!DOCTYPE html>
<html>
	<head>
		<link href="../../../css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h1>support</h1>
	<?php

	$connect=mysqli_connect('localhost','root','tony5610','school_venue_management_system');

	$result=mysqli_query($connect,"SELECT contactus_id, reg_no, email, phone_number, message FROM contactus WHERE date=(CURRENT_DATE) ORDER BY contactus_id DESC");

	$numRows=mysqli_num_rows($result);	
		/*Today's messages section*/
		echo '<hr>';
		if($numRows<>0){		

			echo '<table>';
			echo '<caption>','<h3>Today\'s Messages</h3>','</caption>';
			foreach($result as $value){
				echo '<tr>';
				foreach($value as $val){
					echo '<td>',$val,'</td>';
				}
				echo '</tr>';
			}
			echo '</table>';
		}else{
			echo '<h3>No messages today</h3>';
		}
		echo '<hr>';

		/*Stalled responses section*/
		$result=mysqli_query($connect,"SELECT contactus_id, time, date, reg_no, email, phone_number, message FROM contactus WHERE date!=(CURRENT_DATE) AND response=NULL ORDER BY contactus_id ASC");
		
		$numRows=mysqli_num_rows($result);

		echo '<hr>';
		if($numRows<>0){

			echo '<table>';
			echo '<caption>','<h3>Stalled Responses</h3>','</caption>';
			foreach($result as $value){
				echo '<tr>';
				foreach($value as $val){
					echo '<td>',$val,'</td>';
				}
				echo '</tr>';
			}
			echo '</table>';
		}else{
			echo '<h3>No stalled messages</h3>';
		}
		echo '<hr>';

	?>

	<!--response textbox-->
	<form action='' method='POST'>
		<table>
			<tr>
				<td>Response For:</td>
				<td><input type='text' name='contactus_id' placeholder='contactus_id'></td>	
			</tr>
			<tr>		
				<td colspan='2'><textarea name='response' cols='50' rows='10' placeholder='Write a response here...'></textarea></td>
			</tr>
			<tr>		
				<td colspan='2'><input type='submit' value='send'></td>
			</tr>
		</table>
	</form>
	<?php
		/*response textbox logic*/
		$response=$contactus_id='';

		function get_post($var){
			$sanitized=trim($var);
			$sanitized=stripslashes($var);
			$sanitized=htmlspecialchars($var);
			return $sanitized;
		}

		$response=get_post($_POST['response']);
		$contactus_id=get_post($_POST['contactus_id']);

		if(isset($response)&&isset($contactus_id)){
			if(!empty($response)&&!empty($response)){
				$result=mysqli_query($connect,"UPDATE contactus SET response='".$response."' WHERE contactus_id='".$contactus_id."' AND (response='' OR response IS NULL)");

				if($result){
					echo 'Response sent successfully';
				}else{
					echo 'Sending failed';
				}

			}
		}

		mysqli_free_result($result);
		mysqli_close($connect);
	?>
	</body>
</html>