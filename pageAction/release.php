<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	session_start();
	$reg_no=$_SESSION['reg_no'];/*Use registration number from login.php*/

$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');

	/*Get timetable_id specified by the user*/
	$id=mysqli_real_escape_string($connect,$_POST['id']);

	/*transaction type from hidden form control*/
	$transaction_type=mysqli_real_escape_string($connect,$_POST['transaction_type']);
	
	/*Get user's cohort*/
	$result=mysqli_query($connect,"SELECT cohort FROM classrep WHERE reg_no='".$reg_no."'");
	$numRows=mysqli_num_rows($result);

	if($numRows<1) die("Fatal Error1");

	$info2=mysqli_fetch_array($result,MYSQLI_ASSOC);

	/*Get cohort from view table*/
	$result=mysqli_query($connect,"SELECT cohort FROM view_timetable WHERE timetable_id='".$id."' AND status='booked'");
	$numRows=mysqli_num_rows($result);

	if($numRows<1) die("Fatal Error2");

	$info=mysqli_fetch_array($result,MYSQLI_ASSOC);

		$cohorts=explode(',',$info['cohort']);

		if(sizeof($cohorts)>1){
			$validate_cohort='';
			for($i=0; $i<sizeof($cohorts); $i++){
				/*Compare the cohort from view table and classrep table to ensure the user only releases for his group*/
				if($cohorts[$i]===$info2['cohort']){
					$result=mysqli_query($connect,"UPDATE view_timetable SET status='free', cohort='', course_code='' WHERE timetable_id='".$id."' AND status='booked'");
					$validate_cohort='ok';
					break;
				}				
			}

			if(empty($validate_cohort)) echo 'You can only release venues for your group!';
		}else{

			if($info['cohort']===$info2['cohort']){
			$result=mysqli_query($connect,"UPDATE view_timetable SET status='free', cohort='', course_code='' WHERE timetable_id='".$id."'");
			if($result){
				echo 'Venue released successfully';

			/*If book event successful keep track in transaction table*/
				/*Get venue id from view_timetable*/
			$result=mysqli_query($connect,"SELECT venue_id FROM view_timetable WHERE timetable_id='".$id."'");
			$numRows=mysqli_num_rows($result);
			if($numRows<1) die("Fatal Error3");

				/*store venue_id in $transaction_venue*/
			$transaction_venue_id=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$venue_id=$transaction_venue_id['venue_id'];

					/*get the date and time of the transaction*/
				date_default_timezone_set("Africa/Nairobi");
				$transaction_date=date("Y-m-d");
				$transaction_time=date("h:i:sa");

					/*revord the transaction in the database*/
				$result=mysqli_query($connect,"INSERT INTO transaction (venue_id,time,date,transaction_type, reg_no) VALUES ('$venue_id', '$transaction_time','$transaction_date','$transaction_type','$reg_no')");
				($result)?"":die("Fatal Error4");

			}else{
				echo 'Error';
			}
		}else{
			echo '<p class="feedback">','You can only release venues for your group!','</p>';
		}

		}

		mysqli_free_result($result);
		mysqli_close($connect);
}


?>