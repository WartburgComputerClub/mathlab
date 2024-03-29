<?php
require_once('checkuser.php');
require_once('connect.php');

$date = $_POST['date'];
$id = $_POST['id'];
$db = db_connect();
$stmt = $db->stmt_init();
$stmt1 = $db->stmt_init();

if ($_SESSION['user'] == 'admin')
{
    // make sure student exists
    $sql = "SELECT id FROM student WHERE id=?";
}else{
    $sql = "SELECT id FROM student WHERE course=? AND id=?";
}

if ($stmt->prepare($sql) && $stmt1->prepare("DELETE FROM session WHERE id=? AND student=?"))
{
    if ($_SESSION['user'] == 'admin'){
	$stmt->bind_param('i',$id);
    }
    else{
	$stmt->bind_param('ii',$_SESSION['user'],$id);
    }
    $stmt1->bind_param('si',$date,$id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0)
	$stmt1->execute();
    $stmt->free_result();
    $stmt->close();
    $stmt1->close();
}
$db->close();
?>
