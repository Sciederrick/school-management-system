<?php
session_start();
$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');  
 $school=$_SESSION['school'];
 $day=$_SESSION['day'];
 $reg_no=$_SESSION['reg_no'];
?>
<div class="box_free_venues">
    <?php                
      if(isset($school)&&!empty($school)){
        if(isset($day)&&!empty($day)){

          $result=mysqli_query($connect,"SELECT * FROM view_timetable WHERE status='free' AND school='".$school."' AND day_of_week='".$day."' ORDER BY duration");
          $numRows=mysqli_num_rows($result);
          
            if($numRows>0){/*show free venues from view table*/
    ?>
          <div class="table-responsive">
              <table class="table table-sm table-light table-striped" id='free'>
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
            mysqli_free_result($result);
            ?> 
              </tbody>
              </table>
          </div>
            <?php
            }else{
              echo 'All Venues are booked';
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
            <table class="table table-sm table-light table-striped" id='booked'>
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
            }                 
            mysqli_free_result($result);
            ?>
            </tbody>  
            </table>         
        </div>
</div>
<?php
   }else{
     echo 'Please select a day of the week';
   }
  }else{
    echo 'Please select a school of choice';
  }

?>
