<?php
require_once('checkuser.php');
$date = '';
$date = $_GET['date'];
?>
<html>
  <head>	
    <link rel="stylesheet" href="css/style.css" />
    <title>Session</title>
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src="js/listsession.js"></script> 
  </head>
  <body>
    <div class="padded bodywrap">
      <h1>Session (<?php echo $date; ?>)</h1>
      <input type="hidden" id="date" value="<?php echo $date; ?>" />
      <div id="students"></div>
      <br />
      <a href="sessions.php">[Back]</a> <a href="logout.php">[Logout]</a>
    </div>
  </body>
</html>
