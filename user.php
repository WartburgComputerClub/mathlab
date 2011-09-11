<?php
require_once("checkuser.php");
?>
<html>
  <head>	
    <link rel="stylesheet" href="css/style.css" />
    <title>User Dashboard</title>
    <script type="text/javascript" src="js/jquery.js"></script> 
      <script type="text/javascript" src="js/flexigrid.pack.js"></script>
    <script type="text/javascript" src="js/user.js"></script> 
    
      <link rel="stylesheet" media="screen" href="flexstyle/flexigrid.pack.css" type="text/css" />      
      <style>
    .flexigrid div.fbutton .add {
background: url("flexstyle/images/add.png") no-repeat scroll left center transparent;
}
.flexigrid div.fbutton .delete {
    background: url("flexstyle/images/delete.png") no-repeat scroll left center transparent;
}
.flexigrid div.fbutton .edit {
    background: url("flexstyle/images/edit.png") no-repeat scroll left center transparent;
}
	div.ui-dialog{
 font-size:10px;
}
</style>
  </head>
  <body>
    <div class="padded bodywrap">
      <h1>User Dashboard</h1>
      <div id="flex" class="flexigrid"></div>
      <div id="formspace"></div>
      <a href="editclass.php">[Edit Class]</a> <a href="sessions.php">[Sessions]</a> <a href="logout.php">[Logout]</a>
    </div>
  </body>
</html>
