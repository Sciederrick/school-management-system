	<form action="index.php"  method="GET">
		<select name="building" size="2">
			<option value="tech">TECH
			<option value="biological">BIOLOGICAL
			<option value="hr">HR
			<option value="education">EDUCATION
			<option value="arts">ARTS
		</select>
			<input type="Submit" value="SUBMIT">
	</form>

<?php
require_once '../classes/Database.php';
session_start();
//updating table contents before showcasing
//biological ----> biological_clone
date_default_timezone_set("Africa/Nairobi");

$day=strtolower(date('l'));
$time=date('H:i');
$building=$_GET['building'];
$_SESSION['building_pass']=$building;
/*
	if ($time=='18:59'){
		$db=new Database('localhost', 'root', '' ,'booking_system');
		$db->query("TRUNCATE TABLE $building") ;
		$pos=strrpos($building,'_');
		$original_tbl=substr($building,0,$pos);
	$db->query("INSERT INTO $building SELECT * FROM $original_tbl") ;
}
 */
	if(isset($building)){
	 	$db=new Database('localhost','root','','booking_system');
	$db->query("SELECT * FROM timetable"); 
	if($db->numRows()<>0){
		echo '<br>';
		echo "<table border='1'>";
			foreach($db->rows() as $value){
				echo '<tr>';
			foreach($value as $val){
				echo '<td><pre>'.$val.'</pre></td>';
}
				echo '</tr>';
}
				echo '</table>';
				echo '<br><br>';

}
	else{
		echo 'Please make a selection!';
}

$password=$_SESSION['password_pass'];
$user_type=$_SESSION['usertype_pass'];
/*
$db2=new Database('localhost','root','','booking_system');
$db2->query("SELECT students.user, students.cohort, lecturers.name FROM students, lecturers WHERE students.password='".$password."' OR  lecturers.password='".$password."'");
	if($db2->numRows()<>0){
		$user_cohort=array(array());
		$user_cohort=$db2->rows();
	if($user_cohort[0]['user']=='classrep'||$user_type=='lecturers'){

		$_SESSION['user_cohort_pass']=$user_cohort[0]['cohort'];
 */
	$db->query("SELECT * FROM timetable WHERE school='".$building."' AND status='free'");
	if($db->numRows()<>0){
		echo "<table border='1'>";
			foreach($db->rows() as $value){
				echo '<tr>';
			foreach($value as $val){
				echo '<td>';
				echo '<pre>'.$val.'</pre>';
				echo '</td>';
}
				echo '</tr>';
}
				echo '</table>';
?>
<br>
<br>
	<form action="book.php" method="GET">
		<fieldset>
			<legend>Venue_Booking</legend>
				<br>ID:<br>
				<input type='text' name='id' >
				<br>COURSE:<br>
				<input type='text' name='course'>
				<input type='Reset' value='reset'>
				<input type='Submit' value='Submit'>
		</fieldset>
	</form>
<?php
}
	else{
		echo '<br><br>All venues are booked<br><br>';
}

	$db->query("SELECT * FROM timetable WHERE school='".$building."' AND status='booked'");
	if($db->numRows()<>0){
?>
<br>
<p>For the convenience of other groups, please
release the venue if in any case it will not be of
use in the forthcoming periods.<br>Release the
venue by entering the ID for the venue that you
want to release.</p>
	<form action="release.php" method="GET">
		<fieldset>
			<legend>Venue_Releasing</legend>
				ID:<input type='text' name='id'><input type='Submit' value='RELEASE'>
		</fieldset>
	</form>
		<script>
			setInterval(function(){
			window.location.reload(false)
						},15000)
		</script>
<?php
}
//}
//		else{echo 'Logged in as normal user';}
//}
}
?>
