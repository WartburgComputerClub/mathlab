<?php
require_once("checkuser.php");
require_once("connect.php");

$db = db_connect();
$stmt = $db->stmt_init();
if ($stmt->prepare("DELETE FROM student WHERE course=? AND id=?"))
{
    $stmt->bind_param('ii',$_SESSION['user'],$_POST['id']);
    $stmt->execute();
    $stmt->close();
}
$db->close();

?>
