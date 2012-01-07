<?php
require_once('checkuser.php');
require_once('connect.php');

$date = $_POST['date'];
$db = db_connect();
$stmt = $db->stmt_init();
if ($_SESSION['user'] == 'admin'){
    $sql = "SELECT student.id,firstname,lastname FROM student INNER JOIN session on (student.id=session.student) WHERE session.id=?";
}else{
    $sql = "SELECT student.id,firstname,lastname FROM student INNER JOIN session on (student.id=session.student) WHERE session.id=? AND student.course=?";
}

if ($stmt->prepare($sql))
{
    if ($_SESSION['user'] == 'admin'){
	$stmt->bind_param('s',$date);
    }else{
	$stmt->bind_param('si',$date,$_SESSION['user']);
    }
    $stmt->execute();
    $stmt->bind_result($id,$first,$last);
    while($stmt->fetch())
    {
	$deleteStr = 'deleteStudent(' . $id . ')';
	echo $first . ' ' . $last . ' ';
	echo "<input type='button' value='delete' onclick=\"$deleteStr\" />";
	echo '<br />';
    }
}
$db->close();
?>
