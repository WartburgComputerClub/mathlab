function refreshSessions()
{
    $('#students').html('<img src="images/spinner.gif"> &nbsp; Processing...').load('getstudents.php',{date: $('#date').val()});

}
function deleteStudent(id)
{
    $.ajax({
	type: 'post',
	url: 'deletefromsession.php',
	data: 'id=' + id + '&date=' + $('#date').val(),
	success: function(){
	    refreshSessions();
	}
    });
}
$(document).ready(function(){
    refreshSessions();
});
