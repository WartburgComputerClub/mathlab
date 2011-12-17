{extends file="main.tpl"}
{block name=main}
<h1>SI Sessions</h1>
{foreach from=$sessions item=sess}
<a href='listsession.php?date={$sess}'>
{$sess}
</a>
<br />
{/foreach}
<br />
<a href="user.php">[back]</a> <a href="logout.php">[logout]</a>
{/block}
