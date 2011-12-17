<?php
require_once("checkuser.php");
require 'libs/Smarty.class.php';
$smarty = new Smarty;
//$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->assign('title','User Dashboard');
$smarty->display('user.tpl');

?>

