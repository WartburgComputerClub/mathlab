function doCommand(com,grid)
{

    return 0;
}
$(document).ready(function(){
    $('#flex').flexigrid({
	url: "userdata.php",
	dataType: 'json',
	colModel: [
	    {display: "First Name", name: 'firstname',width: 100,sortable: true,algin: 'left'},
	    {display: "Last Name",name: 'lastname', width: 100,sortable: true, align: 'left'}
	],
	buttons: [
	    {name: "Add", bclass: 'add',onpress: doCommand},
	    {name: "Delete",bclass: 'delete',onpress: doCommand}
	],
	searchitems: [
	    {display: 'First Name',name: 'firstname'},
	    {display: 'Last Name',name: 'lastname'}
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
