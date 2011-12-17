{extends file="main.tpl"}
{block name=extrastyle}
      <link rel="stylesheet" media="screen" href="flexstyle/flexigrid.pack.css" type="text/css" />      
      <style>
    .flexigrid div.fbutton .add {
background: url("flexstyle/images/add.png") no-repeat scroll left center transparent;
}
.flexigrid div.fbutton .delete {
    background: url("flexstyle/images/delete.png") no-repeat scroll left center transparent;
}
.flexigrid div.fbutton .edit {
    background: url("flexstyle/images/edit.png") no-repeat scroll left center transparent;
}
	div.ui-dialog{
 font-size:10px;
}
</style>
{/block}
{block name=scripts}
    <script type="text/javascript" src="js/jquery.js"></script> 
      <script type="text/javascript" src="js/flexigrid.pack.js"></script>
    <script type="text/javascript" src="js/user.js"></script> 
{/block}
{block name=main}
      <h1>User Dashboard</h1>
      <div id="flex" class="flexigrid"></div>
      <div id="formspace"></div>
      <form id="form" action="genexcel.php" method="POST">
	<input type="submit" id="hiddenSubmit" style="display: none;" />
      </form>
      <a href="editclass.php">[Edit Class]</a> <a href="sessions.php">[Sessions]</a> <a href="#" id="excel">[Gen Excel]</a> <a href="logout.php">[Logout]</a>
{/block}
