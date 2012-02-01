function deleteQuestion(id)
{
    alert(id);
}

function modifyQuestion(id)
{
    var questionID = '#question-' + id;
    $(questionID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':1,'question':1});
    var answerID = '#answer-' + id;
    $(answerID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':1,'question':0});



}
$(document).ready(function(){
    $('#question-1').html("HERE");
});
