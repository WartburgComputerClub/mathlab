<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] != 'signin')
{
    session_destroy();
    header("Location: index.php");
} 
?>
