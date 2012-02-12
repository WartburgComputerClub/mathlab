function modifyQuestion(id) 
{
    var questionID = '#question-' + id;
    $(questionID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':1,'question':1});
    
    var deleteButton = '#delete-' + id;
    $(deleteButton).attr("value","cancel");
    $(deleteButton).attr("onclick","");
    $(deleteButton).unbind('click').click(function(){
	cancelEdit(id,0);
    });
    var modifyButton = '#modifyQuestion-' + id;
    $(modifyButton).attr('value','save');
    $(modifyButton).attr('onclick','');
    $(modifyButton).unbind('click').click(function(){
	saveQuestion(id,0);
    });
    var modifyAnswerButton = '#modifyAnswer-' + id;
    $(modifyAnswerButton).hide();
}
function modifyAnswer(id) 
{
    var answerID = '#answer-' + id;
    $(answerID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':1,'question':0});
    var deleteButton = '#delete-' + id;
    $(deleteButton).attr("value","cancel");
    $(deleteButton).attr("onclick","");
    $(deleteButton).unbind('click').click(function(){
	cancelEdit(id,1);
    });
    var modifyButton = '#modifyAnswer-' + id;
    $(modifyButton).attr('value','save');
    $(modifyButton).attr('onclick','');
    $(modifyButton).unbind('click').click(function(){
	saveQuestion(id,1);
    });
    var modifyQuestionButton = '#modifyQuestion-' + id;
    $(modifyQuestionButton).hide();
}
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
function cancelEdit(id,type)
{
    if (type == 0) { // question
	var questionID = '#question-' + id;
	$(questionID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':0,'question':1},function() {
	MathJax.Hub.Queue(["Typeset",MathJax.Hub,questionID.substring(1)]);});
	var modifyButton = '#modifyQuestion-' + id;
	$(modifyButton).attr('value','modify question');
	$(modifyButton).unbind('click').click(function(){
	    modifyQuestion(id);
	});
	var modifyAnswerButton = '#modifyAnswer-' + id;
	$(modifyAnswerButton).show();
    } else { // answer
	var answerID = '#answer-' + id;
	$(answerID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':0,'question':0}, function() {
    	    MathJax.Hub.Queue(["Typeset",MathJax.Hub,answerID.substring(1)]);
	});
	var modifyButton = '#modifyAnswer-' + id;
	$(modifyButton).attr('value','modify answer');
	$(modifyButton).unbind('click').click(function(){
	    modifyAnswer(id);
	});
	var modifyQuestionButton = '#modifyQuestion-' + id;
	$(modifyQuestionButton).show();
    }
    var deleteButton = '#delete-' + id;
    $(deleteButton).attr('value','delete');
    $(deleteButton).unbind('click').click(function(){
	deleteQuestion(id);
    });
}
function saveQuestion(id,type)
{
    if (type == 0) { // question
	var question = $('#questiontext-' + id).val();
	var questionID = '#question-' + id;
	$(questionID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':0,'question':1,'value':question},function() {
	    MathJax.Hub.Queue(["Typeset",MathJax.Hub,questionID.substring(1)]);
	});
	var modifyButton = '#modifyQuestion-' + id;
	$(modifyButton).attr('value','modify question');
	$(modifyButton).unbind('click').click(function(){
	    modifyQuestion(id);
	});
	var modifyAnswerButton = '#modifyAnswer-' + id;
	$(modifyAnswerButton).show();
    } else { // answer
	var answer = $('#answertext-'+id).val();
	var answerID = '#answer-' + id;
	$(answerID).html('<img src="images/spinner.gif"> &nbsp; Processing...').load('ajax/getproblem.php',{'id':id,'edit':0,'question':0,'value':answer}, function() {
    	    MathJax.Hub.Queue(["Typeset",MathJax.Hub,answerID.substring(1)]);
	});
	var modifyButton = '#modifyAnswer-' + id;
	$(modifyButton).attr('value','modify answer');
	$(modifyButton).unbind('click').click(function(){
	    modifyAnswer(id);
	});
	var modifyQuestionButton = '#modifyQuestion-' + id;
	$(modifyQuestionButton).show();
    }
    var deleteButton = '#delete-' + id;
    $(deleteButton).attr('value','delete');
    $(deleteButton).unbind('click').click(function(){
	deleteQuestion(id);
    });
}
$(document).ready(function(){
});
