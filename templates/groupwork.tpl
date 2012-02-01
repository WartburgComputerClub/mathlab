{extends file="main.tpl"}
{block name=scripts}
<script type="text/javascript" src="mathjax/MathJax.js?config=default">
</script>
{/block}
{block name=main}
      <h1>Group Work Problems</h1>
      <hr />
      {foreach from=$problems item=problem}
      <h2>Question</h2>
      {$problem['question']}
      <br />
      <br />
      <h2>Answer</h2>
      {$problem['answer']}
      <hr />
      <div id="edit:{$problem['key']}"></div>
      <br />
      {/foreach}
      <br />
      <a href="user.php">[Back]</a> <a href="logout.php">[Logout]</a>
{/block}
