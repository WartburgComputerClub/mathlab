<?php
session_start();
include('checklogin.php');
?>
<html>
  <head>	
    <link rel="stylesheet" href="css/style.css" />
    <title>Admin Page</title>
  </head>
  <body>
    <div class="padded bodywrap">
      <h1>Admin Page</h1>
      
      <a href="adduser.php">[Add User]</a> <a href="logout.php">[Logout]</a>
    </div>
  </body>
</html>
