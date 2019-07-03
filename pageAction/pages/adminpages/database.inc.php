<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin|database</title>	
	<link href="../../../css/all.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-image:url(../../../img/doodles.png)">
<div class="container my-5 py-3 bg-light">
<h3><i class="fas fa-database"><span class="pl-2 font-weight-normal">Database</span></i></h3>
<form action='' method='POST'  id='timetable_record'>			
		<p class="pt-3 font-weight-bold">Timetable:</p>
	<div class="form-group">
		<select class="form-control form-control-sm" name='status' size='1'>
			<option>booked</option>
			<option>free</option>
		</select>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='venue_id' placeholder='venue_id' required='required'>
	</div>
	<div class="form-group">
		<select class="form-control form-control-sm" name='school' size='1'>
			<option>medicine</option>
			<option>law</option>
			<option>engineering</option>
			<option value='biological'>biological and physical sciences</option>
			<option>business</option>
			<option>education</option>
			<option>arts</option>
			<option>human resource</option>
		</select>
	</div>
	<div class="form-group">
		<select class="form-control form-control-sm" name='day_of_week' size='1'>
			<option>monday</option>
			<option>tuesday</option>
			<option>wednesday</option>
			<option>thursday</option>
			<option>friday</option>
		</select>
	</div>
	<div class="form-group">
		<select class="form-control form-control-sm" name='duration' size='1'>
			<option>07:00-09:00</option>
			<option>09:00-11:00</option>
			<option>11:00-13:00</option>
			<option>13:00-15:00</option>
			<option>15:00-17:00</option>
			<option>17:00-19:00</option>
		</select>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='cohort' placeholder='cohort' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='course_code' placeholder='course_code' required='required'>
	</div>
		<button class="btn btn-primary btn-sm" type='submit'><i class="fas fa-plus-square"><span class="pl-2">record</span></i></button>
	
</form>

<form action='' method='POST'  id='classrep_record'>			
		<p class="pt-3 font-weight-bold">	Classrep:</p>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='reg_no' placeholder='reg_no' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='cohort' placeholder='cohort' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='name' placeholder='name' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='email' name='email' placeholder='janedoe@gmail.com' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='password' name='password' placeholder='password' required='required'>
	</div>
		<button class="btn btn-primary btn-sm" type='submit'><i class="fas fa-user-plus"><span class="pl-2">record</span></i></button>
</form>

<form action='' method='POST'  id='cohort_record'>			
		<p class="pt-3 font-weight-bold">	Cohort:</p>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='cohort' placeholder='cohort' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='reg_no' placeholder='reg_no' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='number' name='no_of_students' placeholder='no_of_students' min='1' max='500' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='courses_enrolled' placeholder='courses_enrolled' required='required'>
	</div>
			<button class="btn btn-sm btn-primary" type='submit'><i class="fas fa-plus-square"><span class="pl-2">record</span></i></button>
</form>

<form action='' method='POST'  id='course_record'>			
		<p class="pt-3 font-weight-bold">	Course:</p>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='cohort' placeholder='cohort' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='course_code' placeholder='course_code' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='course_title' placeholder='course_title' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='lecturers' placeholder='lecturers' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='department' placeholder='department' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='contact' placeholder='contact' required='required'>
	</div>
			<button class="btn btn-primary btn-sm" type='submit'><i class="fas fa-plus-square"><span class="pl-2">record</span></i></button>
</form>

<form action='' method='POST'  id='venue_record'>			
		<p class="pt-3 font-weight-bold">	Venue:</p>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='venue_id' placeholder='venue_id' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='building' placeholder='building' required='required'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='number' name='capacity' placeholder='capacity' min='15' max='1000'>
	</div>
	<div class="form-group">
		<input class="form-control form-control-sm" type='text' name='facilities' placeholder='facilities' required='required'>
	</div>
		<button class="btn btn-primary btn-sm" type='submit'><i class="fas fa-plus-square"><span class="pl-2">record</span></i></button>
</form>

</div>		
</body>
</html>
<?php
function get_post($var){
		$sanitized=trim($var);
		$sanitized=stripslashes($var);
		$sanitized=htmlspecialchars($var);
		return $sanitized;
	}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');

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
			if($result){
			echo "<script>alert('record inserted successfully')</script>";
			}else{
			echo "<script>alert('error inserting record')<script>";
			}
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
			if($result){
				echo "<script>alert('record inserted successfully')</script>";
				}else{
				echo "<script>alert('error inserting record')<script>";
				}
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
			if($result){
				echo "<script>alert('record inserted successfully')</script>";
				}else{
				echo "<script>alert('error inserting record')<script>";
				}
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
			if($result){
				echo "<script>alert('record inserted successfully')</script>";
				}else{
				echo "<script>alert('error inserting record')<script>";
				}
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
			if($result){
				echo "<script>alert('record inserted successfully')</script>";
				}else{
				echo "<script>alert('error inserting record')<script>";
				}
			mysqli_free_result($result);
		}
	}

	mysqli_close($connect);
}
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>