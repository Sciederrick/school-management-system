<!DOCTYPE html>
<html>
	<head>		
		<link type="text/css" rel="stylesheet" href="">	
	</head>
	<body>
		<div class="container">		
			<div class="box_filters">
				<form action="" method="POST" id="menu_options">
					<table> 
						<tr>            
						<td>
						<select name="school_2" size='1'>
							<option value="kesses">Kesses</option>
							<option value="engineering">Engineering</option>
							<option value="medicine">Medicine</option>
							<option value="biological" selected>Biological</option>
							<option value="education">Education</option>
							<option value="arts">Arts</option>
							<option value="human resource">Human Resource</option>
							<option value="agriculture">Agriculture</option>
							<option value="hospitality">Hospitality</option>
						</select> 
						</td> 
						<td>
							<input type="submit" value="go">
						</td>
						</tr>
					</table>
				</form>
			</div>
			<?php
	$school=$_POST['school_2'];

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$connect=mysqli_connect("localhost","root","derrick8","school_venue_management_system");
		$result=mysqli_query($connect,"SELECT * FROM venue WHERE school='".$school."' ORDER BY venue_id DESC") OR die('Fatal error');
		$numRows=mysqli_num_rows($result);
		$info=array(array());
			if($numRows>0){
				for( $i=0 ; $i < $numRows ; $i++ ){
					$info[]=mysqli_fetch_assoc($result);
				}
			}
	}else{
		echo "<p style='color:#F7FDD4'>Please select a school of choice</p>";
	}
	?>		
			<div class="profile_container">
		<?php
			for( $i=0 ; $i <$numRows ; $i++ ){
				?>
				<div class="profile_box">
					<figure>
						<figcaption><?php echo $info[$i]['venue_id']; ?></figcaption>
						<img src="<?php echo $info[$i]['venue_image']; ?>" height='300' width='300' alt="<?php echo $info[$i]['venue_image']; ?>">
					</figure>
					<p>Capacity:<?php echo $info[$i]['capacity']; ?>
					<p>Located at <?php echo $info[$i]['building']; ?></p>
					<p>Is a host of facilities such as: <?php echo $info[$i]['facilities']; ?></p>
				</div>
				<?php
			}
		?>	
			</div>
		</div>	
	</body>
</html>

