<?php
session_start();
include('checklogin.php');

require 'libs/Smarty.class.php';
$smarty = new Smarty;
//$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->assign('title','Admin Page');
$smarty->display('admin.tpl');

?>
