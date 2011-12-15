<?
ob_start();
include 'Classes/PHPExcel.php';
require_once('checkuser.php');
require_once('config.php');
mysql_connect(DBAuth::$host,DBAuth::$user,DBAuth::$password);
mysql_select_db(DBAuth::$db);
$user = $_SESSION['user'];

$objReader = PHPExcel_IOFactory::createReader('Excel5');   
$excel = $objReader->load('sheet.xls');
// Get first exam date
$sql = "SELECT `exam`,department,code,section,prof,halftime FROM `course` WHERE `id`=$user";
$sem_split = $row['5'];
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$exam = $row[0];
$prof = $row[4];
$department = $row[1];
$code = $row[2];
$section = $row[3];
$year = Date('Y');


$excel->setActiveSheetIndex(0);
$worksheet = $excel->getActiveSheet();
$worksheet->setCellValueByColumnAndRow(7,5,$exam);
$worksheet->setCellValueByColumnAndRow(6,4,$prof);
$worksheet->setCellValueByColumnAndRow(6,2,$year);
$worksheet->setCellValueByColumnAndRow(8,2,$department);
$worksheet->setCellValueByColumnAndRow(9,2,$code);
$worksheet->setCellValueByColumnAndRow(10,2,$section);

$sql = "SELECT distinct id FROM session";
$result = mysql_query($sql);
$worksheet->setCellValueByColumnAndRow(12,5,mysql_num_rows($result));

$sql = "SELECT id,lastname,firstname,interest,taken,future FROM student WHERE course=$user";
$sql1 = "SELECT * FROM session WHERE student=? AND date < ?";
$sql2 = "SELECT * FROM session WHERE student=?";
$result = mysql_query("SELECT id,lastname,firstname,interest,taken,future FROM student WHERE course=$user");

$row =8;
while ($row1 = mysql_fetch_row($result))
{
    $id = $row1[0];
    $last = $row1[1];
    $first = $row1[2];
    $interest = $row1[3];
    $taken = $row1[4];
    $future = $row1[5];
    
    if ($taken == 1)
	$taken = 'Yes';
    else
	$taken = 'No';

    
    $worksheet->setCellValueByColumnAndRow(6,$row,$last);
    $worksheet->setCellValueByColumnAndRow(7,$row,$first);
    $worksheet->setCellValueByColumnAndRow(8,$row,$interest);
    $worksheet->setCellValueByColumnAndRow(9,$row,$taken);
    $worksheet->setCellValueByColumnAndRow(10,$row,$future);
    
    $sql = "SELECT * FROM session WHERE student=$id AND id < '$exam'";
    $result1 = mysql_query($sql);

    $worksheet->setCellValueByColumnAndRow(11,$row,mysql_num_rows($result1));	
    
    $result1 = mysql_query("SELECT * FROM session WHERE student=$id AND id <'$sem_split'");
    $worksheet->setCellValueByColumnAndRow(12,$row,mysql_num_rows($result1));
    $result1 = mysql_query("SELECT * FROM session WHERE student=$id AND id >='$sem_split'");
    $worksheet->setCellValueByColumnAndRow(13,$row,mysql_num_rows($result1));
    $row++;
}

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="report.xls"');
header('Cache-Control: max-age=0');
// Cleanup
$objWriter->save('php://output');


?>
