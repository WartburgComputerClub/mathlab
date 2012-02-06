{extends file="main.tpl"}
{block name=scripts}
<script type="text/javascript" src="mathjax/MathJax.js?config=default">
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/groupwork.js"></script>
{/block}
{block name=body}
<div class="padded leftwrap">       
      <h1>Group Work Problems (Page {$page})</h1>
      <hr />
      <div id="questions">
      {foreach from=$problems item=problem}
      <div id="problem-{$problem['key']}">
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
      <input type="button" id="delete-{$problem['key']}" value="delete" onclick="deleteQuestion({$problem['key']})" />
      <input type="button" id="modify-{$problem['key']}" value="modify" onclick="modifyQuestion({$problem['key']})" />
      <hr />
      <br />
      </div>
      {/foreach}
      </div>
      <input type="button" id="add" value="add question" onclick="addQuestion()" />
      <br />
      <br />
      <a href="{$prev}">[Prev]</a> <a href="user.php">[Back]</a> <a href="logout.php">[Logout]</a> <a href="{$next}">[Next]</a> 
</div>
{/block}
