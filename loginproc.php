<?php
require_once('connect.php');
if (!isset($_POST['username']) || !isset($_POST['password']))
  die("<font color='red'>Incorrect login!</font>");

if ($_POST['username'] == 'admin')
{
    if ($_POST['password'] == 'test')
    {
	session_start();
	$_SESSION['user'] = 'admin';
	die("admin");
    }
    else
	echo("<font color='red'>Incorrect login!</font>");
}else if ($_POST['username'] == 'signin')
{
    if ($_POST['password'] == 'test')
    {
	session_start();
	$_SESSION['user'] = 'signin';
	die('signin');
    }
    else
	echo("<font color='red'>Incorrect login!</font>");
}else
{
    $db = db_connect();
    $stmt = $db->stmt_init();
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if ($stmt->prepare("SELECT id FROM user WHERE username=? AND password=?"))
    {
	$stmt->bind_param('ss',$username,$password);
	$stmt->execute();
	$stmt->bind_result($id);
	$stmt->store_result();
	if ($stmt->num_rows > 0)
	{
	    $stmt->fetch();
	    session_start();
	    $_SESSION['user'] = $id;
	    $stmt->free_result();
	    $stmt->close();
	    $db->close();
	    die("user");
	}
	$stmt->close();
    }
    $db->close();
    die("<font color='red'>User not found!</font>");
}
?>
