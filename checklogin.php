<?php
if (!isset($_SESSION))
    session_start();

if (!isset($_SESSION['user']) || $_SESSION['user'] != 'admin')
{
    session_destroy();
    header("Location: index.php");
}
?>
