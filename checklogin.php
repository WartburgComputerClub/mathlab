<?php
if (!isset($_SESSION))
    session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 'true')
{
    session_destory();
    header("Location: index.php");
}
?>
