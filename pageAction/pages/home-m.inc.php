<!-- TO-DO LIST:
*Logic for deleting view_timetable after a period of time 
*How to check if a database of a table exists
*VenueProfiles.inc.php
-->
<?php
session_start();
$reg_no=$_SESSION['reg_no'];
?>
<!DOCTYPE html>
<html lang='en'>
<head>  
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  					   
</head>
<body>  
<div class="container-fluid showcase_tables">  
<div class="d-flex flex-column justify-content-center align-content-around">     
<div class="float-left pl-0">
   
    <!-- Form for school and day filters -->
    <form action="" method="GET" class="my-3">        
          <select class="custom-select-sm pt-0" name="school">
            <option value="engineering">Engineering</option>
            <option value="medicine">Medicine</option>
            <option value="biological" selected>Biological</option>
            <option value="education">Education</option>
            <option value="arts">Arts</option>
            <option value="human resource">Human Resource</option>
            <option value="agriculture">Agriculture</option>
            <option value="hospitality">Hospitality</option>
          </select>             
          <select class="custom-select-sm pt-0" name="day">
            <option value="<?php 
            date_default_timezone_set("Africa/Nairobi");
            echo strtolower(date("l")); ?>"selected>today</option>                 
            <option>monday</option>
            <option>tuesday</option>
            <option>wednesday</option>
            <option>thursday</option>
            <option>friday</option>
          </select>                       
          <button class="btn btn-secondary btn-sm" type="submit">Go</button>  
    </form>           
  </div>   
  <?php
    $connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');                                   
    $school=$day='';
    $school=$_GET['school']; 
    $day=$_GET['day'];

    $_SESSION['school']=$school;
    $_SESSION['day']=$day;
  ?>    
  <div class="box_free_venues">
  
  </div>
      <div class="box_booking">
        <?php
        if(isset($school)&&!empty($school)){
          if(isset($day)&&!empty($day)){
  
            $result=mysqli_query($connect,"SELECT * FROM view_timetable WHERE status='free' AND school='".$school."' AND day_of_week='".$day."' ORDER BY duration");
            $numRows=mysqli_num_rows($result);

          if($numRows>0){/*show forms for booking free venues*/
            ?>
            <form method="POST" action="" name="booking_form">             
                              
                  <?php                                             
                    $result=mysqli_query($connect,"SELECT courses_enrolled FROM cohort WHERE reg_no='".$reg_no."'");

                    $numRows=mysqli_num_rows($result);
                    $info=mysqli_fetch_array($result);
                    $str=$info[0];                      


                      if($numRows>0){
                        $exploded_courses=explode(',',$str);
                      
                  ?>   
                  <div class="input-group input-group-sm mb-3">                
                    <select class="custom-select-sm pt-0" name='course'>
                      <?php
                        for( $i=0 ; $i < sizeof($exploded_courses) ; $i++ ){
                          echo '<option value='; echo $exploded_courses[$i]; echo '>'; echo $exploded_courses[$i]; echo '</option>';
                        }
                      }else{
                        echo 'can\'t book, empty courses';
                      }
                      mysqli_free_result($result);
                      $result=mysqli_query($connect,"SELECT timetable_id, venue_id, duration FROM view_timetable WHERE status='free' AND school='".$school."' AND day_of_week='".$day."' ORDER BY duration");
                      unset($info,$numRows);
                      $numRows=mysqli_num_rows($result);
                      for($i=0; $i<$numRows; $i++){
                      $info[]=mysqli_fetch_assoc($result);
                      }
                      ?>
                    </select>                          
                   
                    <select class="custom-select-sm pt-0" name="id" placeholder="id">
                    <?php 
                    for($i=0; $i<$numRows; $i++){
                    ?>
                      <option value="<?php echo $info[$i]['timetable_id'];?>"><?php echo $info[$i]['venue_id'];?>&nbsp;&nbsp;<?php echo $info[$i]['duration'];?></option>
                    <?php
                    }
                    ?>
                    </select>
                    <div class="input-group-append">               
                      <button class="btn btn-success btn-sm" type="submit">book</button>
                    </div>            
                  </div>
                  <input type='hidden' id='transaction_type' name='transaction_type' value='book'> 
                      
            </form>
                    
        <?php
          }else{/*Otherwise*/
            echo 'All venues are booked';
          }

        }else{
          echo 'Please select a day of the week';
        }
       }else{
         echo 'Please select a school of choice';
       }
      
        ?>
      </div>
    <div class="box_booked_venues">
    
    </div>
      <div class="box_release_form">
          <?php
           $result=mysqli_query($connect,"SELECT timetable_id, venue_id, duration FROM view_timetable WHERE status='booked' AND school='".$school."' AND day_of_week='".$day."' ORDER BY duration");
           unset($info,$numRows);
           $numRows=mysqli_num_rows($result);
           for($i=0; $i<$numRows; $i++){
           $info[]=mysqli_fetch_assoc($result);
           }
           if(isset($school)&&!empty($school)){
            if(isset($day)&&!empty($day)){
          if($numRows>0){/*show form for releasing booked venues*/
            ?>
            <form method="POST" action="" name="release_form" id="release_form">               
              <div class="input-group input-group-sm mb-3">
                  <select class="custom-select-sm pt-0" name="id" placeholder="id">
                    <?php 
                    for($i=0; $i<$numRows; $i++){
                    ?>
                      <option value="<?php echo $info[$i]['timetable_id'];?>"><?php echo $info[$i]['venue_id'];?>&nbsp;&nbsp;<?php echo $info[$i]['duration'];?></option>
                    <?php
                    }
                    ?>
                    </select>
                 <!--  <input type="text" class="form_control text-center text-primary" name="id" placeholder="id"> --> <!-- replace with select:duration and venue_id -->
                <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" type="submit">release</button>
                </div>
              </div>
              <input type='hidden' id='transaction_type' name='transaction_type' value='release'>
            </form>
        <?php
          }else{/*Otherwise*/
            echo 'All Venues Are Free';
          }
          mysqli_close($connect);
        }else{
          echo 'Please select a day of the week';
        }
       }else{
         echo 'Please select a school of choice';
       }
    ?>
  </div>          
