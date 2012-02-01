<?php
include('../checkuser.php');
require_once('../connect.php');

$db = db_connect();
$stmt = $db->stmt_init();

if (isset($_POST['id'])) {
    if ($stmt->prepare("DELETE FROM problem WHERE id=?")) {
	$stmt->bind_param('i',$_POST['id']);
	$stmt->execute();
	$stmt->close();
    }
}
$db->close();

?>
