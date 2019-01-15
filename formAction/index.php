
<a href="index.php">HOME</a>
<a href="index.php?p=aboutus">About us</a>
<a href="index.php?p=contactus">Contact us</a>
<a href="index.php?p=news">News</a>
<?php

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
session_start();
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
$db->query("SELECT * FROM $building WHERE
Status='free'");
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
<br>ID:<br>
<input type='text' name='id' >
<br>GROUP:<br>
<input type='text' name='group' >
<br>COURSE:<br>
<input type='text' name='course'>
<br>LECTURER:<br>
<input type='text' name='lec' >
<br>TEL:<br>
<input type='tel' name='tel' >
<input type='Reset' value='reset'>
<input type='Submit' value='Submit'>
</form>
<?php
}
else{
echo 'All venues are booked<br><br>';



}
}
?>
