<?php
if (!isset($_POST['username']) || !isset($_POST['password']))
  echo("<font color='red'>Incorrect login!</font>");

if ($_POST['username'] == 'admin')
  {
    if ($_POST['password'] == 'test')
      {
	session_start();
	$_SESSION['user'] == 'admin';
	echo("<script type='text/javscript'>");
	echo("window.location='admin.php'");
	die("</script>");
      }
    else
      echo("<font color='red'>Incorrect login!</font>");
  }


?>
