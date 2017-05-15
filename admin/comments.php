<?php
session_start();
$pagename='comments';
include 'header.php';

if(isset($_GET['del']) && $_GET['del'] != "")
	{
	$id=$_GET['del'];
	$delete_program=mysql_query("delete from suggestions where id= '".$id."'");
//''''''''''''	header("location:message.php?msg=8");
			?>
			<script language="javascript">
				window.location.href="message.php?msg=12";
			</script>
			<?php

	}
?>
<script language="javascript">
	function delete_comment(id)
		{
			if(confirm("Do you want to delete this Comment"))
				{
					window.location="comments.php?del="+id;
				}
			else
				{
					return false;
				}
		}

</script>
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<link rel="stylesheet" type="text/css" href="grid/gt_grid_orginal.css" />
<script type="text/javascript" src="grid/gt_msg_en.js"></script>
<script type="text/javascript" src="grid/gt_grid_all.js"></script>


<script type="text/javascript" >


var dsConfig= {

	uniqueField : 'no' ,

	fields :[
		{name : 'fullname'  },
		{name : 'email'  },
		{name : 'phone'  },
		{name : 'comment'  },
		{name : 'comment_date'},
	]
};

var colsConfig = [
		{ id : 'fullname'  , header : "fullname" , width : 200 , editable:false },
		{ id : 'email'  , header : "email" , width : 150 , editable:false },
		{ id : 'phone'  , header : "phone" , width : 100 , editable:false },
		{ id : 'comment'  , header : "comment" , width : 250 , editable:false },
		{ id : 'comment_date'    , header : "comment_date" , width : 100 ,editable:true  },
		{ id : 'action' , header : "action" , width : 100 , align:"center", editable:false}

];

var gridConfig={

	id : "grid1",
	
	loadURL : 'grid/export_php/testList.php?pagename=comment',

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
  customHead : 'myHead1',
  remotePaging : false,
  autoLoad : true
};

var mygrid=new Sigma.Grid( gridConfig );

Sigma.Utils.onLoad( function(){

	mygrid.render();
	mygrid.reload();
} );


</script>


<div style="min-height:500px">
	<div style="text-align:center; padding-top:20px; font-size:14px; font-weight:bold">&nbsp;</div>
	
	
		<?php
			include 'dbc.php';
			$sql_content=mysql_query("select * from suggestions order by suggestion_date desc") or die (mysql_error());
			$record=mysql_num_rows($sql_content);
			if($record <= 0 )
			{
			?>
			<div style="margin-top:20px; text-align:center">No Comments Received Yet. </div>
			<?php
			}else {
			?>
					<div id="bigbox" style="margin:15px;display:!none;" align="center">
					  <div id="grid1_container" style="border:0px solid #cccccc;background-color:#f3f3f3;padding:5px;height:500px;width:900px;" ></div>
					</div>
					<table id="myHead1" style="display:none">
				<tr>
					<td colspan="8" resizable='false' align="center" style="font-size:18px; padding:10px; "><< Fan's Comment Management >></td>
				</tr>
				<tr>
					<td columnId='fullname'>Fullname</td>
					<td columnId='email'>Email-id</td>
					<td columnId='phone'>Contact No.</td>
					<td columnId='comment'>Comments</td>
					<td columnId='comment_date'>Comment Date</td>
					<td columnId='action'>Action</td>
				</tr>
				</table>
				
			<?php
			}
			?>
</div>
<?php
include 'footer.php';
?>
