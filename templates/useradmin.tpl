{extends file="main.tpl"}
{block name=scripts}
    <script type="text/javascript" src="js/jquery.js"></script>
    {if isset($user)}
    <script type="text/javascript" src="js/edituser.js"></script>
    {else}
    <script type="text/javascript" src="js/adduser.js"></script>
    {/if}
{/block}
{block name=main}
      <h1>{$title}</h1>
      <form id="user_form">
      Username <br />
      {if isset($name)}
      <input type="text" id="user" value="{$name}" /> 
      <input type="hidden" id="id" value="{$user}" />
      {else}
      <input type="text" id="user" />
      {/if}
      <br />
      Password <br />
      <input type="password" id="pass" />
      <br />
      <input type="submit" value="Submit" id="submit" />
      </form>
      <br /><br />
      <div id="response"></div>
      <br />
      <a href="admin.php">[Back]</a> <a href="logout.php">[Logout]</a>
{/block}
