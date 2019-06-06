<!--Rewrite the forms-->
<!DOCTYPE html>
<html>
<head>
	<link href="../../../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<h1>files</h1>
	<div id="files_showcase">
		<!-- showcasing files and folders -->
		<?php

		$target_text_file_folder='../../uploads/database/';
		$target_image_folder='../../uploads/images/';

		$uploads_dir=scandir("../../uploads");
		unset($uploads_dir[0], $uploads_dir[1]);
		$uploads_dir_size=sizeof($uploads_dir);

		$database_dir=scandir("../../uploads/database");
		unset($database_dir[0], $database_dir[1]);
		$database_dir_size=sizeof($database_dir);

		$images_dir=scandir("../../uploads/images");
		unset($images_dir[0], $images_dir[1]);
		$images_dir_size=sizeof($images_dir);

		$group_menu_options_total_size=$uploads_dir_size+$database_dir_size+$images_dir_size+3;/*3 optgroup labels*/

		?>
		<form action='' method='' id='files_and_folders'>
			<select name="files_and_folders" size=<?php echo $group_menu_options_total_size;?> multiple>
				<optgroup label="uploads (root folder)">
					<?php
						foreach($uploads_dir as $value){
							echo '<option>',$value,'</option>';
						}
					?>
				</optgroup>
				<optgroup label="database">
					<?php
						foreach($database_dir as $value){
							echo '<option>',$value,'</option>';
						}
					?>
				</optgroup>
				<optgroup label="images">
					<?php
						foreach($images_dir as $value){
							echo '<option>',$value,'</option>';
						}
					?>
				</optgroup>				
			</select>
		</form>
	</div>
	<div id='file_operations'>
		<form action='' method='POST'>
				<table>
					<tr>
						<td>Open file:</td>
						<td><input type='text' name='file_to_open' placeholder='file to open...'></td>
						<td><input type='submit' value='open'></td>
					</tr>
				</table>
		</form>
		
	<!--
		Open file logic
		If open file field is set, show textarea and showcase file contents
	-->	
	<?php
	if(isset($_POST['file_to_open'])&&!empty($_POST['file_to_open'])){
	?>
		<form action='' method='POST'>
			<table>
				<caption>				
					<?php echo $target_text_file_folder.$_POST['file_to_open']; ?> 
				</caption>
					<tr>						
						<td> 
							<textarea name='file_area' rows='15' cols='90' readonly> 
	<?php
								$myfile=fopen($target_text_file_folder.$_POST['file_to_open'],'r');
								$filesize=filesize($target_text_file_folder.$_POST['file_to_open']);

								if($myfile){
									/*read the file*/
									if($filesize<>0){
										/*Output one line until end of file*/
										while(!feof($myfile)){				
											echo fgets($myfile); 					
										}
										fclose($myfile);						
									}
									else{
										echo 'file empty';
									}												

								}else{
									echo 'Unable to open file';
								}				
	?>
							</textarea> 
						</td>
					</tr>					
			</table>
		</form>	
	<?php
	}
	?>

		<!--File Upload forms, delete text field-->
		<form action='' method='POST' enctype='multipart/form-data'>			
				<table>
				<tr>
					<td><em>Text</em> file upload for database:</td>
					<td><input type='file' name='db_file_upload'></td>
					<td></td>
					<td><input type='submit' value='upload'></td>
				</tr>				
			</table>			
		</form>	

		<form action='' method='POST' enctype='multipart/form-data'>			
				<table>				
				<tr>
					<td><em>Image</em> file upload for venues:</td>
					<td><input type='file' name='venue_image_upload' accept="image/*"></td>
					<td>Venue_id:
					<td>
						<select name='venue_id'>
					<?php
					$connect=mysqli_connect('localhost','root','tony5610','school_venue_management_system');
					$result=mysqli_query($connect,"SELECT venue_id FROM venue ORDER BY building");
					$numRows=mysqli_num_rows($result);	

						if($numRows>0){					
							foreach($result as $value){
								foreach($value as $val){
									echo '<option>',$val,'</option>';
								}
							}							
						}
						mysqli_free_result($result);
					?>	
						</select>					
					</td>
					<td><input type='submit' value='upload'></td>
				</tr>				
			</table>			
		</form>

		<form action='' method='POST'>
			<table>
				<tr>
					<td><input type='text' name='delete_files' placeholder='name of file to delete..'></td>
					<td><input type='submit' value='delete'></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
<?php
	
