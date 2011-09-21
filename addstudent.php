<?php
require_once("checkuser.php");
require_once("connect.php");

$db = db_connect();
$stmt = $db->stmt_init();
$interest = intval($_POST['interest']);
if (substr($_POST['taken'],0,1) == 'y' || substr($_POST['taken'],0,1) == 'Y')
    $taken = 1;
else
    $taken = 0;

if ($stmt->prepare("INSERT INTO student (firstname,lastname,course,interest,taken,future) VALUES (?,?,?,?,?,?)"))
{
    $stmt->bind_param('ssiiis',$_POST['firstname'],$_POST['lastname'],$_SESSION['user'],$interest,$taken,$_POST['future']);
    $stmt->execute();
    $stmt->close();
}
$db->close();
?>
