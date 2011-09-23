<?php
require_once("checkuser.php");
require_once("connect.php");

$prof = '';
$department = '';
$code = '';
$code = '';
$section = '';
$exam = '';
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
	if ($stmt->prepare("UPDATE course SET department=?,code=?,section=?,exam=?,prof=? WHERE id=?"))
	{
	    $stmt->bind_param('siissi',$_POST['department'],$_POST['code'],$_POST['section'],$_POST['exam'],$_POST['prof'],$_SESSION['user']);
	    $stmt->execute();
	}
    }else
    {
	if ($stmt->prepare("INSERT INTO course (id,department,code,section,exam,prof) VALUES (?,?,?,?,?,?)"))
	{
	    $stmt->bind_param('isiiss',$_SESSION['user'],$_POST['department'],$_POST['code'],$_POST['section'],$_POST['exam'],$_POST['prof']);
	    $stmt->execute();

	}
    }

}

if ($stmt->prepare("SELECT prof,department,code,section,exam FROM course WHERE id=?"))
{
    $stmt->bind_param('i',$_SESSION['user']);
    $stmt->execute();
    $stmt->bind_result($prof,$department,$code,$section,$exam);
    $stmt->fetch();
}


$stmt->close();
$db->close();
?>
<html>
  <head>
    <link rel="stylesheet" href="css/style.css" />
    <link type="text/css" rel="stylesheet" href="css/dark-hive/jquery-ui-1.8.16.custom.css" />
    <style>
      div.ui-datepicker{
      font-size:10px;
      }

    </style>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
	$('#datepicker').datepicker({
	    //changeMonth: true,
	    //changeYear: true,
	    dateFormat: 'yy-mm-dd'
	});
    });
    </script>
    <title>Class Editor</title>
  </head>
  <body>
    <div class="padded bodywrap">
      <h1>Class Editor</h1>
      <div class="content">
	<form name="editclassform" method="post">
	<table border="0" align="center">
	  <tr>
	    <td>Professor: </td>
	    <td><input type="text" value='<?php echo $prof; ?>' name="prof" /></td>
	  </tr>
	  <tr>
	    <td>Department: </td>
	    <td><input type="text" name="department" value='<?php echo $department; ?>' /></td>
	  </tr>
	  <tr>
	    <td>Class Code: </td>
	    <td><input type="text" name="code" value='<?php echo $code; ?>' /></td>
	  </tr>
	  <tr>
	    <td>Section: </td>
	    <td><input type="text" name="section" value='<?php echo $section; ?>' /></td>
	  </tr>
	  <tr>
	    <td>First Exam Date: </td>
	    <td><input type="text" id="datepicker" name="exam" value='<?php echo $exam; ?>' /></td>
	  </tr>
	  <tr><td><input type="submit" value="submit" /></td><td></td></tr>
	</table>

	</form>
      </div>
      <a href="user.php">[Back]</a> <a href="logout.php">[Logout]</a>
    </div>
  </body>
</html>