if(isset($_FILES['venue_image_upload'])){
	
	$image_file_name=$_FILES['venue_image_upload']['name'];
	$allowed_image_extensions=array('jpg','jpe','jpeg','png');
	$exploded_image_file_name=explode('.',$image_file_name);
	$image_extension=end($exploded_image_file_name);
	$image_extension_ok;
	$image_upload_errors=array();
	$image_upload_successful='';

		/*Check if the file exists*/
		if(file_exists($target_image_folder.$_FILES['venue_image_upload']['name'])){
			echo 'Sorry, file already exists';
		}else{

		for ($i=0 ; $i < sizeof($allowed_image_extensions) ; $i++ ) { 
			if($image_extension==$allowed_image_extensions[$i]){
				$image_extension_ok=1;
				break;
			}
		}

			if($image_extension_ok==1){
				if($_FILES['venue_image_upload']['size']<=200000){
					$venue_id=$_POST['venue_id'];
					if(isset($venue_id)&&!empty($venue_id)){
					move_uploaded_file($_FILES['venue_image_upload']['tmp_name'], $target_image_folder.$_FILES['venue_image_upload']['name']);
					$image_upload_successful="Image upload successful!";

					/*Record the path of the image file in venue table*/					
					$result=mysqli_query($connect,"UPDATE venue SET venue_image='".$target_image_folder.$_FILES['venue_image_upload']['name']."' WHERE venue_id='".$venue_id."'");
						if($result){
							echo 'image path stored successfully';
						}else{
							echo 'image path store error';
						}
						mysqli_free_result($result);
						mysqli_close($connect);
					}else{
						echo 'Please insert venue_id';
					}				
				}else{
					$image_upload_errors[]="Image file too large, less than 2MB required!";
				}
			}else{
				$image_upload_errors[]="Not an image file!";
			}

		}/*File exists else clause*/

			/*Confirm outcome, success or fail*/
	echo '<div class="outcome_message">';
				if(!empty($image_upload_errors)){

					foreach($image_upload_errors as $value){						
						echo $value,'<br>';
						unset($image_upload_errors);
					}

					}else{
						echo $image_upload_successful;
						unset($image_upload_successful);
					}
	echo '</div>';
	
}/*Image file validation*/
	
	
if(isset($_FILES['db_file_upload'])){
	
	$text_file_name=$_FILES['db_file_upload']['name'];
	$allowed_text_file_extensions=array('txt');
	$exploded_text_file_name=explode('.',$text_file_name);
	$text_file_extension=end($exploded_text_file_name);
	$text_file_extension_ok;
	$text_file_upload_errors=array();
	$text_file_upload_successful='';

		/*Check if the file exists*/
		if(file_exists($target_text_file_folder.$_FILES['db_file_upload']['name'])){
			$text_file_upload_errors[]="Sorry, file already exists.";
		}else{

		for ($i=0 ; $i < sizeof($allowed_text_file_extensions) ; $i++ ){
			if($text_file_extension==$allowed_text_file_extensions[$i]){
				$text_file_extension_ok=1;
				break;
			}
		}

			if($text_file_extension_ok==1){
				if($_FILES['db_file_upload']['size']<=1000000){
					
					move_uploaded_file($_FILES['db_file_upload']['tmp_name'], $target_text_file_folder.$_FILES['db_file_upload']['name']);
					$text_file_upload_successful="DB text file upload successful!";
				
				}else{
					$text_file_upload_errors[]="DB text file too large, less than 10MB required!";
				}
			}else{
				$text_file_upload_errors[]="Not a text file!";
			}

		}/*File doesnot exist else clause*/

			/*Confirm outcome, success or fail*/
	echo '<div class="outcome_message">';
				if(!empty($text_file_upload_errors)){

					foreach($text_file_upload_errors as $value){
						echo $value,'<br>';
						unset($text_file_upload_errors);
					}

					}else{
						echo $text_file_upload_successful;
						unset($text_file_upload_successful);
					}
	echo '</div>';
}


if(isset($_POST['delete_files'])&&!empty($_POST['delete_files'])){

	if(file_exists($target_text_file_folder.$_POST['delete_files'])){
		unlink($target_text_file_folder.$_POST['delete_files']);
	}
	elseif(file_exists($target_image_folder.$_POST['delete_files'])){
		unlink($target_image_folder.$_POST['delete_files']);
	}else{

	echo '<div class="outcome_message">';
		echo 'Sorry, file does not exist';
	echo '</div>';

	}
}/*delete files*/


?>