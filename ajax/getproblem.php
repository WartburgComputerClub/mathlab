<?php
include('../checkuser.php');
require_once('../connect.php');

$db = db_connect();
$stmt = $db->stmt_init();

if (isset($_POST['value'])) {
    if ($_POST['question'] == 1) {
	if ($stmt->prepare("UPDATE problem SET question=? WHERE id=?")) {
	    $stmt->bind_param('si',$_POST['value'],$_POST['id']);
	    $stmt->execute();
	    // I could die($_POST['question'] here but I'm not worried about database performance
	}
    }else {
	if ($stmt->prepare("UPDATE problem SET answer=? WHERE id=?")) {
	    $stmt->bind_param('si',$_POST['value'],$_POST['id']);
	    $stmt->execute();
	}
    }
}

if ($_POST['question'] == 1) {
    if ($stmt->prepare("SELECT question FROM problem WHERE id=?")) {
	$stmt->bind_param('i',$_POST['id']);
	$stmt->execute();
	$stmt->bind_result($question);
	$stmt->fetch();
	$stmt->close();
    }
    if ($_POST['edit'] == 1) {
	$id = 'questiontext-' . $_POST['id'];
	echo "<textarea id='$id' row='15' cols='40'>";
	echo $question;
	echo '</textarea>';
    } else {
	echo $question;
    }
} else {
    if ($stmt->prepare("SELECT answer FROM problem WHERE id=?")) {
	$stmt->bind_param('i',$_POST['id']);
	$stmt->execute();
	$stmt->bind_result($answer);
	$stmt->fetch();
	$stmt->close();
    }
    if ($_POST['edit'] == 1) {
	$id = "answertext-" . $_POST['id'];
	echo "<textarea id='$id' row'15' cols='40'>";
	echo $answer;
	echo '</textarea>';
    } else {
	echo $answer;
    }
}

$db->close();
?>
