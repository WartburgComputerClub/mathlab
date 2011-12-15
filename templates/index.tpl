{extends file="main.tpl"}
{block name=scripts}
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src="js/login.js"></script> 
{/block}
{block name=main}
      <h1>Advanced Math Lab Login</h1>
	<form id="login" name="login" method="post">
          Username <br />
          <input name="username" type="text" id="user" />
	  <br />
	  Password
	  <br />	  
	  <input name="password" type="password" id="pass" />
	  <br />
	  <input type="submit" value="login" id="submit" value="Submit" />
	</form>
      <div id="response"></div>
      <img src="images/loader-bar.gif" id="loading">
{/block}
