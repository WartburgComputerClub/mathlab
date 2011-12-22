<?php
session_start();
include('checklogin.php');
require_once('connect.php');

require 'libs/Smarty.class.php';

$db = db_connect();
$stmt = $db->stmt_init();
$users = array();
$names=array();
if ($stmt->prepare("SELECT id,username FROM user"))
{
    $stmt->execute();
    $stmt->bind_result($id,$user);
    while($stmt->fetch())
    {
	array_push($users,$id);
	$names[$id] = $user;
    }
    $stmt->close();
}
$db->close();

$smarty = new Smarty;
//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
$smarty->assign('users',$users);
$smarty->assign('names',$names);
$smarty->assign('title','Admin Page');
$smarty->display('admin.tpl');

?>
