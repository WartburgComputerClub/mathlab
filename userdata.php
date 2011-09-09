<?php
require_once('checkuser.php');
require_once('config.php');
mysql_connect(DBAuth::$host,DBAuth::$user,DBAuth::$password);
mysql_select_db(DBAuth::$db);
$page = 1;
$sortname = 'id'; // Sort column
$sortorder = 'asc'; // Sort order
$qtype = ''; // Search column
$query = ''; // Search string
// Get posted data
if (isset($_POST['page'])) {
        $page = mysql_real_escape_string($_POST['page']);
}
if (isset($_POST['sortname'])) {
        $sortname = mysql_real_escape_string($_POST['sortname']);
}
if (isset($_POST['sortorder'])) {
        $sortorder = mysql_real_escape_string($_POST['sortorder']);
}
if (isset($_POST['qtype'])) {
        $qtype = mysql_real_escape_string($_POST['qtype']);
}
if (isset($_POST['query'])) {
        $query = mysql_real_escape_string($_POST['query']);
}
if (isset($_POST['rp'])) {
        $rp = mysql_real_escape_string($_POST['rp']);
}
// Setup sort and search SQL using posted dat
$sortSql = "order by $sortname $sortorder";
$searchSql = ($qtype != '' && $query != '') ? "where $qtype = '$query'" : '';

$course = $_SESSION['user'];
if (strlen($searchSql) > 0)
    $searchSql .= " AND course=$course";
else
    $searchSql .= "WHERE course=$course";

$sql = "SELECT count(*) FROM student $searchSql";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$total = $row[0];

$pageStart = ($page-1)*$rp;
$limitSql = "limit $pageStart, $rp";
$data = array();
$data["page"] = $page;
$data["total"] = $total;
$data["rows"] = array();

$sql = "SELECT id,firstname,lastname,interest,taken,future FROM student $searchSql $sortSql $limitSql";

$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{
    $data["rows"][] = array("id" => $row['id'],
			    "cell" => array($row['firstname'],$row['lastname'],$row['interest'],$row['taken'],$row['future']));
}
echo json_encode($data);	

?>
