<?php
require_once('checkuser.php');
require_once('connect.php');
?>
<html>
  <head>	
    <link rel="stylesheet" href="css/style.css" />
    <title>Sessions</title>
  </head>
  <body>
    <div class="padded bodywrap">
      <h1>SI Sessions</h1>
<?php
$db = db_connect();
$stmt = $db->stmt_init();
if ($stmt->prepare("SELECT distinct id FROM session ORDER BY id asc"))
{
    $stmt->execute();
    $stmt->bind_result($date);
    while($stmt->fetch())
    {
	echo("<a href='listsession.php?date=$date'>");
	echo($date);
	echo("</a>");
	echo('<br />');
    }
    $stmt->close();
}

$db->close();

?>
<br />
<a href="user.php">[back]</a> <a href="logout.php">[logout]</a>
</div>
</body>
</html>
