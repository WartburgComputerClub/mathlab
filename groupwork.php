<?php
session_start();
include('checkuser.php');
require_once('connect.php');

require 'libs/Smarty.class.php';

$db = db_connect();
$stmt = $db->stmt_init();
$problems = array();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$limit = ($page-1) * 2;
$limit = $limit . ',' . ($limit + 2);
$sql = "SELECT question,answer,id FROM problem LIMIT " . $limit;
if ($stmt->prepare($sql))
{
    $stmt->execute();
    $stmt->bind_result($question,$answer,$id);
    while($stmt->fetch())
    {
	array_push($problems,array('question'=>$question,'answer'=>$answer,'key'=>$id));
    }
    if ($stmt->prepare("SELECT COUNT(question) FROM problem")) {
	$stmt->bind_result($count);
	$stmt->execute();
	$stmt->fetch();
    }
    $stmt->close();
}
$db->close();
if ($page != 1) {
    $prev = "groupwork.php?page=" . ($page - 1);
} else {
    $prev = "#";
}
$next = "groupwork.php?page=" . ($page + 1);
$smarty = new Smarty;
//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
$smarty->assign('problems',$problems);
$smarty->assign('title','Group Work');
$smarty->assign('prev',$prev);
$smarty->assign('page',$page);
$smarty->assign('next',$next);
$smarty->display('groupwork.tpl');
?>
