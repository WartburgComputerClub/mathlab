$(document).ready(function(){
    $('#firstname').focus();
    $('#submit').click(function(e){
	e.preventDefault();
	if ($('#firstname').val() != '' && $('#lastname').val() != '')
	{
	    $('#response').html('<img src="images/spinner.gif"> &nbsp; Processing...').load('signinproc.php',{firstname: $('#firstname').val(),lastname: $('#lastname').val(),date: $('#today').val()},function(response){
		if (response.indexOf('green') > 0)
		{
		    $('#firstname').empty();
		    $('#lastname').empty();
		    $('#firstname').focus();
		}
	    });	    
	}
	else
	    $('#response').html("<font color='red'>Fill in both your firstname and lastname!</font>");
    });
});
