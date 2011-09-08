function checkLogin()
{
    $('#response').html('<img src="images/spinner.gif"> &nbsp; Processing...').load('loginproc.php',{username: $('#user').val(),password: $('#pass').val()},function(data){
	if (data == 'admin')
	    window.location='admin.php';
    });
}
$(document).ready(function(){
    $('#user').focus();
    $('#submit').click(function(e){
	e.preventDefault();
	if (($('#user').val() != '') && ($('#pass').val() != ''))
	    checkLogin();
	else
	    $('#response').html("<font color='red'>No fields may be blank!</font>");
	    });
});
