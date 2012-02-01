{extends file="main.tpl"}
{block name=scripts}
<script type="text/javascript" src="mathjax/MathJax.js?config=default">
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/groupwork.js"></script>
{/block}
{block name=main}
      <h1>Group Work Problems</h1>
      <hr />
      {foreach from=$problems item=problem}
      <h2>Question</h2>
      <div id="question-{$problem['key']}">
      {$problem['question']}
      </div>
      <br />
      <br />
      <h2>Answer</h2>
      <div id="answer-{$problem['key']}">
      {$problem['answer']}
      </div>
      <div id="edit-{$problem['key']}"></div>
      <input type="button" value="delete" onclick="deleteQuestion({$problem['key']})" />
      <input type="button" value="modify" onclick="modifyQuestion({$problem['key']})" />
      <hr />
      <br />
      {/foreach}
      <br />
      <a href="user.php">[Back]</a> <a href="logout.php">[Logout]</a>
{/block}
