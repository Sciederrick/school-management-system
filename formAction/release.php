<?php

require_once '../classes/Database.php';
session_start();
$building=$_SESSION['building_pass'];
$ID=$_GET['id'];
$day=strtolower(date('l'));
$db=new Database('localhost','root','','booking_system');
$db->query("SELECT cohort,venue FROM timetable WHERE
ID='".$ID."' AND status='booked'");//Changed * to Cohort
if($db->numRows()<>0){
//Adding variables
$cohort=array(array());
$cohort=$db->rows();
$arr_cohort=array();
$str=$cohort[0]['cohort'];
$arr_cohort=explode(",",$str);
/*Fetching the Cohort from index.php using
 * $_SESSION*/
$user_cohort=$_SESSION['user_cohort_pass'];
$i=4;
//Added variables
for($n=0;$n<=$i;$n++){
/*This for loop iterates the Cohort field in the
 * venue table checking for match with the Cohort
 * field of the user(classrep)
 *If they do match, then that must be a classrep
 of that group owning that venue at a particular
 point in time.
 Hence allowed to release the venue.
 Otherwise, the script exits with a message.*/
if($user_cohort==$arr_cohort[$n]){break;}
elseif(($user_cohort<>$arr_cohort[$n])&&($n==4)){

//echo '<br>';print_r($user_cohort);echo '<br>';
//print_r($arr_cohort);
exit("You are under no jurisdiction to release
".$cohort[0]['venue']);
}//end if
}//end for  ..,Validating classreps for releasing venues

$db->query("UPDATE timetable SET
status='free',cohort='....',course_code='......'
WHERE ID='".$ID."'");
echo "Venue ".$cohort[0]['Venue']." released
successfully.";
}else{
echo 'Incorrect ID value input!!';
}


?>
