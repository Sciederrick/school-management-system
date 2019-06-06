<!DOCTYPE html>
<html>
	<head>
		<link href='../../../css/style.css' type='text/css' rel='stylesheet'>
	</head>
	<body>
		<h1>edit</h1>
		<form action='' method='POST'>
				<table>
					<tr>
						<td>Write to or create:</td>
						<td><input type='text' name='file_to_write' placeholder='file name...'></td>						
					</tr>
				</table>
				<table>
					<caption>				
					<?php
					$target_text_file_folder='../../uploads/database/';
					 echo $target_text_file_folder.$_POST['file_to_write']; ?> 
					</caption>					
						<tr>						
							<td> 
								<textarea name='write_area' rows='15' cols='75' placeholder='Write to file...'>						
								</textarea> 							
							</td>
						</tr>
						<tr>
							<td><input type='submit' value='save'></td>
						</tr>					
				</table>
		</form>
	<?php
		
		if(isset($_POST['file_to_write'])&&!empty($_POST['file_to_write'])){	
	
			if(isset($_POST['write_area'])&&!empty($_POST['write_area'])){
				$myfile=fopen($target_text_file_folder.$_POST['file_to_write'],"a");			
				if($myfile){
					$txt=htmlspecialchars($_POST['write_area']);				
					fwrite($myfile,$txt);					
					fclose($myfile);
					echo 'Write Successful';
				}else{
					echo 'Unable to open file';
				}
			}
		}
	
	?>
	</body>
</html>