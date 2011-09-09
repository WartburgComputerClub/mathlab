<?php
require_once('checksignin.php');
require_once('connect.php');

$db = db_connect();
$stmt = $db->stmt_init();


$db->close();
?>
