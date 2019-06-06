<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	session_start();
	$reg_no=$_SESSION['reg_no'];/*Use registration number from login.php*/
	$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');

	/*Get timetable_id and course_code specified by user*/
	$id=mysqli_real_escape_string($connect,$_POST['id']);
	$course_code=mysqli_real_escape_string($connect,$_POST['course']);

	/*transaction type from hidden form control*/
	$transaction_type=mysqli_real_escape_string($connect,$_POST['transaction_type']);

	/*Get User's cohort*/
	$result=mysqli_query($connect,"SELECT cohort FROM classrep WHERE reg_no='".$reg_no."'");
	$numRows=mysqli_num_rows($result);

	if($numRows<1) die("Fatal Error1");

	$info=mysqli_fetch_array($result,MYSQLI_ASSOC);

	/*Update view table*/
	$result=mysqli_query($connect,"UPDATE view_timetable SET cohort='".$info['cohort']."', status='booked', course_code='".$course_code."' WHERE timetable_id='".$id."' AND status='free'");
	

		if($result){
			echo 'Venue booked successfully';

	/*If book event successful keep track in transaction table*/		/*Get venue id from view_timetable*/
			$result=mysqli_query($connect,"SELECT venue_id FROM view_timetable WHERE timetable_id='".$id."'");
			$numRows=mysqli_num_rows($result);
			if($numRows<1) die("Fatal Error2");

				/*store venue_id in $transaction_venue*/
			$transaction_venue_id=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$venue_id=$transaction_venue_id['venue_id'];

				/*get the date and time of the trasaction*/
			date_default_timezone_set("Africa/Nairobi");
			$transaction_date=date("Y-m-d");
			$transaction_time=date("h:i:sa");

				/*record the transaction in the database*/
			$result=mysqli_query($connect,"INSERT INTO transaction (venue_id,time,date,transaction_type,reg_no) VALUES ('$venue_id','$transaction_time','$transaction_date','$transaction_type','$reg_no')");
			($result)?"":die("Fatal Error3");

		}else{
			echo 'Error';
		}

	mysqli_free_result($result);
	mysqli_close($connect);
}

?>