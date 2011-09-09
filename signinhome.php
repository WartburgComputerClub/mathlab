<?php
require_once('checksignin.php');
?>
<html>
  <head>	
    <link rel="stylesheet" href="css/style.css" />
    <title>Signin Homepage</title>
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src="js/signinhome.js"></script> 
  </head>
  <body>
    <div class="padded bodywrap">
      <div class="content">
	<h1>Choose a Session</h1>
	<div id="sessions"></div>
	<input type="button" value="Add Session" onclick="addsession()" />
      </div>
    </div>
  </body>
</html>
