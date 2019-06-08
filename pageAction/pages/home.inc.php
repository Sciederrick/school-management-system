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
<html>
	<head>  
    <link href="../../css/style.css" rel="stylesheet" type="text/css"/>      					   
 	</head>
	<body>      
    <div class="box_session_filter">
        <ul>
          <li>            
            <?php
              echo strtolower(date("l"));
            ?>
          </li>
          
          <li>            
            <?php           
              echo date("Y-m-d");
            ?>            
          </li>
          <li>            
            <?php
              echo date("h:i:sa");
            ?>            
          </li>
        </ul>     
        <!-- Form for school and day filters -->
        <form action="" method="GET" id="menu_options">
          <table> 
            <tr>            
              <td>
              <select name="school">
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
                <select name="day">
                  <option value="<?php 
                  date_default_timezone_set("Africa/Nairobi");
                  echo strtolower(date("l")); ?>"selected>today</option>                 
                  <option>monday</option>
                  <option>tuesday</option>
                  <option>wednesday</option>
                  <option>thursday</option>
                  <option>friday</option>
                </select>
              </td>           
              <td colspan='2'><input type="submit" value="Go"></td>
            </tr>
          </table>
        </form>           
      </div> 
      <div class="container">     
      <div class="box_free_venues">
        <?php                
          $connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');                                   
          $school=$day='';
          $school=$_GET['school']; 
          $day=$_GET['day'];

          if(isset($school)&&!empty($school)){
            if(isset($day)&&!empty($day)){

              $result=mysqli_query($connect,"SELECT * FROM view_timetable WHERE status='free' AND school='".$school."' AND day_of_week='".$day."' ORDER BY day_of_week");
              $numRows=mysqli_num_rows($result);
              
                if($numRows>0){/*show free venues from view table*/
                  ?>
                  <table class="db_tables">
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
          </div>
          <div class="box_booking">
            <?php
              if($numRows>0){/*show forms for booking free venues*/
                ?>
                <form method="POST" action="./book.php" name="booking_form" id="booking_form">                 
                  <table>
                    <tr>
                      <td><input type="text" class="form_field" name="id" placeholder="id"></td>                   
                      <td>
                      <?php                                             
                        $result=mysqli_query($connect,"SELECT courses_enrolled FROM cohort WHERE reg_no='".$reg_no."'");

                        $numRows=mysqli_num_rows($result);
                        $info=mysqli_fetch_array($result);
                        $str=$info[0];                      


                          if($numRows>0){
                            $exploded_courses=explode(',',$str);
                          
                      ?>                        
                          <select name='course'>
                            <?php
                              for( $i=0 ; $i < sizeof($exploded_courses) ; $i++ ){
                                echo '<option value='; echo $exploded_courses[$i]; echo '>'; echo $exploded_courses[$i]; echo '</option>';
                              }
                            }else{
                              echo 'can\'t book, empty courses';
                            }
                            mysqli_free_result($result);
                            ?>
                          </select>                                            
                      </td>   
                      <td><input type='hidden' id='transaction_type' name='transaction_type' value='book'></td>                  
                      <td><input type="submit" value="book"></td>
                    </tr>
                  </table>                  
                </form>
            <?php
              }else{/*Otherwise*/
                echo '<p class="feedback">','All Venues Are Booked','</p>';
              }
            ?>
          </div>
          <div class="box_booked_venues">
            <?php

              /*Get booked venues from view table*/

              $result=mysqli_query($connect,"SELECT * FROM view_timetable WHERE status='booked' AND school='".$school."' AND day_of_week='".$day."' ORDER BY day_of_week");
              $numRows=mysqli_num_rows($result);
              

                if($numRows>0){/*Display booked venues*/

                ?>
                <table class="db_tables">
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
          </div>
          <div class="box_release_form">
             <?php
              if($numRows>0){/*show form for releasing booked venues*/
                ?>
                <form method="POST" action="./release.php" name="release_form" id="release_form">                 
                  
                  <table>
                    <tr>
                      <td><input type="text" class="form_field" name="id" placeholder="id"></td>
                      <td><input type='hidden' id='transaction_type' name='transaction_type' value='release'>
                      <td><input type="submit" value="release"></td>
                    </tr>                    
                  </table>                 
                </form>
            <?php
              }else{/*Otherwise*/
                echo '<p class="feedback">','All Venues Are Free','</p>';
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
	</body>
</html>
