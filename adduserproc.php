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
?>
