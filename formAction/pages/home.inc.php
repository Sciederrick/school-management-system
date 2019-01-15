
<br>
<form action="home.inc.php" method="GET">

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

require_once '../../classes/Database.php';
$day=strtolower(date('l'));
$building=$_GET['building'];
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
}
}
else{
echo 'error fetching information';
}
?>
