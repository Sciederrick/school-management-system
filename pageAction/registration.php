<?php

$name=$reg_no=$email=$cohort=$phone_number=$password="";

/*$photo_file_name=$_FILES['photoupload'];
$cv_file_name=$_FILES['cvupload'];*/

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name=get_post($_POST['name']);
$reg_no=get_post($_POST['reg_no']);
$email=get_post($_POST['email']);
$cohort=get_post($_POST['cohort']);
$phone_number=get_post($_POST['phone_number']);
$password=get_post($_POST['password']);

}

function get_post($var){
		$sanitized=trim($var);
		$sanitized=stripslashes($var);
		$sanitized=htmlspecialchars($var);
		return $sanitized;
	}	


//file data
/*$target_dir="../uploads/images/";
$target_dir2="../uploads/cv/";


$image_extensions=array('jpg','jpeg','png','jpe');
$errors=array();
$exploded_image_name=explode('.',$_FILES['photoupload']['name']);
$exploded_image_name_ext=end($exploded_image_name);
$file_ext=strtolower($exploded_image_name_ext);

$image_ext_ok=0;

$cv_extensions=array('pdf','docx','doc','txt');
$cv_errors=array();
$exploded_cv_name=explode('.',$_FILES['cvupload']['name']);
$exploded_cv_name_ext=end($exploded_cv_name);
$cv_ext=strtolower($exploded_cv_name_ext);
$cv_ext_ok=0;*/


	/*if(isset($photo_file_name)){
			if($_FILES["photoupload"]["size"]>200000000){
				$errors[]="File too large.";
			}
				for($i=0; $i<sizeof($image_extensions); $i++){
					if($file_ext===$image_extensions[$i]){
							$image_ext_ok=1;
					}
				}
			if($image_ext_ok<>1){
				$errors[]="Not an image file.";				
			}
			
			if(empty($errors)==true){
				
				move_uploaded_file($_FILES["photoupload"]["tmp_name"],$target_dir.$_FILES["photoupload"]["name"]);
					$image_path_name=$_FILES["photoupload"]["name"];
			}
			else{
				$str_errors=implode(".",$errors);
				exit($str_errors);
					
			}
			
					
					
	}*/
	//image upload validation
	
	
	
	/*
		if(isset($cv_file_name)){
			if($_FILES["cvupload"]["size"]>200000){
				$errors[]="File too large";
			}
				for($i=0; $i<sizeof($cv_extensions); $i++){
					if($cv_ext===$cv_extensions[$i]){
							$cv_ext_ok=1;
					}
				}
			if($cv_ext_ok<>1){
				$cv_errors[]="Not a text file docx, doc, pdf";				
			}
			
			if(empty($cv_errors)==true){
				
				move_uploaded_file($_FILES["cvupload"]["tmp_name"],$target_dir2.$_FILES["cvupload"]["name"]);	
					$cv_path_name=$_FILES["cvupload"]["name"];
			}
			else{
				$str_errors_2=implode(".",$cv_errors);
				exit($str_errors_2);				
			}
					
					
	}*/
	//cv upload validation
	


	if(isset($name)&&isset($reg_no)&&isset($email)&&isset($cohort)&&isset($phone_number)&&isset($password))
		{
	
			if(!empty($name)&&!empty($reg_no)&&!empty($email)&&!empty($cohort)&&!empty($phone_number)&&!empty($password)){

					$connect=mysqli_connect("localhost","root","derrick8","school_venue_management_system");
					
					$result=mysqli_query($connect,"INSERT INTO classrep VALUES('$reg_no','$cohort','$name','$email','$phone_number','$password')");
					
						if($result==true){
							header("Location:index.php");							
						}
						else{
							echo 'Registration failed';							
						}
						
						mysqli_close($connect);	
					
				}
}
	

	
	
	

?>
