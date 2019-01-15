<?php
session_start();
$building=$_SESSION['building_pass'];
require_once '../classes/Database.php';
//$day=strtolower(date('l'));

$day='monday';
$group=$_GET['group'];
$course=$_GET['course'];
$lec=$_GET['lec'];
$tel=$_GET['tel'];
$id=$_GET['id'];

if(isset($group)&&isset($course)&&isset($lec)&&isset($tel)&&isset($id)&&isset($building)){
if(!empty($group)&&!empty($course)&&!empty($lec)&&!empty($tel)&&!empty($id)){
$db=new Database('localhost','root',' ',$day);
$db->query("UPDATE $building SET
Status='booked' WHERE ID='".$id."' AND
Status='free'");
header('Location:index.php');
}else{echo 'Please input data!';}
}
?>
