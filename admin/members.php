<?php
session_start();
$pagename='members';
?>

<link rel="stylesheet" type="text/css" href="grid/gt_grid.css" />
<script type="text/javascript" src="grid/gt_msg_en.js"></script>
<script type="text/javascript" src="grid/gt_grid_all.js"></script>

<script type="text/javascript" >


var dsConfig= {

	uniqueField : 'no' ,

	fields :[
		{name : 'user_name'  },
		{name : 'full_name'},
		{name : 'store_name'  },
		{name : 'address'  },
		{name : 'location'  },
		{name : 'zip_code'  },
		{name : 'email'  },
		{name : 'phone'  },
		{name : 'country'  },
		{name : 'created_date'  },
		{name : 'updated_date'  },
		{name : 'package'  },
		{name : 'theme'  },
		{name : 'status'  }
	]
};

var colsConfig = [
		{ id : 'user_name'  , header : "User Name" , width : 200 , editable:false },
		{ id : 'full_name'    , header : "Full Name" , width : 150 ,editable:false  },
		{ id : 'store_name'    , header : "Store Name" , width : 150 ,editable:false  },
		{ id : 'address'    , header : "Address" , width : 150 ,editable:false  },
		{ id : 'location'    , header : "Loation" , width : 125 ,editable:false  },
		{ id : 'zip_code'    , header : "Zip Code" , width : 125 ,editable:false  },
		{ id : 'email'    , header : "Email" , width : 125 ,editable:false  },
		{ id : 'phone'    , header : "Phone Number" , width : 125 ,editable:false },
		{ id : 'country'    , header : "Country" , width : 125 ,editable:false  },
		{ id : 'created_date'    , header : "Created Date" , width : 125 ,editable:false },
		{ id : 'updated_date'    , header : "Updated Date" , width : 125 ,editable:false  },
		{ id : 'package'    , header : "Package" , width : 125 ,editable:false },
		{ id : 'theme'    , header : "Theme" , width : 125 ,editable:false },
		{ id : 'status'    , header : "Status" , width : 125 ,editable:false },
		{ id : 'action' , header : "Action" , width : 180 , align:"center", editable:false, frozen:true}

];

var gridConfig={

	id : "grid1",
	
	loadURL : 'grid/export_php/testList.php?pagename=members',

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

var membergrid=new Sigma.Grid( gridConfig );

Sigma.Utils.onLoad( function(){

	membergrid.render();
	membergrid.reload();
} );

</script>

<?php
include 'header.php';
include 'dbc.php';
?>

	<div style="min-height:500px">
	<div align="center" style="font-size:26px; font-weight:bold; padding-top:30px">Member management</div>
	<?php 
				$sql=mysql_query("select * from member order by id");
				
				for($i=0; $i< mysql_num_rows($sql); $i++)
				{
				$data=mysql_fetch_array($sql);
				}
				?></p>
				<div align="center">
						<div id="bigbox" style="margin:15px;display:!none;" align="center">
						  <div id="grid1_container" style="border:0px solid #cccccc;background-color:#f3f3f3;padding:5px;height:500px;width:900px;" ></div>
						</div>
			</div>
	</div>
	

<?php
include 'footer.php';
?>
