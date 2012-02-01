<?php
include('../checkuser.php');
require_once('../connect.php');

$db = db_connect();
$stmt = $db->stmt_init();

if ($stmt->prepare("INSERT INTO problem (question,answer) VALUES ('','')"))
{
    $stmt->execute();
    $id = $stmt->insert_id;
    echo "<div id='problem-$id'>";
    echo "<h2>Question</h2>";
    echo "<div id='question-$id'>";
    echo "<textarea id='questiontext-$id' rows='15'cols='40'>";
    echo "";
    echo "</textarea>";
    echo '</div><br /><br />';
    echo '<h2>Answer</h2>';
    echo "<div id='answer-$id'>";
    echo "<textarea id='answertext-$id' rows='15'cols='40'>";
    echo "";
    echo "</textarea>";
    echo '</div>';
    echo "<input type='button' id='delete-$id' value='cancel' onclick='cancelEdit($id)' />";
    echo "<input type='button' id='modify-$id' value='save' onclick='saveQuestion($id)' />";
    echo '<hr /><br /></div>';
}
?>
