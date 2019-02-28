<?php
session_start();
$building=$_SESSION['building_pass'];
require_once '../classes/Database.php';
//$day=strtolower(date('l'));

$day='monday';
//$group=$_GET['group'];
/*Diverted from above since it would be obvious
 * that a classrep would only book for his group
 * i.e CS, BSE and not for some other group
 Hence the following*/
$group=$_SESSION['user_cohort_pass'];
$course=$_GET['course'];
//$lec=$_GET['lec'];
//$tel=$_GET['tel']; Minimizing input!!
$id=$_GET['id'];

if(isset($course)&&isset($id)&&isset($building)){
if(!empty($course)&&!empty($id)){

$db2=new Database('localhost','root','derrick8','users');
$db2->query("SELECT name, tel FROM lecturers WHERE
course REGEXP '".$course."'") or die(mysql_error());
if($db2->numRows()<>0){
$arr_lec=array(array());
$arr_lec=$db2->rows();
$lec=$arr_lec[0]['name'];
$tel=$arr_lec[0]['tel'];
}
$db=new Database('localhost','root','derrick8',$day);

$db->query("SELECT status FROM $building WHERE
ID='".$id."'") or die(mysql_error());
if($db->numRows()<>0){
$arr_statuscheck=array(array());
$arr_statuscheck=$db->rows();
if($arr_statuscheck[0]['status']=='free'){
$db->query("UPDATE $building SET
status='booked',cohort='".$group."',course='".$course."',lec='".$lec."',tel='".$tel."' WHERE ID='".$id."' AND
status='free'");
//header('Location:index.php');

$db->query("SELECT venue FROM $building WHERE ID='".$id."'");
$venue=array(array());
$venue=$db->rows();
echo "Venue ".$venue[0]['venue']." booked successfully";
}else{echo '<br>Error on booking.<br>Possible
scenarios: <br>1. You input a venue ID which is
already booked or is non-existent.<br>2. You input
a course that is non-existent.<br>3. Database
error, please contact the administrator(visit the
"Contact us" page).';}
}}else{echo 'Please input data!';}
}
?>
