<?php

require_once '../classes/Database.php';
session_start();
$building=$_SESSION['building_pass'];
$ID=$_GET['ID'];
//$day=strtolower(date('l'));
$day='monday';
$db=new Database('localhost','root',' ',$day);
$db->query("SELECT * FROM $building WHERE
ID='".$ID."' AND Status='booked'");
if($db->numRows()<>0){
$db->query("UPDATE $building SET
Status='free',Cohort='....',Course='......',Tel='0700000000',Lec='................'
WHERE ID='".$ID."'");
header('Location:index.php');
}else{
echo 'Incorrect ID value input!!';
}


?>
