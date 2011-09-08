<?php
if (!isset($_SESSION))
    session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 'true')
{
    session_destroy();
    header("Location: index.php");
}
?>
