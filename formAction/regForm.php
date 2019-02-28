<?php
require_once '../classes/Database.php';

$db=new Database('localhost','root','derrick8','users');
$regno=$_POST['regno'];
$cohort=$_POST['cohort'];
$username=$_POST['username'];
$telephone=$_POST['tel'];
$email=$_POST['email'];
$password=md5($_POST['password']);
if(isset($regno)&&isset($username)&&isset($telephone)&&isset($email)&&isset($password)){
if(!empty($regno)&&!empty($username)&&!empty($telephone)&&!empty($email)&&!empty($password)){
$db->query("INSERT INTO
students
(regno,cohort,name,tel,email,password)
VALUES('$regno','$cohort','$username','$telephone','$email','$password')") or die(mysql_error());
echo 'Student registration successful!';
}
}
$empno=$_POST['empno'];
$username=$_POST['username'];
$telephone=$_POST['tel'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$course=$_POST['course'];
if(isset($empno)&&isset($username)&&isset($telephone)&&isset($email)&&isset($password)){
if(!empty($empno)&&!empty($username)&&!empty($telephone)&&!empty($email)&&!empty($password)){
$db->query("INSERT INTO lecturers
VALUES('$empno','$username','$telephone','$email','$password','$course')") or die(mysql_error());
}
echo 'Lecturer registration successful!';
}
//RESETTING USERNAME AND PASSWORD
$user_type=$_POST['user_type'];

$resemail=$_POST['res_email'];
$restel=$_POST['res_tel'];
$resusername=$_POST['res_username'];
$respassword=md5($_POST['res_password']);
if(isset($resemail)&&isset($restel)&&isset($resusername)&&isset($respassword)){
if(!empty($resemail)&&!empty($restel)&&!empty($resusername)&&!empty($respassword)){
$db->query("UPDATE $user_type SET
name='".$resusername."', 
password='".$respassword."' WHERE
email='".$resemail."' AND tel='".$restel."'") or die(mysql_error());
$db->query("SELECT name, password FROM $user_type
WHERE name='".$resusername."' AND
password='".$respassword."'");
if($db->numRows()==0){
echo 'Password and Username reset unsuccessful';
}else{
echo 'Password and Username reset successful';
}
}
}

$retemail=$_POST['ret_email'];
$rettel=$_POST['ret_tel'];
if(isset($retemail)&&isset($rettel)){
if(!empty($retemail)&&!empty($rettel)){
$db->query("SELECT name, password FROM
$user_type WHERE
email='".$retemail."' AND tel='".$rettel."'");
if($db->numRows()==0){
echo 'Invalid email or phone number';
}else{
?>
<p><a
href="mailto:<?php echo'$retemail'?>?subject=Username and
Password&body=<?php foreach($db->rows() as $value){foreach($value as $val){echo '$val'; } }?>">Send Username and
Password to your email</a></p>
<?php
}
}
}
?>
