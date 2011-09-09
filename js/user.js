function doCommand(com,grid)
{
    if (com == "Add")
    {
	$('#formspace').html('<img src="images/spinner.gif"> &nbsp; Processing...').load('userform.php',function(){$('#firstname').focus();});
    }
    if (com == 'Edit')
    {
	$('.trSelected',grid).each(function(){
	    var studentId = $(this).attr('id');
	    studentId = studentId.substring(studentId.lastIndexOf('row')+3);
	    $('#formspace').html('<img src="images/spinner.gif"> &nbsp; Processing...').load('userform.php',{id: studentId});
	});
    }
    if (com == 'Delete')
    {
	$('.trSelected',grid).each(function(){
	    var studentId = $(this).attr('id');
	    studentId = studentId.substring(studentId.lastIndexOf('row')+3);
	    $('#formspace').html('<img src="images/spinner.gif"> &nbsp; Processing...').load('deletestudent.php',{id: studentId},function(){$('#flex').flexReload();});
	});
    }
}
function cancel()
{
    $('#formspace').empty();
}
function save()
{
    first = $('#firstname').val();
    last = $('#lastname').val();
    inter = $('#interest').val();
    take = $('#taken').val();
    fute = $('#future').val();
    $('#formspace').html('<img src="images/spinner.gif"> &nbsp; Processing...').load('addstudent.php',{firstname: first,lastname: last,interest: inter, taken: take,future: fute});
    $('#flex').flexReload();
}
function update()
{


}
$(document).ready(function(){
    $('#flex').flexigrid({
	url: "userdata.php",
	dataType: 'json',
	colModel: [
	    {display: "First Name", name: 'firstname',width: 100,sortable: true,algin: 'left'},
	    {display: "Last Name",name: 'lastname', width: 100,sortable: true, align: 'left'},
	    {display: "Interest Level",name: 'interest',width: 130,sortable: true,align: 'left'},
	    {display: 'Taken Before', name: 'taken',width: 100, sortable: true,align: 'left'},
	    {display: 'Future Plans', name: 'future', width: 100, sortable: true, align: 'left'}
	],
	buttons: [
	    {name: "Add", bclass: 'add',onpress: doCommand},
	    {name: "Edit",bclass: 'edit',onpress: doCommand},
	    {separator: true},
	    {name: "Delete",bclass: 'delete',onpress: doCommand}
	],
	searchitems: [
	    {display: 'First Name',name: 'firstname'},
	    {display: 'Last Name',name: 'lastname'},
	    {display: 'Future Plans', name: 'future'}
	],
	sortname: 'lastname',
	sortorder: 'desc',
	usepager: true,
	useRp: true,
	rp: 15,
	showTableToggleBtn: false,
	resizeable: true,
	width: 960,
	height: 390,
	singleSelect: true
    });



});
