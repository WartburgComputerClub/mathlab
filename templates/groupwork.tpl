{extends file="main.tpl"}
{block name=scripts}
<script type="text/javascript" src="mathjax/MathJax.js?config=default">
</script>
{/block}
{block name=main}
      <h1>Group Work Problems</h1>
      {foreach from=$problems item=problem}
      {$problem['question']}
      <br />
      {$problem['answer']}
      <hr />
      <br />
      {/foreach}
      <br />
      <a href="user.php">[Back]</a> <a href="logout.php">[Logout]</a>
{/block}
