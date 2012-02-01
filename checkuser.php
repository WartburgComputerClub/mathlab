<?php
if (!isset($_SESSION))
    session_start();
if (!isset($_SESSION['user']))
{
    session_destroy();
    header("Location: index.php");
} 
?>
