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
$id = intval($_POST['id']);
if ($stmt->prepare("UPDATE student SET firstname=?,lastname=?,interest=?,taken=?,future=? WHERE id=? AND course=?"))
{
    $stmt->bind_param('ssiisii',$_POST['firstname'],$_POST['lastname'],$interest,$taken,$_POST['future'],$id,$_SESSION['user']);
    $stmt->execute();
    $stmt->close();
}
$db->close();
?>
