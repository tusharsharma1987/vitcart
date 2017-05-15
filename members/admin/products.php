<?php
session_start();
$pagename='products';
?>
<link rel="stylesheet" type="text/css" href="grid/gt_grid.css" />
<script type="text/javascript" src="grid/gt_msg_en.js"></script>
<script type="text/javascript" src="grid/gt_grid_all.js"></script>
<script type="text/javascript" >


var dsConfig= {

	uniqueField : 'no' ,

	fields :[
		{name : 'name'  },
		{name : 'photo'},
		{name : 'actual_price'  },
		{name : 'price'  },
		{name : 'brand'  },
		{name : 'category'  },
		{name : 'sub_category'  }
	]
};

var colsConfig = [
		{ id : 'name'  , header : "Product Name" , width : 200 , editable:false },
		{ id : 'photo'    , header : "Product Image" , width : 150 ,editable:true  },
		{ id : 'actual_price'    , header : "MRP" , width : 150 ,editable:true  },
		{ id : 'price'    , header : "Store Price" , width : 150 ,editable:true  },
		{ id : 'brand'    , header : "Brand" , width : 125 ,editable:true  },
		{ id : 'category'    , header : "Category" , width : 125 ,editable:true  },
		{ id : 'sub_category'    , header : "Sub-Category" , width : 125 ,editable:true  },
		{ id : 'action' , header : "Action" , width : 150 , align:"center", editable:false, frozen:true}

];

var gridConfig={

	id : "grid1",
	
	loadURL : 'grid/export_php/testList.php?pagename=product',

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

var mygrid=new Sigma.Grid( gridConfig );

Sigma.Utils.onLoad( function(){

	mygrid.render();
	mygrid.reload();
} );


</script>

<?php
include 'header.php';
include 'dbc.php';
?>

<div style="min-height:500px">
<div align="center" style="font-size:26px; font-weight:bold; padding-top:30px">Product management</div>
<?php 
			$sql=mysql_query("select * from products order by id");
			//echo mysql_num_rows($sql);
			?></p>
            <div align="right" class="add_item"><a href="products_add.php" >Add Products</a></div>
			<div align="center">
					<div id="bigbox" style="margin:15px;display:!none;" align="center">
					  <div id="grid1_container" style="border:0px solid #cccccc;background-color:#f3f3f3;padding:5px;height:500px;width:900px;" ></div>
					</div>
		</div>
</div>

<?php
include 'footer.php';
?>