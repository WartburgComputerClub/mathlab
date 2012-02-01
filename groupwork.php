<?php
session_start();
include('checkuser.php');
require_once('connect.php');

require 'libs/Smarty.class.php';

$db = db_connect();
$stmt = $db->stmt_init();
$problems = array();

if ($stmt->prepare("SELECT question,answer,id FROM problem"))
{
    $stmt->execute();
    $stmt->bind_result($question,$answer,$id);
    while($stmt->fetch())
    {
	array_push($problems,array('question'=>$question,'answer'=>$answer,'key'=>$id));
    }
    $stmt->close();
}
$db->close();

$smarty = new Smarty;
//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
$smarty->assign('problems',$problems);
$smarty->assign('title','Group Work');
$smarty->display('groupwork.tpl');
?>
