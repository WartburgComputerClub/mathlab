<?php
require_once("checksignin.php");
require_once('connect.php');

$first = ucfirst($_POST['firstname']);
$last = ucfirst($_POST['lastname']);
$date = $_POST['date'];
$db = db_connect();
$stmt = $db->stmt_init();
$stmt1 = $db->stmt_init();
$stmt2 = $db->stmt_init();
// First check if already signed in
if ($stmt->prepare("SELECT id FROM student WHERE firstname=? AND lastname=?") && $stmt1->prepare("SELECT id FROM session WHERE student=?") && $stmt2->prepare("INSERT INTO session (id,student) VALUES (?,?)"))
{
    $stmt->bind_param('ss',$first,$last);
    $stmt1->bind_param('i',$id);
    $stmt2->bind_param('si',$date,$id);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt1->bind_result($sessionId);
    $stmt->store_result();
    if ($stmt->num_rows > 0)
    {
	while($stmt->fetch())
	{
	    $stmt1->execute();
	    $stmt1->store_result();
	    $error = false;
	    while ($stmt1->fetch())
	    {
		if ($sessionId == $date)
		    $error = true;
	    }
	    if ($error)
	    {
		$stmt->free_result();
		$stmt->close();
		$db->close();
		die("<font color='red'>You are already signed in!</font>");
	    }
	    $stmt2->execute();
	    $stmt1->free_result();
	}
    }
    else
    {
	$stmt->free_result();
	$stmt->close();
	$db->close();
	die("<font color='red'>Student not found!</font>");
    }

    $stmt->free_result();
    $stmt2->close();
    $stmt->close();

}
$db->close();
die("<font color='green'>You have successfully signed in!</font>");
?>
