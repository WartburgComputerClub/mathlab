function addSession()
{
    var last = new Date($('#last').val());
    var test = new Date($('#today').val());
    if (test > last)
	window.location="signin.php?date=" + $('#today').val();
    else
	$('#response').html("<font color='red'>A Session already exists for this date!</font>");
}
$(document).ready(function(){
    $('#sessions').html('<img src="images/spinner.gif"> &nbsp; Processing...').load('getsessions.php');
    
});
