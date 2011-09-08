<?php
session_start();
if (isset($_POST['password']) && $_POST['password'] == 'test')
{
    $_SESSION['admin'] = 'true';
    header("Location: admin.php");
}else
{
    session_destroy();
    header("Location: index.php");
}
?>
