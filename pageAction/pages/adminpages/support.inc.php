<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin|support</title>	
	<link href="../../../css/all.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body {
		position: relative; 
	}
	</style>
	<script>
		function timedRefresh(timeoutPeriod) {
			setTimeout("location.reload(true);",timeoutPeriod);
		}
		window.onload = timedRefresh(20000);
	</script>	
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" style="background-image:url(../../../img/doodles.png)">
<div id="Support" class="container my-5 py-3 bg-light">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="#Today's_Messages">Today's Messages<i class="fas fa-chevron-down"></i></a>
		</li>
		<!-- <li class="nav-item">
			<a class="nav-link" href="#Stalled_Messages">Stalled Messages<i class="fas fa-chevron-down"></i></a>
		</li> -->
	</ul>
</nav>

	<h3 class="pt-3"><i class="fas fa-mail-bulk"><span class="pl-2 font-weight-normal">support<span></i></h3>

<div class="container py-3" id="Today's_Messages">
<?php

$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');

$result=mysqli_query($connect,"SELECT contactus_id, reg_no, email, phone_number, message FROM contactus WHERE date=(CURRENT_DATE) ORDER BY contactus_id DESC");

$numRows=mysqli_num_rows($result);
for($i=0; $i<$numRows; $i++){
	$info[]=mysqli_fetch_assoc($result);
}

	/*Today's messages section*/
	echo '<hr>';
	if($numRows<>0){		
?>
		<div class="table-responsive">
		<p class="text-center text-monospace lead font-weight-bold text-secondary pt-2"><i class="fas fa-hourglass-start"><span class="pl-2">Today's Messages</span></i></p>
		<table class="table table-sm mx-auto table-striped">
			<thead class="thead-dark">
				<tr>
					<th>contactus_id</th>
					<th>reg_no</th>
					<th>email</th>
					<th>phone_number</th>
					<th>&nbsp;&nbsp;</th>
				</tr>
			</thead>
			<tbody>
		<?php
		for($i=0; $i<$numRows; $i++){
		?>
		<tr class="text-monospace small">
		<?php
			echo '<td>'.$info[$i]['contactus_id'].'</td><td>'.$info[$i]['reg_no'].'</td><td>'.$info[$i]['email'].'</td><td>'.$info[$i]['phone_number'].'</td>';
		?>
		</tr>
		<?php
		}
		?>
		</tbody>
		</table>
		</div>


		<?php
	}else{
		echo '<h3 class="text-center"><i class="fas fa-umbrella-beach"><span class="pl-2">No messages today</span></i></h3>';
	}
		?>
		</div>  <!-- Today's Messages -->
<!-- 
		<div class="container py-3" id="Stalled_Messages"> -->
		<?php
/* 	echo '<hr>';

	/*Stalled responses section*/
	/* unset($result,$numRows,$info);
	$result=mysqli_query($connect,"SELECT contactus_id, time, date, reg_no, email, phone_number, message FROM contactus WHERE (date!=(CURRENT_DATE) AND response IS NULL) AND reg_no NOT REGEXP '^sysadmin' ORDER BY contactus_id ASC");
	$numRows=mysqli_num_rows($result);
	for($i=0; $i<$numRows; $i++){
        $info[]=mysqli_fetch_assoc($result);
    }

	echo '<hr>';
	if($numRows<>0){ */
?>
<!-- <div class="table-responsive">
<p class="text-center text-monospace lead font-weight-bold text-secondary pt-2"><i class="fas fa-hourglass-end"><span class="pl-2">Stalled Responses</span></i></p>
<table class="table table-sm mx-auto table-striped">
	<thead class="thead-dark">
		<tr>
			<th>contactus_id</th>
			<th>time</th>
			<th>date</th>
			<th>reg_no</th>
			<th>email</th>
			<th>phone number</th>
			<th>message</th>
		</tr>
	</thead>
	</tbody>
	<tbody> -->
	<?php
/* 	for($i=0; $i<$numRows; $i++){ */
	?>
	<!-- <tr class="text-monospace small"> -->
	<?php
/* 		echo '<td>'.$info[$i]['contactus_id'].'</td><td>'.$info[$i]['time'].'</td><td>'.$info[$i]['date'].'</td><td><button type="submit" class="btn btn-sm btn-info" data-toggle="modal" data-target="#stalled_responses">'.$info[$i]['reg_no'].'</button></td><td>'.$info[$i]['email'].'</td><td>'.$info[$i]['phone_number'].'</td><td><button type="submit" class="btn btn-sm btn-info" data-toggle="modal" data-target="#stalled_responses">read<i class="fas fa-chevron-down"></i></button></td>';
 */	?>
<!-- 	</tr> -->

	<?php
	/* } */
	?>
<!-- 	</tbody>
</table>
</div> -->
<?php
/* }else{
	echo '<h3 class="text-center"><i class="fas fa-umbrella-beach"><span class="pl-2">No stalled messages</span></i></h3>';
}
echo '<hr>'; */
?>
	<!-- </div> --> <!-- Stalled Messages -->

	<!-- modal -->
	<!-- <div class="modal" id="stalled_responses">
    <div class="modal-dialog">
        <div class="modal-content"> -->
            <!--Modal Header-->
           <!--  <div class=modal-header">
                <h4 class="modal-title text-center">Response</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> -->

            <!--Modal body-->
         <!--    <div class="modal-body">
            <form action='' method='POST'>
			<div class="form-group">		
				<input class="form-control" type="text" id="contactus_id" name="contactus_id" placeholder="contactus_id">
			</div>
            <div class="form-group">
                <textarea class="form-control form-control-sm" name='response' cols='50' rows='10' placeholder='Write a response here...'></textarea></td>
            </div>
                <button class="btn btn-sm btn-primary" type='submit'><i class="fas fa-paper-plane">send</i></button>
            </form>

            </div> --> <!-- end Modal body -->

            <!--Modal footer-->
     <!--        <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
	</div> -->

<?php


/* function get_post($var){
	$sanitized=trim($var);
	$sanitized=stripslashes($var);
	$sanitized=htmlspecialchars($var);
	return $sanitized;
}

	$response=$contactus_id='';
	$response=get_post($_POST['response']);
	$contactus_id=get_post($_POST['contactus_id']);

	if(isset($response)&&isset($contactus_id)){
		if(!empty($response)&&!empty($response)){
			$result=mysqli_query($connect,"UPDATE contactus SET response='".$response."' WHERE contactus_id='".$contactus_id."' AND (response='' OR response IS NULL)");

			if($result){
				?>
			<script>
				alert('Response sent successfully');
			</script>
				<?php
			}else{
				?>
			<script>
				alert('Sending failed');
			</script> */
				/* <?php */
/* 			}

		}
	} */

	mysqli_free_result($result);
	mysqli_close($connect);
?>
</div>

</body>
</html>