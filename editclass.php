<?php
require_once("checkuser.php");
require_once("connect.php");
require 'libs/Smarty.class.php';

$prof = '';
$department = '';
$code = '';
$code = '';
$section = '';
$exam = '';
$halftime = '';
$db = db_connect();
$stmt = $db->stmt_init();

if (isset($_POST['prof']))
{
    $update = false;
    if ($stmt->prepare("SELECT * FROM course WHERE id=?"))
    {
	$stmt->bind_param('i',$_SESSION['user']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0)
	    $update = true;
	$stmt->free_result();
    }

    if ($update)
    {
	if ($stmt->prepare("UPDATE course SET department=?,code=?,section=?,exam=?,halftime=?,prof=? WHERE id=?"))
	{
	    $stmt->bind_param('siisssi',$_POST['department'],$_POST['code'],$_POST['section'],$_POST['exam'],$_POST['halftime'],$_POST['prof'],$_SESSION['user']);
	    $stmt->execute();
	}
    }else
    {
	if ($stmt->prepare("INSERT INTO course (id,department,code,section,exam,halftime,prof) VALUES (?,?,?,?,?,?,?)"))
	{
	    $stmt->bind_param('isiisss',$_SESSION['user'],$_POST['department'],$_POST['code'],$_POST['section'],$_POST['exam'],$_POST['halftime'],$_POST['prof']);
	    $stmt->execute();

	}
    }

}

if ($stmt->prepare("SELECT prof,department,code,section,exam,halftime FROM course WHERE id=?"))
{
    $stmt->bind_param('i',$_SESSION['user']);
    $stmt->execute();
    $stmt->bind_result($prof,$department,$code,$section,$exam,$halftime);
    $stmt->fetch();
    $stmt->close();
}

$db->close();
$smarty = new Smarty;
//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;

$smarty->assign('title','Class Editor');
$smarty->assign('prof',$prof);
$smarty->assign('department',$department);
$smarty->assign('code',$code);
$smarty->assign('section',$section);
$smarty->assign('exam',$exam);
$smarty->assign('halftime',$halftime);

$smarty->display('editclass.tpl');
?>
