<!DOCTYPE html>
<html>
	<head>		
		<link href="../../../style.css" rel="stylesheet"/>
	</head>
	<body>
	<div id="nav">
		<ul>
			<li><a href="admin">files</a></li>
			<li><a href="admin?p=edit">edit</a></li>
			<li><a href="admin?p=database">database</a></li>
			<li><a href="admin?p=support">support</a></li>
		</ul>
	</div>
	<div id="main">
	<?php

				$dir="adminpages";


		if(!empty($_GET['p'])){
			$dir_files=scandir($dir,0);
			unset($dir_files[0],$dir_files[1]);
			$p=$_GET['p'];
				if(in_array($p.'.inc.php', $dir_files)){
					include($dir.'/'.$p.'.inc.php');
				}
				else{					
					echo 'Sorry, Page Not Found!';
				}
		}else{
			include($dir.'/'.'files.inc.php');
		}
		
	?>
	</div>

	<div id="files_showcase">
		<!-- showcasing files and folders -->
		<?php
		$target_text_file_folder='../uploads/database/';
		$target_image_folder='../uploads/images/';

		$uploads_dir=scandir("../uploads");
		unset($uploads_dir[0], $uploads_dir[1]);
		$uploads_dir_size=sizeof($uploads_dir);

		$database_dir=scandir("../uploads/database");
		unset($database_dir[0], $database_dir[1]);
		$database_dir_size=sizeof($database_dir);

		$images_dir=scandir("../uploads/images");
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
		<form action='' method='POST'>
				<table>
					<caption><?php echo $target_text_file_folder.$_POST['file_to_open']; ?></caption>
					<tr>						
						<td><textarea name='file_area' rows='15' cols='65'><?php

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

						?></textarea></td>
					</tr>					
				</table>
		</form>	

		
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
					<td></td>
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


	<div id="queries_text_area">
		<form action='' method='POST'  id='admin'>			
				<table>				
				<tr>
					<td>Queries:</td>
					<td><textarea name='queries' rows='10' cols='50' placeholder='Run your database queries here...'></textarea></td>
					<td></td>
					<td><input type='submit' value='run'></td>
				</tr>
			</table>			
		</form>
	</div>
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

	
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
					move_uploaded_file($_FILES['venue_image_upload']['tmp_name'], $target_image_folder.$_FILES['venue_image_upload']['name']);
					$image_upload_successful="Image upload successful!";					
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
}/*db text file validation*/


if(isset($_POST['queries'])&&!empty($_POST['queries'])){
	$db_query=$_POST['queries'];

	$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');
	$result=mysqli_query($connect, $db_query);
	$numRows=mysqli_num_rows($result);

	$db_query_run_status=($result||$numRows>0)?"<p>Query executed successfully</p><br>":"<p>Query execution failed</p><br>";
	echo $db_query_run_status;

/*Displaying results for SELECT AND SHOW QUERIES*/
	
	echo '<div id="query_results">';

	$info=array(array());
		if($numRows<>0){
			for( $i=0 ; $i < $numRows ; $i++ ){
			$info[]=mysqli_fetch_assoc($result);
			}

			echo '<table>';
			foreach($info as $value){
				echo '<tr>';
				foreach($value as $val){
					echo '<td>',$val,'</td>';
				}
				echo '</tr>';
			}
			echo '</table>';
		}

	echo '</div>';

	mysqli_free_result($result);
	mysqli_close($connect);

}/*db queries*/

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

}/*SERVER['REQUEST_METHOD'] Block*/

?>
	
	</body>
</html>