</div>
</div>

<!-- Refresh box_free_venues and box_booked_venues divs -->
<script type="text/javascript">
  $(document).ready(function(){
    $( '.box_free_venues').load( " free_booked_tables.php #free");
    $( '.box_booked_venues').load( " free_booked_tables.php #booked")
    refresh();
  });
  function refresh(){
    setTimeout(function(){
    $( '.box_free_venues').fadeOut('slow').load( " free_booked_tables.php) 
    $( '.box_booked_venues').fadeOut('slow').load( " free_booked_tables.php)
      .fadeIn('slow');
      refresh();
    },200);
  }
</script>
</body>
</html>
<!-- =========================================================================================== -->
<!--book-->
 <?php

if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['transaction_type']=='book'){
	session_start();
	$reg_no=$_SESSION['reg_no'];/*Use registration number from login.php*/
	$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');

	/*Get timetable_id and course_code specified by user*/
	$id=mysqli_real_escape_string($connect,$_POST['id']);
	$course_code=mysqli_real_escape_string($connect,$_POST['course']);

	/*transaction type from hidden form control*/
	$transaction_type=mysqli_real_escape_string($connect,$_POST['transaction_type']);

	/*Get User's cohort*/
	$result=mysqli_query($connect,"SELECT cohort FROM classrep WHERE reg_no='".$reg_no."'");
	$numRows=mysqli_num_rows($result);

	if($numRows<1) die("Fatal Error1");

	$info=mysqli_fetch_array($result,MYSQLI_ASSOC);

	/*Update view table*/
	$result=mysqli_query($connect,"UPDATE view_timetable SET cohort='".$info['cohort']."', status='booked', course_code='".$course_code."' WHERE timetable_id='".$id."' AND status='free'");
	

		if($result){
			echo "<script>alert('Venue booked successfully')</script>";

	/*If book event successful keep track in transaction table*/		/*Get venue id from view_timetable*/
			$result=mysqli_query($connect,"SELECT venue_id FROM view_timetable WHERE timetable_id='".$id."'");
			$numRows=mysqli_num_rows($result);
			if($numRows<1) die("Fatal Error2");

				/*store venue_id in $transaction_venue*/
			$transaction_venue_id=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$venue_id=$transaction_venue_id['venue_id'];

				/*get the date and time of the trasaction*/
			date_default_timezone_set("Africa/Nairobi");
			$transaction_date=date("Y-m-d");
			$transaction_time=date("h:i:sa");

				/*record the transaction in the database*/
			$result=mysqli_query($connect,"INSERT INTO transaction (venue_id,time,date,transaction_type,reg_no) VALUES ('$venue_id','$transaction_time','$transaction_date','$transaction_type','$reg_no')");
			($result)?"":die("Fatal Error3");
			
		}else{
			echo "<script>alert('Booking failed)</script>";
		}

	mysqli_free_result($result);
	mysqli_close($connect);
}

?>
<!-- =========================================================================================== -->
<!--release-->

<?php

if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['transaction_type']=='release'){
	session_start();
	$reg_no=$_SESSION['reg_no'];/*Use registration number from login.php*/

$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');

	/*Get timetable_id specified by the user*/
	$id=mysqli_real_escape_string($connect,$_POST['id']);

	/*transaction type from hidden form control*/
	$transaction_type=mysqli_real_escape_string($connect,$_POST['transaction_type']);
	
	/*Get user's cohort*/
	$result=mysqli_query($connect,"SELECT cohort FROM classrep WHERE reg_no='".$reg_no."'");
	$numRows=mysqli_num_rows($result);

	if($numRows<1) die("Fatal Error1");

	$info2=mysqli_fetch_array($result,MYSQLI_ASSOC);

	/*Get cohort from view table*/
	$result=mysqli_query($connect,"SELECT cohort FROM view_timetable WHERE timetable_id='".$id."' AND status='booked'");
	$numRows=mysqli_num_rows($result);

	if($numRows<1) die("Fatal Error2");

	$info=mysqli_fetch_array($result,MYSQLI_ASSOC);

		$cohorts=explode(',',$info['cohort']);

		if(sizeof($cohorts)>1){
			$validate_cohort='';
			for($i=0; $i<sizeof($cohorts); $i++){
				/*Compare the cohort from view table and classrep table to ensure the user only releases for his group*/
				if($cohorts[$i]===$info2['cohort']){
					$result=mysqli_query($connect,"UPDATE view_timetable SET status='free', cohort='', course_code='' WHERE timetable_id='".$id."' AND status='booked'");
					$validate_cohort='ok';
					break;
				}				
			}

			if(empty($validate_cohort)) echo "<script>alert('You can only release venues for your group')</script>";
		}else{

			if($info['cohort']===$info2['cohort']){
			$result=mysqli_query($connect,"UPDATE view_timetable SET status='free', cohort='', course_code='' WHERE timetable_id='".$id."'");
			if($result){
				echo "<script>alert('Venue released successfully')</script>";

			/*If book event successful keep track in transaction table*/
				/*Get venue id from view_timetable*/
			$result=mysqli_query($connect,"SELECT venue_id FROM view_timetable WHERE timetable_id='".$id."'");
			$numRows=mysqli_num_rows($result);
			if($numRows<1) die("Fatal Error3");

				/*store venue_id in $transaction_venue*/
			$transaction_venue_id=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$venue_id=$transaction_venue_id['venue_id'];

					/*get the date and time of the transaction*/
				date_default_timezone_set("Africa/Nairobi");
				$transaction_date=date("Y-m-d");
				$transaction_time=date("h:i:sa");

					/*record the transaction in the database*/
				$result=mysqli_query($connect,"INSERT INTO transaction (venue_id,time,date,transaction_type, reg_no) VALUES ('$venue_id', '$transaction_time','$transaction_date','$transaction_type','$reg_no')");
				($result)?"":die("Fatal Error4");

			}else{
				echo "<script>alert('Releasing failed')</script>";
			}
		}else{
			echo "<script>alert('You can only release venues for your group')</script>";
		}

		}

		mysqli_free_result($result);
		mysqli_close($connect);
}

