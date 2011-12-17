{extends file="main.tpl"}
{block name=scripts}
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src="js/listsession.js"></script> 
{/block}
{block name=main}
      <h1>Session ({$date})</h1>
      <input type="hidden" id="date" value="{$date}" />
      <div id="students"></div>
      <br />
      <a href="sessions.php">[Back]</a> <a href="logout.php">[Logout]</a>
{/block}
