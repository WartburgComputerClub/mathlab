<?php
require_once('checksignin.php');
require 'libs/Smarty.class.php';

$date = '';
$date = $_GET['date'];

$smarty = new Smarty;
//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;

$smarty->assign('title','Signin Page');
$smarty->assign('date',$date);
$smarty->display('signin.tpl');
?>
