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

$db2=new Database('localhost','root',' ','users');
$db2->query("SELECT name, tel FROM lecturers WHERE
Course REGEXP '".$course."'");
if($db2->numRows()<>0){
$arr_lec=array(array());
$arr_lec=$db2->rows();
$lec=$arr_lec[0]['name'];
$tel=$arr_lec[0]['tel'];
}else{exit('..processing. Error fetching name and
tel details');}
$db=new Database('localhost','root',' ',$day);

$db->query("SELECT Status FROM $building WHERE
ID='".$id."'");
if($db->numRows()<>0){
$arr_statuscheck=array(array());
$arr_statuscheck=$db->rows();
if($arr_statuscheck[0]['Status']=='free'){
$db->query("UPDATE $building SET
Status='booked',Cohort='".$group."',Course='".$course."',Lec='".$lec."',Tel='".$tel."' WHERE ID='".$id."' AND
Status='free'");
//header('Location:index.php');

$db->query("SELECT Venue FROM $building WHERE ID='".$id."'");
$venue=array(array());
$venue=$db->rows();
echo "Venue ".$venue[0]['Venue']." booked successfully";
}else{echo '<br>Error on booking.<br>Possible
scenarios: <br>1. You input a venue ID which is
already booked or is non-existent.<br>2. You input
a course that is non-existent.<br>3. Database
error, please contact the administrator(visit the
"Contact us" page).';}
}else{exit('failed to fetch status');}}else{echo 'Please input data!';}
}
?>
