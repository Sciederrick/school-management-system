<?php
require_once '../classes/Database.php';
$user_request=$_GET['user_request'];
	if(isset($user_request)&&($user_request=='new_user')){
		header('Location: ../htmlpages/regForms.html');
}
	elseif((isset($user_request)&&($user_request=='resetting'))||(isset($user_request)&&($user_request=='retrieving'))){
		header('Location: ../htmlpages/resetRetrieve.html');
}
	else {
//logging in
		$user_type=$_POST['user_type'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);

session_start();
$_SESSION['password_pass']=$password;
$_SESSION['usertype_pass']=$user_type;

	if(isset($username)&&!empty($username)){
		if(isset($password)&&!empty($password)){
		$db=new Database('localhost','root','','booking_system');
		$db->query("SELECT * FROM $user_type WHERE name='".$username."'AND password='".$password."'");
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
