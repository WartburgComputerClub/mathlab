{extends file="main.tpl"}
{block name=scripts}
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src="js/signin.js"></script> 
{/block}
{block name=main}
      <h1>Sign-in Page ({$date})</h1>
	<form id="signin" name="signin" method="post">
	  <input type="hidden" id="today" value="{$date}" />
	  First Name <br />
	  <input type="text" id="firstname" />
	  <br />
	  Last Name <br />
	  <input type="text" id="lastname" />
	  <br />
	  <input type="submit" value="Signin" id="submit" value="Submit" />
	</form>
      <div id="response"></div>
      <br />
      <a href="signinhome.php">[Home]</a> <a href="logout.php">[Logout]</a>
{/block}
