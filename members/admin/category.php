<?php
session_start();
$pagename='category';
?>

<link rel="stylesheet" type="text/css" href="grid/gt_grid.css" />
<script type="text/javascript" src="grid/gt_msg_en.js"></script>
<script type="text/javascript" src="grid/gt_grid_all.js"></script>
<script type="text/javascript" >


var dsConfig= {

	uniqueField : 'no' ,

	fields :[
		{name : 'category_name'},
		{name : 'parent_id'  },
		{name : 'action'  }
	]
};

var colsConfig = [
		{ id : 'category_name'    , header : "Category Name" , width : 350 ,editable:false  },
		{ id : 'parent_id'    , header : "Parent Category" , width : 350 ,editable:false  },
		{ id : 'action'    , header : "Action" , width : 200 ,editable:false, frozen:true  }
	];

var gridConfig={

	id : "grid1",
	
	loadURL : 'grid/export_php/testList.php?pagename=category',

	exportURL : 'grid/export_php/testList.php?export=true',
	
	exportFileName : 'test_export_doc',

	dataset : dsConfig ,

	columns : colsConfig ,

	container : 'grid1_container', 

	toolbarPosition : 'bottom',

	toolbarContent : 'nav | goto | pagesize' ,

	beforeSave : function(reqParam){
		//alert(Sigma.toJSONString(reqParam) ) ;
		//Sigma.$grid('grid1').reload(true);
		//return false;
	},
		showGridMenu : true,
		pageSize : 10 ,
		pageSizeList : [1,5,10,15,20],	
		remotePaging : false,
  		autoLoad : true
};

var categorygrid=new Sigma.Grid( gridConfig );

Sigma.Utils.onLoad( function(){

	categorygrid.render();
	categorygrid.reload();
} );


</script>

<?php
include 'header.php';
include 'dbc.php';
?>

<div style="min-height:500px">
<div align="center" style="font-size:26px; font-weight:bold; padding-top:30px">Category management</div>
<?php 
			$sql=mysql_query("select * from category");
			
			for($i=0; $i< mysql_num_rows($sql); $i++)
			{
			$data=mysql_fetch_array($sql);
			$name=$data['category_name'];
			$parent_id=$data['parent_id'];
			$category_id=$data['id'];
			}
			?></p>
            <div align="right" class="add_item"><a href="category_add.php" >Add Category</a></div>
			<div align="center">
					<div id="bigbox" style="margin:15px;display:!none;" align="center">
					  <div id="grid1_container" style="border:0px solid #cccccc;background-color:#f3f3f3;padding:5px;height:500px;width:900px;" ></div>
					</div>
		</div>
</div>



<?php
include 'footer.php';
?>