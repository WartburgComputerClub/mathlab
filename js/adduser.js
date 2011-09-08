function addUser()
{
    $('#response').html('<img src="images/spinner.gif"> &nbsp; Processing...').load('adduserproc.php',{username: $('#user').val(),password: $('#pass').val()});
}
$(document).ready(function(){
    $('#user').focus();
    $('#submit').click(function(e){
	e.preventDefault();
	if (($('#user').val() != '') && ($('#pass').val() != ''))
	    addUser();
	else
	    $('#response').html("<font color='red'>No fields may be blank!</font>");
    });

});
