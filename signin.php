<?php
require_once('checksignin.php');
$date = '';
$date = $_GET['date'];
?>
<html>
  <head>	
    <link rel="stylesheet" href="css/style.css" />
    <title>Signin Page</title>
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src="js/signin.js"></script> 
  </head>
  <body>
    <div class="padded bodywrap">
      <h1>Sign-in Page (<?php echo $date; ?>)</h1>
	<form id="signin" name="signin" method="post">
	  First Name <br />
	  <input type="text" id="firstname" />
	  <br />
	  Last Name <br />
	  <input type="text" id="lastname" />
	  <br />
	  <input type="submit" value="login" id="submit" value="Submit" />
	</form>
      <div id="response"></div>
      <br />
      <a href="signinhome.php">[Home]</a> <a href="logout.php">[Logout]</a>
    </div>
  </body>
</html>
