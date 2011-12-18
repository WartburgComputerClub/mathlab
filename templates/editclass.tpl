{extends file="main.tpl"}
{block name=extrastyle}
    <link type="text/css" rel="stylesheet" href="css/dark-hive/jquery-ui-1.8.16.custom.css" />
    <style>
      div.ui-datepicker{
      font-size:10px;
      }

    </style>
{/block}
{block name=scripts}
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
	$('.datepicker').datepicker({
	    //changeMonth: true,
	    //changeYear: true,
	    dateFormat: 'yy-mm-dd'
	});
    });
    </script>
{/block}
{block name=main}
      <h1>Class Editor</h1>
      <div class="content">
	<form name="editclassform" method="post">
	<table border="0" align="center">
	  <tr>
	    <td>Professor: </td>
	    <td><input type="text" value='{$prof}' name="prof" /></td>
	  </tr>
	  <tr>
	    <td>Department: </td>
	    <td><input type="text" name="department" value='{$department}' /></td>
	  </tr>
	  <tr>
	    <td>Class Code: </td>
	    <td><input type="text" name="code" value='{$code}' /></td>
	  </tr>
	  <tr>
	    <td>Section: </td>
	    <td><input type="text" name="section" value='{$section}' /></td>
	  </tr>
	  <tr>
	    <td>First Exam: </td>
	    <td><input type="text" class="datepicker" name="exam" value='{$exam}' /></td>
	  </tr>
	  <tr>
	    <td>Midterm: </td>
	    <td><input type="text" class="datepicker" name="halftime" value='{$halftime}' /></td>
	  <tr><td><input type="submit" value="submit" /></td><td></td></tr>
	</table>

	</form>
      </div>
      <a href="user.php">[Back]</a> <a href="logout.php">[Logout]</a>
{/block}
