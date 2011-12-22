function editUser()
{
    $('#response').html('<img src="images/spinner.gif"> &nbsp; Processing...').load('edituserproc.php',{username: $('#user').val(),password: $('#pass').val(),id: $('#id').val()},function(data){
	if (data.indexOf("green") > -1)
	{
	    $('#pass').val('');
	    $('#user').focus();
	}

    });
}
$(document).ready(function(){
    $('#pass').focus();
    $('#submit').click(function(e){
	e.preventDefault();
	if (($('#user').val() != '') && ($('#pass').val() != ''))
	    editUser();
	else
	    $('#response').html("<font color='red'>No fields may be blank!</font>");
    });

});
