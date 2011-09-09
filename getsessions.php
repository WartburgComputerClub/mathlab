<?php
require_once('checksignin.php');
require_once('connect.php');

$db = db_connect();
$stmt = $db->stmt_init();
if ($stmt->prepare("SELECT distinct DATE_FORMAT(id,'%d/%m/%Y') FROM session"))
{
    $stmt->execute();
    $stmt->bind_result($date);
    while($stmt->fetch())
    {
	echo("<a href='signin.php?date=$date'>");
	echo($date);
	echo("</a>");
	echo('<br />');
    }
    $stmt->close();
}

$db->close();
?>
