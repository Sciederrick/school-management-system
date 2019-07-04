<?php
session_start();
$reg_no=$_SESSION['reg_no'];
define('FPDF_FONTPATH','font/');
require('fpdf.php');
$connect=mysqli_connect('localhost','root','derrick8','school_venue_management_system');
$result=mysqli_query($connect,"SELECT cohort FROM cohort WHERE reg_no='".$reg_no."'");
if($result){
    $cohort=mysqli_fetch_assoc($result);
    $cohort_title=$cohort['cohort'];
}else{
    echo 'cohort fetch failed';
}
if(isset($_POST['generate_pdf'])){
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../img/mulogo.png',10,10,0,20);
    /* $this->AddFont('times','','times.php'); */
    $this->SetFont('times','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Weekly_venue_schedule',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
 /*  $this->AddFont('times','','times.php'); */

    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('times','',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$result=mysqli_query($connect,"SELECT venue_id,capacity,school,day_of_week,duration,course_code FROM view_timetable WHERE cohort='".$cohort['cohort']."'");
$pdf = new PDF('P','mm','A4');
//header
$pdf->AddPage();
$pdf->setFillColor('BLUE');

//footer page
$pdf->AliasNbPages();
$pdf->SetFont('times','BI',12);


$pdf->Ln(10);
$pdf->Cell(30,12,'venue_id',1);
$pdf->Cell(30,12,'capacity',1);
$pdf->Cell(30,12,'school',1);
$pdf->Cell(30,12,'day_of_week',1);
$pdf->Cell(30,12,'duration',1);
$pdf->Cell(30,12,'course',1);

$pdf->SetFont('times','',12);
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column){
$pdf->Cell(30,12,$column,1);
}
}
/* $pdf->Cell(40,12,'Hello World!'); */
$pdf->Output();
}
?>