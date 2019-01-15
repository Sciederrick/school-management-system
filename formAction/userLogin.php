<?php
require_once '../classes/Database.php';
$new_user=$_GET['new_user'];
$resetting=$_GET['resetting'];
$retrieving=$_GET['retrieving'];
if(isset($new_user)&&($new_user=='new_user')){
header('Location: ../htmlpages/regForms.html');
}
elseif((isset($resetting)&&($resetting=='resetting'))||(isset($retrieving)&&($retrieving=='retrieving'))){
header('Location: ../htmlpages/resetRetrieve.html');
}
else {
$user_type=$_POST['user_type'];
$username=$_POST['username'];
$password=$_POST['password'];
if(isset($username)&&!empty($username)){
if(isset($password)&&!empty($password)){
$db=new Database('localhost','root',' ','users');
$db->query("SELECT * FROM
$user_type WHERE name='".$username."'AND
password='".$password."'");
if($db->numRows()==0){
echo 'Wrong username or password';
}
else{
header('Location: index.php');
}
}
}
else{
echo 'Fields Unset';
}
}
?>
