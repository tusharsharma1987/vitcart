<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" -->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<title>Export To PDF - Sigma Ajax data grid control sample</title>
<meta http-equiv="Content-Language" content="en-us" /> 
<meta name="keywords" content="dhtml grid, AJAX grid, Export to pdf " >
<meta name="description" content="How to export data to pdf" >

<link rel="stylesheet" type="text/css" href="grid/gt_grid.css" />
<script type="text/javascript" src="grid/gt_msg_en.js"></script>
<script type="text/javascript" src="grid/gt_grid_all.js"></script>


<script type="text/javascript" >


var dsConfig= {

	uniqueField : 'no' ,

	fields :[
		{name : 'title'  },
		{name : 'content'},
		{name : 'writer'}
	]
};

var colsConfig = [
		{ id : 'title'      , header : "title" , width : 250 , height : 50 , 	editable:false },
		{ id : 'content'    , header : "content" , width : 500 , height : 50 ,  editable:false  },
		{ id : 'writer'     , header : "writer" , width : 150 , height : 50 , 	editable:false}
];

var gridConfig={

	id : "grid1",
	
	loadURL : 'grid/export_php/testList.php',

	exportURL : 'grid/export_php/testList.php?export=true',
	
	exportFileName : 'test_export_doc',

	dataset : dsConfig ,

	columns : colsConfig ,

	container : 'grid1_container', 

	toolbarPosition : 'bottom',

	toolbarContent : 'pdf' ,

	beforeSave : function(reqParam){
		//alert(Sigma.toJSONString(reqParam) ) ;
		//Sigma.$grid('grid1').reload(true);
		//return false;
	},
	showGridMenu : true,
  allowCustomSkin : true,
  allowFreeze : true,
  allowGroup : true,
  allowHide : true,
  
	pageSize : 10 ,
	pageSizeList : [5,10,15,20],	
  customHead : 'myHead1',
  remotePaging : false,
  autoLoad : false

};

var mygrid=new Sigma.Grid( gridConfig );

Sigma.Utils.onLoad( function(){

	mygrid.render();
	mygrid.reload();
} );


</script>
</head>
<body>

<div id="page-container">
  

   
  

  <div id="content">
    
	  <h2>Export To PDF</h2>
      <p>
    <div id="bigbox" style="margin:15px;display:!none;" align="center">
      <div id="grid1_container" style="border:0px solid #cccccc;background-color:#f3f3f3;padding:5px;height:500px;width:900px;" ></div>
    </div>
    <table id="myHead1" style="display:none">
<tr>
	<td colspan="8" resizable='false'>Poem Manage</td>
</tr>
<tr>
	<td columnId='title'>title</td>
	<td columnId='content'>content</td>
	<td columnId='writer'>writer</td>
</tr>
</table>
  </div>
  
  

</div>
</body>
</html>