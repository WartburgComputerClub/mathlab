{extends file="main.tpl"}
{block name=scripts}
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/adduser.js"></script>
{/block}
{block name=main}
      <h1>Add User</h1>
      Username <br />
      <input type="text" id="user" /> 
      <br />
      Password <br />
      <input type="password" id="pass" />
      <br />
      <input type="submit" value="Add" id="submit" />
      <br /><br />
      <div id="response"></div>
      <br />
      <a href="admin.php">[Back]</a> <a href="logout.php">[Logout]</a>
{/block}
