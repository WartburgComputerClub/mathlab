<?php
require_once('checkadmin.php');
require_once('connect.php');
require 'libs/Smarty.class.php';
$smarty = new Smarty;
//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;

if (isset($_REQUEST) && isset($_REQUEST['user'])){
    $title = 'Edit User';
    $db = db_connect();
    $stmt = $db->stmt_init();
    if ($stmt->prepare("SELECT username FROM user WHERE id=?"))
    {
	$stmt->bind_param('i',$_REQUEST['user']);
	$stmt->execute();
	$stmt->bind_result($name);
	$stmt->fetch();
	$stmt->close();
    }
    $db->close();
    $smarty->assign('user',$_REQUEST['user']);
    $smarty->assign('name',$name);
}else{
    $title = 'Add User';
}

$smarty->assign('title',$title);
$smarty->display('useradmin.tpl');

?>
