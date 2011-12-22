{extends file="main.tpl"}
{block name=main}
      <h1>Users</h1>
      {foreach from=$users item=user}
      <a href="useradmin.php?user={$user}">
      {$names[$user]|escape}
      </a>
      <br />
      {/foreach}
      <br />
      <a href="useradmin.php">[Add User]</a> <a href="logout.php">[Logout]</a>
{/block}
