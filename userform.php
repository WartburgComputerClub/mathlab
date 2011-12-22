<?php
require_once("checkuser.php");
require_once("connect.php");

$id = '';
$first = '';
$last = '';
$interest = '';
$taken = '';
$future = '';
if (isset($_POST['id']))
{
    $db = db_connect();
    $stmt = $db->stmt_init();
    if ($stmt->prepare("SELECT firstname,lastname,interest,taken,future FROM student WHERE id=?"))
    {
	$stmt->bind_param('i',$_POST['id']);
	$stmt->execute();
	$stmt->bind_result($first,$last,$interest,$taken,$future);
	$stmt->fetch();
	$stmt->close();
    }
    $db->close();
}
if ($taken == 1)
    $taken = 'Yes';
else
    $taken = 'No';

?>
<form>
  <table border="0">
    <tr>
      <td>First Name: </td>
      <td><input type="text" id="firstname" value='<?php echo $first; ?>' /></td>
    </tr>
    <tr>
      <td>Last Name: </td>
      <td><input type="text" id="lastname" value='<?php echo $last; ?>' /></td>
    </tr>
    <tr>
      <td>Interest Level (1-5): </td>
      <td><input type="text" id="interest" value='<?php echo $interest; ?>' /></td>
    </tr>
    <tr>
      <td>Taken Before? </td>
      <td><input type="text" id="taken" value='<?php echo $taken; ?>' /></td>
    </tr>
    <tr>
      <td>Future Plans (A-F): </td>
      <td><input type="text" id="future" value='<?php echo $future; ?>' /></td>
    </tr>
  </table>
  <br />
<?php
    if (isset($_POST['id']))
    {
	$studentid = $_POST['id'];
?>
<input type="button" onclick="update()" value="Update" />
<input type="hidden" id="studentid" value='<?php echo $studentid; ?>' />
<?php
    }else{
?>
  <input type="button" onclick="save()" value="Add Student" />
<?php
	    }
?>
  <input type="button" value="Cancel" onclick="cancel()" />
</form>
