<?php
require_once("checkadmin.php");
require_once('connect.php');
if (!isset($_POST['username']) || !isset($_POST['password']))
{
    die("<font color='red'>Inputs are not set!.</font>");
}
$db = db_connect();
$stmt = $db->stmt_init();
$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['delete']))
{
    $stmt1 = $db->stmt_init();
    $stmt2 = $db->stmt_init();

    $sql = "SELECT id FROM student WHERE course=?";
    $sql1 = "DELETE FROM session WHERE student=?";
    $sql2 = "DELETE FROM student WHERE id=?";
    
    $id = $_POST['id'];
    // First delete orphaned sessions and students
    if ($stmt->prepare($sql) && $stmt1->prepare($sql1) && $stmt2->prepare($sql2))
    {
	$stmt->bind_param('i',$id);
	$stmt1->bind_param('i',$student_id);
	$stmt2->bind_param('i',$student_id);
	$stmt->bind_result($student_id);
	$stmt->execute();
	$stmt->store_result();
	while($stmt->fetch())
	{
	    $stmt1->execute();
	    $stmt2->execute();
	}
	$stmt->free_result();
	$stmt1->close();
	$stmt2->close();
    }
    // now delete orphaned course
    if ($stmt->prepare("DELETE FROM course WHERE id=?"))
    {
	$stmt->bind_param('i',$id);
	$stmt->execute();
    }
    // finally delete user
    if ($stmt->prepare("DELETE FROM user WHERE id=?")){
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$stmt->close();
    }
    $db->close();
    die();
}
else if (isset($_POST['id'])){
    $id = $_POST['id'];
    if ($stmt->prepare("UPDATE user SET username=?,password=? WHERE id=?"))
    {
	$hash = md5($password);
	$stmt->bind_param('ssi',$username,$hash,$id);
	$stmt->execute();
	$stmt->close();
    }
    $db->close();
    die("<font color='green'>User updated successfully</font>");
}else
{
// First check if user already exists
    if ($stmt->prepare("SELECT * FROM user where username=?"))
    {
	$stmt->bind_param('s',$username);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0)
	{
	    $stmt->free_result();
	    $stmt->close();
	    $db->close();
	    die("<font color='red'>Username already exists!</font>");
	}
	$stmt->free_result();
    }
    $hash = md5($password);
    if ($stmt->prepare("INSERT INTO user (username,password) VALUES (?,?)"))
    {
	$stmt->bind_param('ss',$username,$hash);
	$stmt->execute();
	$stmt->close();
    }
    $db->close();
    die("<font color='green'>User created successfully</font>");
}
?>
    