<!DOCTYPE html>
<html lang='en'>
<head>
</head>
<body>

<h2><i class="fas fa-users-cog"><span class="pl-2 font-weight-light">Users<span></i></h2>
<!-- Active Users -->
<?php
$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');
$result=mysqli_query($connect,"SELECT cohort, reg_no, email, phone_number FROM classrep WHERE active='1' AND reg_no NOT REGEXP '^sysadmin' ORDER BY cohort DESC");
$numRows=mysqli_num_rows($result);
    for($i=0; $i<$numRows; $i++){
        $info[]=mysqli_fetch_assoc($result);
    }

    mysqli_free_result($result);
?>
<div class="table-responsive">
<p class="text-center text-monospace lead font-weight-bold text-dark pt-2">Active Users</p>
<table class="table table-sm mx-auto table-striped">
    <thead class="thead-dark">
        <tr>
            <th>cohort</th>
            <th>reg_no</th>
            <th>email</th>
            <th>phone_number</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for($i=0; $i<$numRows; $i++){
        ?>
        <tr>
        <?php
            echo '<td>'.$info[$i]['cohort'].'</td><td><button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deactivate_users">'.$info[$i]['reg_no'].'</button></td><td>'.$info[$i]['email'].'</td><td>'.$info[$i]['phone_number'].'</td>';
        ?>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>
<!-- Inactive Users -->
<?php
mysqli_free_result($result);
unset($info);
$result=mysqli_query($connect,"SELECT cohort, reg_no, email, phone_number FROM classrep WHERE active='0' ORDER BY cohort DESC");
$numRows=mysqli_num_rows($result);
    for($i=0; $i<$numRows; $i++){
        $info[]=mysqli_fetch_assoc($result);
    }
?>
<div class="table-responsive">
<p class="text-center text-monospace lead font-weight-bold text-dark pt-2">Inactive Users</p>
<table class="table table-sm mx-auto table-striped">
    <thead class="thead-dark">
        <tr>
            <th>cohort</th>
            <th>reg_no</th>
            <th>email</th>
            <th>phone_number</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for($i=0; $i<$numRows; $i++){
        ?>
        <tr>
        <?php
            echo '<td>'.$info[$i]['cohort'].'</td><td><button type="submit" class="btn btn-sm btn-success" data-toggle="modal" data-target="#activate_users">'.$info[$i]['reg_no'].'</button></td><td>'.$info[$i]['email'].'</td><td>'.$info[$i]['phone_number'].'</td>';
        ?>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>

	<!-- modal deactivate -->
	<div class="modal" id="deactivate_users">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal Header-->
            <div class=modal-header">
                <h4 class="modal-title text-center">Deactivate User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!--Modal body-->
            <div class="modal-body">
            <form action='' method='POST'>
			<div class="form-group">		
				<input class="form-control" type="text" id="reg_no" name="reg_no" placeholder="reg_no">
			</div>
                <button class="btn btn-sm btn-info float-right" type='submit'><i class="fas fa-user-slash">Deactivate</i></button>
                <input type="hidden" name="deactivate_user" value="deactivate">
            </form>

            </div> <!-- end Modal body -->

            <!--Modal footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>

    <!-- modal activate -->
	<div class="modal" id="activate_users">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal Header-->
            <div class=modal-header">
                <h4 class="modal-title text-center">Activate User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!--Modal body-->
            <div class="modal-body">
            <form action='' method='POST'>
			<div class="form-group">		
				<input class="form-control" type="text" id="reg_no" name="reg_no" placeholder="reg_no">
			</div>
                <button class="btn btn-sm btn-info float-right" type='submit'><i class="fas fa-user-check">Activate</i></button>
                <input type="hidden" name="activate_user" value="activate">
            </form>

            </div> <!-- end Modal body -->

            <!--Modal footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $reg_no=$_POST['reg_no'];

/*     Activating user
 */ if($_POST['activate_user']=='activate'){
    mysqli_free_result($result);

    $result=mysqli_query($connect,"UPDATE classrep SET active='1' WHERE reg_no='".$reg_no."'");
    if($result){
        echo '<script>alert("User activated Successfully");</script>';
    }else{
        echo '<script>alert("User activation failed");</script>';
    }
    mysqli_free_result($result);

    }

/*     Deactivate user
 */ if($_POST['deactivate_user']=='deactivate'){
    $result=mysqli_query($connect,"UPDATE classrep SET active='0' WHERE reg_no='".$reg_no."'");
    if($result){
        echo '<script>alert("User deactivated Successfully");</script>';
    }else{
        echo '<script>alert("User deactivation failed");</script>';
    }
    mysqli_free_result($result);

    }
}// $_SERVER["REQUEST_METHOD"]
?>