?>


<div id="show_tables">
<!-- <?php
function display_tables(){
?> -->
<div class="d-flex flex-column justify-content-center align-content-around">     
<div class="float-left pl-0">
   
    <!-- Form for school and day filters -->
    <form action="" method="GET" class="my-3">        
          <select class="custom-select-sm pt-0" name="school">
            <option value="engineering">Engineering</option>
            <option value="medicine">Medicine</option>
            <option value="biological" selected>Biological</option>
            <option value="education">Education</option>
            <option value="arts">Arts</option>
            <option value="human resource">Human Resource</option>
            <option value="agriculture">Agriculture</option>
            <option value="hospitality">Hospitality</option>
          </select>             
          <select class="custom-select-sm pt-0" name="day">
            <option value="<?php 
            date_default_timezone_set("Africa/Nairobi");
            echo strtolower(date("l")); ?>"selected>today</option>                 
            <option>monday</option>
            <option>tuesday</option>
            <option>wednesday</option>
            <option>thursday</option>
            <option>friday</option>
          </select>                       
          <button class="btn btn-secondary btn-sm" type="submit">Go</button>  
    </form>           
  </div>   
  <?php
    $connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');                                   
    $school=$day='';
    $school=$_GET['school']; 
    $day=$_GET['day'];
  ?>    
  <div class="box_free_venues">
    <?php                
  
      	/*Query to create view  on Sunday*/

/* 	$today=strtolower(date('l'));
	if($today==='sunday'){
  mysqli_query($connect,"CREATE OR REPLACE VIEW view_timetable AS SELECT timetable_id, status, timetable.venue_id, school, day_of_week, duration, cohort, course_code, capacity FROM timetable,venue WHERE timetable.venue_id=venue.venue_id;"); 
	} */
      if(isset($school)&&!empty($school)){
        if(isset($day)&&!empty($day)){

          $result=mysqli_query($connect,"SELECT * FROM view_timetable WHERE status='free' AND school='".$school."' AND day_of_week='".$day."' ORDER BY duration");
          $numRows=mysqli_num_rows($result);
          
            if($numRows>0){/*show free venues from view table*/
              ?>
          <div class="table-responsive" id="free_venues">
              <table class="table table-sm table-light table-striped">
              <thead class="bg-success">
                <tr>
                  <th>id</th>                      
                  <th>status</th>                      
                  <th>venue</th>                      
                  <th>school</th>                      
                  <th>day_of_week</th>                      
                  <th>duration</th>                      
                  <th>cohort</th>                      
                  <th>course</th>                      
                  <th>capacity</th>                      
                </tr>
              </thead>
              <tbody>
              <?php
            foreach($result as $value){
              echo '<tr>';
              foreach($value as $val){
                echo '<td><pre>',$val,'</pre></td>';
              }
              echo '</tr>';
            }
            echo '</table>';
            mysqli_free_result($result);

            }
              ?> 
              </tbody>
      </div>
      </div>
      <div class="box_booking">
        <?php
          if($numRows>0){/*show forms for booking free venues*/
            ?>
            <form method="POST" action="" name="booking_form">             
                              
                  <?php                                             
                    $result=mysqli_query($connect,"SELECT courses_enrolled FROM cohort WHERE reg_no='".$reg_no."'");

                    $numRows=mysqli_num_rows($result);
                    $info=mysqli_fetch_array($result);
                    $str=$info[0];                      


                      if($numRows>0){
                        $exploded_courses=explode(',',$str);
                      
                  ?>   
                  <div class="input-group input-group-sm mb-3">                
                    <select class="custom-select-sm pt-0" name='course'>
                      <?php
                        for( $i=0 ; $i < sizeof($exploded_courses) ; $i++ ){
                          echo '<option value='; echo $exploded_courses[$i]; echo '>'; echo $exploded_courses[$i]; echo '</option>';
                        }
                      }else{
                        echo 'can\'t book, empty courses';
                      }
                      mysqli_free_result($result);
                      $result=mysqli_query($connect,"SELECT timetable_id, venue_id, duration FROM view_timetable WHERE status='free' AND school='".$school."' AND day_of_week='".$day."' ORDER BY duration");
                      unset($info,$numRows);
                      $numRows=mysqli_num_rows($result);
                      for($i=0; $i<$numRows; $i++){
                      $info[]=mysqli_fetch_assoc($result);
                      }
                      ?>
                    </select>                          
                   
                    <select class="custom-select-sm pt-0" name="id" placeholder="id">
                    <?php 
                    for($i=0; $i<$numRows; $i++){
                    ?>
                      <option value="<?php echo $info[$i]['timetable_id'];?>"><?php echo $info[$i]['venue_id'];?>&nbsp;&nbsp;<?php echo $info[$i]['duration'];?></option>
                    <?php
                    }
                    ?>
                    </select>
                    <div class="input-group-append">               
                      <button class="btn btn-success btn-sm" type="submit">book</button>
                    </div>            
                  </div>
                  <input type='hidden' id='transaction_type' name='transaction_type' value='book'> 
                      
            </form>
                    
        <?php
          }else{/*Otherwise*/
            echo 'All venues are booked';
          }
        ?>
      </div>
      <div class="box_booked_venues">
        <?php

          /*Get booked venues from view table*/

          $result=mysqli_query($connect,"SELECT * FROM view_timetable WHERE status='booked' AND school='".$school."' AND day_of_week='".$day."' ORDER BY duration");
          $numRows=mysqli_num_rows($result);
          

            if($numRows>0){/*Display booked venues*/

            ?>
        <div class="table-responsive" id="booked_venues">
            <table class="table table-sm table-light table-striped">
            <thead class="bg-primary">
              <tr>
                <th>id</th>                      
                <th>status</th>                      
                <th>venue</th>                      
                <th>school</th>                      
                <th>day_of_week</th>                      
                <th>duration</th>                      
                <th>cohort</th>                      
                <th>course</th>                      
                <th>capacity</th>                      
              </tr>
            </thead>
            <tbody>
            <?php
            foreach($result as $value){
              echo '<tr>';
              foreach($value as $val){
                echo '<td><pre>',$val,'</pre></td>';
              }
              echo '</tr>';
            }
            echo '</table>';

            }                  
            mysqli_free_result($result);
            ?>
            </tbody>           
      </div>
      </div>
      <div class="box_release_form">
          <?php
           $result=mysqli_query($connect,"SELECT timetable_id, venue_id, duration FROM view_timetable WHERE status='booked' AND school='".$school."' AND day_of_week='".$day."' ORDER BY duration");
           unset($info,$numRows);
           $numRows=mysqli_num_rows($result);
           for($i=0; $i<$numRows; $i++){
           $info[]=mysqli_fetch_assoc($result);
           }
          if($numRows>0){/*show form for releasing booked venues*/
            ?>
            <form method="POST" action="" name="release_form" id="release_form">               
              <div class="input-group input-group-sm mb-3">
                  <select class="custom-select-sm pt-0" name="id" placeholder="id">
                    <?php 
                    for($i=0; $i<$numRows; $i++){
                    ?>
                      <option value="<?php echo $info[$i]['timetable_id'];?>"><?php echo $info[$i]['venue_id'];?>&nbsp;&nbsp;<?php echo $info[$i]['duration'];?></option>
                    <?php
                    }
                    ?>
                    </select>
                 <!--  <input type="text" class="form_control text-center text-primary" name="id" placeholder="id"> --> <!-- replace with select:duration and venue_id -->
                <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" type="submit">release</button>
                </div>
              </div>
              <input type='hidden' id='transaction_type' name='transaction_type' value='release'>
            </form>
        <?php
          }else{/*Otherwise*/
            echo 'All Venues Are Free';
          }
          mysqli_close($connect);
        }/*if day isset and not empty block*/
        else{
          echo 'Please select a day of the week';
        }

      }/*if school isset and not empty block*/
      else{
        echo 'Please select a school of choice';
      }
    ?>
  </div>          
</div>
<?php
}
?>
</div>