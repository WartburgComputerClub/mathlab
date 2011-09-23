<?php
require_once('checksignin.php');
$date = date('Y-m-d');
?>
<html>
  <head>	
    <link rel="stylesheet" href="css/style.css" />
    <link type="text/css" rel="stylesheet" href="css/dark-hive/jquery-ui-1.8.16.custom.css" />
    <style>
      div.ui-datepicker{
      font-size:10px;
      }

    </style>
    <title>Signin Homepage</title>
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/signinhome.js"></script> 
  </head>
  <body>
    <div class="padded bodywrap">

	<h1>Choose a Session</h1>
	<div id="sessions"></div>
	<div id="response"></div>
	<input type="text" value="<?php echo $date; ?>" id="today" />
	<input type="button" value="Add Session" onclick="addSession()" />
	<br />
	<br />
	<a href="logout.php">[Logout]</a>
    </div>
  </body>
</html>
