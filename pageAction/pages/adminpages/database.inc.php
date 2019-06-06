<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="../../../css/style.css">
	</head>
	<body>
		<!-- Queries textarea		 -->
		<div id="queries_text_area">
			<form action='' method='POST'  id='queries'>			
					<table>				
					<tr>
						<td>Queries:</td>
						<td><textarea name='queries' rows='10' cols='50' placeholder='Run your database queries here...'></textarea></td>
						<td></td>
						<td><input type='submit' value='run'></td>
					</tr>
				</table>			
			</form>
			<form action='' method='POST'  id='timetable_record'>			
					<table>				
					<tr>
						<td>Timetable:</td>
						<td><select name='status' size='1'>
							<option>booked</option>
							<option>free</option>
						</select></td>
						<td><input type='text' name='venue_id' placeholder='venue_id' required='required'></td>
						<td><select name='school' size='1'>
							<option>medicine</option>
							<option>law</option>
							<option>engineering</option>
							<option value='biological'>biological and physical sciences</option>
							<option>business</option>
							<option>education</option>
							<option>arts</option>
							<option>human resource</option>
						</select></td>
						<td><select name='day_of_week' size='1'>
							<option>monday</option>
							<option>tuesday</option>
							<option>wednesday</option>
							<option>thursday</option>
							<option>friday</option>
						</select></td>
						<td><select name='duration' size='1'>
							<option>07:00-09:00</option>
							<option>09:00-11:00</option>
							<option>11:00-13:00</option>
							<option>13:00-15:00</option>
							<option>15:00-17:00</option>
							<option>17:00-19:00</option>
						</select></td>
						<td><input type='text' name='cohort' placeholder='cohort' required='required'></td>
						<td><input type='text' name='course_code' placeholder='course_code' required='required'></td>
						<td><input type='submit' value='+ record'></td>
					</tr>
				</table>			
			</form>
			<form action='' method='POST'  id='classrep_record'>			
					<table>				
					<tr>
						<td>Classrep:</td>
						<td><input type='text' name='reg_no' placeholder='reg_no' required='required'></td>
						<td><input type='text' name='cohort' placeholder='cohort' required='required'></td>
						<td><input type='text' name='name' placeholder='name' required='required'></td>
						<td><input type='email' name='email' placeholder='janedoe@gmail.com' required='required'></td>
						<td><input type='password' name='password' placeholder='password' required='required'></td>
						<td><input type='submit' value='+ record'></td>
					</tr>
				</table>			
			</form>
			<form action='' method='POST'  id='cohort_record'>			
					<table>				
					<tr>
						<td>Cohort:</td>
						<td><input type='text' name='cohort' placeholder='cohort' required='required'></td>
						<td><input type='text' name='reg_no' placeholder='reg_no' required='required'></td>
						<td><input type='number' name='no_of_students' placeholder='no_of_students' min='1' max='500' required='required'></td>
						<td><input type='text' name='courses_enrolled' placeholder='courses_enrolled' required='required'></td>
						<td><input type='submit' value='+ record'></td>
					</tr>
				</table>			
			</form>
			<form action='' method='POST'  id='course_record'>			
					<table>				
					<tr>
						<td>Course:</td>
						<td><input type='text' name='cohort' placeholder='cohort' required='required'></td>
						<td><input type='text' name='course_code' placeholder='course_code' required='required'></td>
						<td><input type='text' name='course_title' placeholder='course_title' required='required'></td>
						<td><input type='text' name='lecturers' placeholder='lecturers' required='required'></td>
						<td><input type='text' name='department' placeholder='department' required='required'></td>
						<td><input type='text' name='contact' placeholder='contact' required='required'></td>
						<td><input type='submit' value='+ record'></td>
					</tr>
				</table>			
			</form>
			<form action='' method='POST'  id='venue_record'>			
					<table>				
					<tr>
						<td>Venue:</td>
						<td><input type='text' name='venue_id' placeholder='venue_id' required='required'></td>
						<td><input type='text' name='building' placeholder='building' required='required'></td>
						<td><input type='number' name='capacity' placeholder='capacity' min='15' max='1000'></td>
						<td><input type='text' name='facilities' placeholder='facilities' required='required'></td>
						<td><input type='submit' value='+ record'></td>
					</tr>
				</table>			
			</form>
		</div>		
	</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$connect=mysqli_connect('localhost','root','tony5610','school_venue_management_system');

	function get_post($var){
		$sanitized=trim($var);
		$sanitized=stripslashes($var);
		$sanitized=htmlspecialchars($var);
		return $sanitized;
	}
	/*Query textarea logic */
	$db_query=get_post($_POST['queries']);
	if(isset($db_query)&&!empty($db_query)){	

		$result=mysqli_query($connect, $db_query);
		$numRows=mysqli_num_rows($result);

		$db_query_run_status=($result==true||$numRows>0)?"<p>Query executed successfully</p><br>":"<p>Query execution failed</p><br>";
		echo $db_query_run_status;

	/*Displaying results for SELECT AND SHOW QUERIES*/
		
		echo '<div id="query_results">';

		$info=array(array());
			if($numRows<>0){
				for( $i=0 ; $i < $numRows ; $i++ ){
				$info[]=mysqli_fetch_assoc($result);
				}

				echo '<table>';			
				foreach($info as $value){
					echo '<tr>';
					foreach($value as $val){
						echo '<td>',$val,'</td>';
					}
					echo '</tr>';
				}
				echo '</table>';
			}

		echo '</div>';

		mysqli_free_result($result);

	}

	/*timetable record logic*/
	$status=$venue_id=$day_of_week=$duration=$cohort=$course_code='';
	$status=get_post($_POST['status']);
	$venue_id=get_post($_POST['venue_id']);
	$day_of_week=get_post($_POST['day_of_week']);
	$duration=get_post($_POST['duration']);
	$cohort=get_post($_POST['course_code']);
	if(isset($status)&&isset($venue_id)&&isset($day_of_week)&&isset($duration)&&isset($cohort)&&isset($course_code)){
		if(!empty($status)&&!empty($venue_id)&&!empty($day_of_week)&&!empty($duration)&&!empty($cohort)&&!empty($course_code)){		
			$result=mysqli_query($connect,"INSERT INTO timetable (status,venue_id,day_of_week,duration,cohort,course_code) VALUES('$status','$venue_id','$day_of_week','$duration','$cohort','$course_code')");
			$task_status=($result)?"record inserted successfully":"error inserting record";
			echo $task_status;
			mysqli_free_result($result);
		}
	}

	/*classrep record logic*/
	$reg_no=$cohort=$name=$email=$pwd='';
	$reg_no=get_post($_POST['reg_no']);
	$cohort=get_post($_POST['cohort']);
	$name=get_post($_POST['name']);
	$email=get_post($_POST['email']);
	$pwd=get_post($_POST['password']);	
	if(isset($reg_no)&&isset($cohort)&&isset($name)&&isset($email)&&isset($pwd)){
		if(!empty($reg_no)&&!empty($cohort)&&!empty($name)&&!empty($email)&&!empty($pwd)){			
			$result=mysqli_query($connect,"INSERT INTO classrep(reg_no,cohort,name,email,password) VALUES('$reg_no','$cohort','$name','$email','$pwd')");
			$task_status=($result)?"record inserted successfully":"error inserting record";
			echo $task_status;
			mysqli_free_result($result);
		}
	}

	/*cohort record logic*/
	$cohort=$reg_no=$no_of_students=$courses_enrolled='';
	$cohort=get_post($_POST['cohort']);
	$reg_no=get_post($_POST['reg_no']);
	$no_of_students=get_post($_POST['no_of_students']);
	$courses_enrolled=get_post($_POST['courses_enrolled']);
	if(isset($cohort)&&isset($reg_no)&&isset($no_of_students)&&isset($courses_enrolled)){
		if(!empty($cohort)&&!empty($reg_no)&&!empty($no_of_students)&&!empty($courses_enrolled)){
			$result=mysqli_query($connect,"INSERT INTO cohort(cohort,reg_no,no_of_students,courses_enrolled) VALUES('$cohort','$reg_no','$no_of_students','$courses_enrolled')");
			$task_status=($result)?"record inserted successfully":"error inserting record";
			echo $task_status;
			mysqli_free_result($result);
		}
	}

	/*course record logic*/
	$cohort=$course_code=$course_title=$lecturers=$department=$contact='';
	$cohort=get_post($_POST['cohort']);
	$course_code=get_post($_POST['course_code']);
	$course_title=get_post($_POST['course_title']);
	$lecturers=get_post($_POST['lecturers']);
	$department=get_post($_POST['department']);
	$contact=get_post($_POST['contact']);
	if(isset($cohort)&&isset($course_code)&&isset($course_title)&&isset($lecturers)&&isset($department)&&isset($contact)){
		if(!empty($cohort)&&!empty($course_code)&&!empty($course_title)&&!empty($lecturers)&&isset($department)&&isset($contact)){
			$result=mysqli_query($connect,"INSERT INTO course(cohort,course_code,course_title,lecturers,department,contact) VALUES('$cohort','$coure_code','$course_title','$lecturers','$department','$contact')");
			$task_status=($result)?"record inserted successfully":"error inserting record";
			echo $task_status;
			mysqli_free_result($result);
		}
	}

	/*venue record logic*/
	$venue_id=$building=$capacity=$facilities='';
	$venue_id=get_post($_POST['venue_id']);
	$building=get_post($_POST['building']);
	$capacity=get_post($_POST['capacity']);
	$facilities=get_post($_POST['facilities']);
	if(isset($venue_id)&&isset($building)&&isset($capacity)&&isset($facilities)){
		if(!empty($venue_id)&&!empty($building)&&!empty($capacity)&&!empty($facilities)){
			$result=mysqli_query($connect,"INSERT INTO venue(venue_id,building,capacity,facilities) VALUES('$venue_id','$building','$capacity','$facilities')");
			$task_status=($result)?"record inserted successfully":"error inserting record";
			echo $task_status;
			mysqli_free_result($result);
		}
	}

	/*Query to create view table on Sunday*/

	/*$today=strtolower(date('l'));
	if($today==='sunday'){
	mysqli_query($connect,"CREATE OR REPLACE VIEW view_timetable AS SELECT timetable_id, status, timetable.venue_id, school, day_of_week, duration, cohort, course_code, capacity FROM timetable,venue WHERE timetable.venue_id=venue.venue_id;"); 
	}*/
	mysqli_close($connect);
}
?>