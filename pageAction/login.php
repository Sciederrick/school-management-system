<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	session_start();
	$reg_no=get_post($_POST['reg_no']);
	$password=get_post($_POST['password']);

	$_SESSION['reg_no']=$reg_no;/*For use in release.php and book.php*/
	
}

function get_post($var){
		$sanitized=trim($var);
		$sanitized=stripslashes($var);
		$sanitized=htmlspecialchars($var);		
		return $sanitized;
	}
	


		if(isset($reg_no)&&isset($password)){
			if(!empty($reg_no)&&!empty($password)){
				
			   $connect=mysqli_connect("localhost","root","derrick8","school_venue_management_system");
			   $result=array(array());
			   $result=mysqli_fetch_assoc(mysqli_query($connect,"SELECT name, cohort FROM classrep WHERE reg_no='".$reg_no."' AND password='".$password."' AND active='1'"));
			   
			 		if($result['name']==true && $result['cohort']<>'admin'){
						header("Location:index.php");
					}
					else if($result['name']==true && $result['cohort']=='admin'){
						header("Location:pages/index.php");
					}
					else{
						
						echo "Wrong Username or Password!";
					}
					
					mysqli_close($connect);
			} 
			
		}


?>
