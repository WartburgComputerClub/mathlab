function addQuestion()
{
    $.ajax({
	url: 'ajax/addproblem.php',
	success: function(html){
	    $('#questions').append(html);
	}
    });
}
function deleteQuestion(id)
{
    $('#problem-' + id).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/deleteproblem.php',{'id':id},function(){
	$('#problem-' + id).remove();
    });
}
function cancelEdit(id)
{
    var questionID = '#question-' + id;
    $(questionID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':0,'question':1},function() {
	MathJax.Hub.Queue(["Typeset",MathJax.Hub,questionID.substring(1)]);});
    var answerID = '#answer-' + id;
    $(answerID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':0,'question':0}, function() {
    	MathJax.Hub.Queue(["Typeset",MathJax.Hub,answerID.substring(1)]);});
    var deleteButton = '#delete-' + id;
    $(deleteButton).attr('value','delete');
    $(deleteButton).unbind('click').click(function(){
	deleteQuestion(id);
    });
    var modifyButton = '#modify-' + id;
    $(modifyButton).attr('value','modify');
    $(modifyButton).unbind('click').click(function(){
	modifyQuestion(id);
    });
}
function modifyQuestion(id)
{
    var questionID = '#question-' + id;
    $(questionID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':1,'question':1});
    var answerID = '#answer-' + id;
    $(answerID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':1,'question':0});
    var deleteButton = '#delete-' + id;
    $(deleteButton).attr("value","cancel");
    $(deleteButton).attr("onclick","");
    $(deleteButton).unbind('click').click(function(){
	cancelEdit(id);
    });
    var modifyButton = '#modify-' + id;
    $(modifyButton).attr('value','save');
    $(modifyButton).attr('onclick','');
    $(modifyButton).unbind('click').click(function(){
	saveQuestion(id);
    });
}
function saveQuestion(id)
{
    var question = $('#questiontext-' + id).val();
    var answer = $('#answertext-'+id).val();
    
    var questionID = '#question-' + id;
    $(questionID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':0,'question':1,'value':question},function() {
	MathJax.Hub.Queue(["Typeset",MathJax.Hub,questionID.substring(1)]);});
    var answerID = '#answer-' + id;
    $(answerID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':0,'question':0,'value':answer}, function() {
    	MathJax.Hub.Queue(["Typeset",MathJax.Hub,answerID.substring(1)]);});
    var deleteButton = '#delete-' + id;
    $(deleteButton).attr('value','delete');
    $(deleteButton).unbind('click').click(function(){
	deleteQuestion(id);
    });
    var modifyButton = '#modify-' + id;
    $(modifyButton).attr('value','modify');
    $(modifyButton).unbind('click').click(function(){
	modifyQuestion(id);
    });
}
$(document).ready(function(){
});
