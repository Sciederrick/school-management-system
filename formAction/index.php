
<a href="index.php">HOME</a>
<a href="index.php?p=aboutus">About us</a>
<a href="index.php?p=contactus">Contact us</a>
<a href="index.php?p=news">News</a>
<?php

session_start();

$p=$_GET['p'];
if(!empty($_GET['p'])){
$pages_dir='pages';
$pages=scandir($pages_dir, 0);
unset($pages[0],$pages[1]);

if(in_array($p.'.inc.php',$pages)){
include($pages_dir.'/'.$p.'.inc.php');
}else{
echo 'Sorry Page Not Found';
}
}else{
//include($pages_dir.'/home.inc.php');
}
?>
<form action="index.php"  method="GET">
<select name="building" size="2">
<option value="tech">TECH
<option value="biological">BIOLOGICAL
<option value="hr">HR
<option value="education">EDUCATION
<option value="arts">ARTS
</select>
<input type="Submit" value="SUBMIT">
</form>

<?php

require_once '../classes/Database.php';
//$day=strtolower(date('l'));
$day='monday';
$building=$_GET['building'];
$_SESSION['building_pass']=$building;
if(isset($building)){
$db=new Database('localhost','root','
',$day);
$db->query("SELECT * FROM $building");
if($db->numRows()<>0){
echo '<br>';
echo "<table border='1'>";
foreach($db->rows() as $value){
echo '<tr>';
foreach($value as $val){
echo '<td><pre>'.$val.'</pre></td>';
}
echo '</tr>';
}
echo '</table>';
echo '<br><br>';

}
else{
echo 'Please make a selection!';
}
/*Delegating booking and releasing functionality only to classreps*/
//Connecting to users database

$password=$_SESSION['password_pass'];/*Required
for validating who(classrep) get's the book and
release privilege by fetching user_type and Cohort*/
$db2=new Database('localhost','root',' ','users');
$db2->query("SELECT user,cohort FROM students WHERE password='".$password."'");
if($db2->numRows()<>0){
$user_cohort=array(array());
$user_cohort=$db2->rows();
if($user_cohort[0]['user']=='classrep'){/*code for showcasing booking and release info and procedures*/
echo 'Logged in as ',$user_cohort[0]['user'];

//Passing a value to release.php for classrep validation
$_SESSION['user_cohort_pass']=$user_cohort[0]['cohort'];

$db->query("SELECT * FROM $building WHERE
status='free'");
if($db->numRows()<>0){
echo "<table border='1'>";
foreach($db->rows() as $value){
echo '<tr>';
foreach($value as $val){
echo '<td>';
echo '<pre>'.$val.'</pre>';
echo '</td>';
}
echo '</tr>';
}
echo '</table>';
?>
<br>
<br>
<form action="book.php" method="GET">
<fieldset>
<legend>Venue_Booking</legend>
<br>ID:<br>
<input type='text' name='id' >
<!--<br>GROUP:<br>
<input type='text' name='group' >
***Trying to minimize user input***
-->
<br>COURSE:<br>
<input type='text' name='course'>
<!--<br>LECTURER:<br>
<input type='text' name='lec' >
<br>TEL:<br>
<input type='tel' name='tel' >
Minimizing user input!!
-->
<input type='Reset' value='reset'>
<input type='Submit' value='Submit'>
</fieldset>
</form>
<?php
}
else{
echo '<br><br>All venues are booked<br><br>';
}

$db->query("SELECT * FROM $building WHERE
status='booked'");
if($db->numRows()<>0){
?>
<br>
<p>For the convenience of other groups, please
release the venue if in any case it will not be of
use in the forthcoming periods.<br>Release the
venue by entering the ID for the venue that you
want to release.</p>
<form action="release.php" method="GET">
<fieldset>
<legend>Venue_Releasing</legend>
ID:<input type='text' name='ID'><input
type='Submit' value='RELEASE'>
</fieldset>
</form>

<?php
}
}
else{echo 'Logged in as normal user';}
}else{echo 'Failed to fetch details from the Database';}
}
?>
