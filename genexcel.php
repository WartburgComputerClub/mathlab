<?
ob_start();
include 'Classes/PHPExcel.php';
require_once('checkuser.php');
require_once('connect.php');

$objReader = PHPExcel_IOFactory::createReader('Excel5');   
$excel = $objReader->load('sheet.xls');
$db = db_connect();
$stmt = $db->stmt_init();

$excel->setActiveSheetIndex(0);
$worksheet = $excel->getActiveSheet();
$sql = 'SELECT lastname,firstname,interest,taken,future FROM student WHERE course=?';

if ($stmt->prepare($sql))
{
    $stmt->bind_param('i',$_SESSION['user']);
    $stmt->execute();
    $stmt->bind_result($last,$first,$interest,$taken,$future);
    $row = 8;
    while($stmt->fetch())
    {
	if ($taken == 1)
	    $taken = 'Yes';
	else
	    $taken = 'No';
		
	$worksheet->setCellValueByColumnAndRow(6,$row,$last);
	$worksheet->setCellValueByColumnAndRow(7,$row,$first);
	$worksheet->setCellValueByColumnAndRow(8,$row,$interest);
	$worksheet->setCellValueByColumnAndRow(9,$row,$taken);
	$worksheet->setCellValueByColumnAndRow(10,$row,$future);
    }
}

//$worksheet->setCellValueByColumnAndRow(6,8,"Hello World!");
$db->close();
//$objWriter = PHPExcel_IOFactory::createWriter($excel,'Excel5');
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="report.xls"');
header('Cache-Control: max-age=0');
// Cleanup
$objWriter->save('php://output');


?>
