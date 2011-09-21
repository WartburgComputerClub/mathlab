<?php
require_once("checkuser.php");
require_once("connect.php");

$db = db_connect();
$stmt = $db->stmt_init();
if ($stmt->prepare("DELETE FROM student WHERE course=? AND id=?"))
{
    $stmt->bind_param('ii',$_SESSION['user'],$_POST['id']);
    $stmt->execute();
    if ($stmt->affected_rows < 1)
    {
	$stmt->close();
	$db->close();
	die();
    }
}
$db->close();
if ($stmt->prepare("DELETE FROM session WHERE student=?"))
{
    $stmt->bind_param('i',$_POST['id']);
    $stmt->execute();
    $stmt->close();
}
$db->close();
?>
