<?php
require_once('checksignin.php');
require_once('connect.php');

$db = db_connect();
$stmt = $db->stmt_init();
if ($stmt->prepare("SELECT distinct id FROM session ORDER BY id asc"))
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
    if (!isset($date))
	$date = '2010-03-01'; // This shouldn't be a problem unless a time machine is invented
    echo("<input type='hidden' id='last' value=\"$date\" />"); 
    $stmt->close();
}

$db->close();
die("</br>");
?>
