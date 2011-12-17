<?php
require_once('checkuser.php');
require_once('connect.php');
require 'libs/Smarty.class.php';

$sessions = array();

$db = db_connect();
$stmt = $db->stmt_init();
if ($stmt->prepare("SELECT distinct id FROM session ORDER BY id asc"))
{
    $stmt->execute();
    $stmt->bind_result($date);
    while($stmt->fetch())
    {
	array_push($sessions,$date);
    }
    $stmt->close();
}

$db->close();

$smarty = new Smarty;
//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
$smarty->assign('title','Sessions');
$smarty->assign('sessions',$sessions);
$smarty->display('sessions.tpl');
?>
