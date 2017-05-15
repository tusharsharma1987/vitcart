<?php
session_start();
$pagename='gallery';
include 'header.php';
if(isset($_GET['del']) && $_GET['del'] != "")
	{
	$id=$_GET['del'];
	$delete_program=mysql_query("delete from image_gallery where id= '".$id."'");
			?>
			<script language="javascript">
				window.location.href="message.php?msg=16";
			</script>
			<?php

	}

if(isset($_GET['app']) && $_GET['app'] != "")
	{
	$id=$_GET['app'];
	$delete_program=mysql_query("update image_gallery set status='0' where id= '".$id."'");
			?>
			<script language="javascript">
				window.location.href="message.php?msg=19";
			</script>
			<?php

	}


	if(isset($_FILES['file']['name'] ) )
	{$_SESSION['current']="insert";
		if($_FILES['file']['name'] != "" )
		{
		//echo "right success";
		//echo $_FILES['file']['type'] ;
		$type=explode("/",$_FILES['file']['type']);
		
			if($type[0]=="image")
			{
			
			//echo "Success in explode";
			include('SimpleImage.php');
  		    $image = new SimpleImage();
			$image_load=$_FILES['file']['name'];
			$image->load($_FILES['file']['tmp_name']);
			$name=explode('.',$image_load);
			$photo=date('s').md5($name[0]).".".$name[1];
			
		    $image->save('../photo/original_'.$photo);
			
			$image->resize(100,100);
		    $image->save('../photo/100x100_'.$photo);
			$name = $_POST['name'];
			$sql=mysql_query("insert into image_gallery (name,text) values ('$photo','$name')") or die (mysql_error());
			
			//echo "Image Successfully Inserted. Go to MANAGE IMAGE GALLERY tab to manage it.";
			?>
				<script language="javascript">
                    window.location.href="message.php?msg=17";
                </script>

			<?php
			
			}
			else
			{
			//echo "Please enter only Images";
			?>
			<div id="dialog-message" title="Image Insert Error">
			<div style="text-align:center; color:red; margin-top:10px; font-weight:bold">
			Please Insert only Images.
            </div>
			</div>
			<?php
			}
		}
		else
		{
		//echo "Erro: Please Select some photo for Image Galary";
			?>
			<div id="dialog-message" title="Image Insert Error">
			<div style="text-align:center; color:red; font-weight:bold">
			Please Insert Some Image.
			</div>
			</div>
			<?php
		}
	}

?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.1.css" media="screen" />

<link rel="stylesheet" type="text/css" href="grid/gt_grid.css" />
<script type="text/javascript" src="grid/gt_msg_en.js"></script>
<script type="text/javascript" src="grid/gt_grid_all.js"></script>


<script type="text/javascript" >

var dsConfig2= {

	uniqueField : 'no' ,

	fields :[
		{name : 'image'  },
		{name : 'text'},
		{name : 'status'},
		{name : 'user'},
	]
};

var colsConfig2 = [
		{ id : 'image'  , header : "image" , width : 110 , editable:false },
		{ id : 'text'  , header : "text" , width : 220 , editable:false },
		{ id : 'status'    , header : "status" , width : 100 ,editable:false  },
		{ id : 'user'    , header : "user" , width : 100 ,editable:false  },
		{ id : 'action' , header : "action" , width : 180 , align:"left", editable:false}

];

var gridConfig2={

	id : "grid2",
	
	loadURL : 'grid/export_php/testList.php?pagename=image',

	exportURL : 'grid/export_php/testList.php?export=true',
	
	exportFileName : 'test_export_doc',

	dataset : dsConfig2 ,

	columns : colsConfig2 ,

	container : 'grid1_container2', 

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
  customHead : 'myHead3',
  remotePaging : false,
  autoLoad : true
};

var mygrid2=new Sigma.Grid( gridConfig2 );

Sigma.Utils.onLoad( function(){

	mygrid2.render();
	mygrid2.reload();
} );

</script>
<script language="javascript">
	function viewsug(id)
		{
		
		$(document).ready(function() {
			$.fancybox({
			    'width'				: '75%',
				'height'			: '80%',
		        'autoScale'     	: false,
		        'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe',
				'href'				: 'read.php?id='+id
			});
		});
		setTimeout('mygrid2.reload()',2000);	
		}
</script>


<div style="min-height:500px">
	<div style="text-align:center; padding-top:50px; font-size:24px; font-weight:bold"></div>
	<div style="width:600px; padding-left:400px">
	<div align="center" style="color:#FF0000; font-weight:bold"><?php if(isset($err) && $err != "") {echo $err;}; ?></div>
	</div>
		<?php
			include 'dbc.php';
			?>
            	<div align="center" style="font-size:16px; font-weight:bold">
                Image Gallery 
                </div>
                <div style=" height:300px;">
                	<div id="bigbox" style="margin:15px;display:!none; float:left; border:2px double #CCC" >
					  <div style="border:0px solid #cccccc; padding:5px;height:250px;width:400px; margin-left:20px" >
                      	     <form action="" method="post" enctype="multipart/form-data" name="image"  >
                                <table  border="0" align="center" style=""  >
                                  <tr>
                                  	<td colspan="2" align="center"> <span style="font-size:14px">Please Insert Images</span></td>
                                  </tr>
                                  <tr >
                                    <td height="50"><div align="right"><strong>Insert Images </strong></div></td>
                                    <td><input type="file" name="file" /></td>
                                  </tr>
                                  <tr>
                                    <td height="38"><div align="right"><strong>Name of Images </strong></div></td>
                                    <td><input type="text" name="name" /></td>
                                  </tr>
                                  <tr>
                                    <td height="44">&nbsp;</td>
                                    <td><input type="submit" name="Submit" value="Submit" /></td>
                                  </tr>
                                </table>
                          </form>

                      </div>
					</div>
                    
					<div id="bigbox" style="margin:15px;display:!none; float:left; border:0px double #CCC;" >
					  <div id="grid1_container2" style="border:0px solid #cccccc;background-color:#f3f3f3;padding:5px;height:260px;width:700px;" ></div>
					</div>
                </div>
					<table id="myHead3" style="display:none">
				<tr>
					<td columnId='image'>image</td>
                    <td columnId='text'>text</td>
                    <td columnId='status'>status</td>
					<td columnId='user'>user</td>
					<td columnId='action'>action</td>
				</tr>
				</table>
				
</div>

<?php
include 'footer.php';
?>
<script language="javascript">
	function approve(id)
		{
			window.location.href="gallery.php?app="+id;
		}
	function delnews(id)
		{
			if(confirm ("Do you really want to delete this Image"))
				{
					window.location.href="gallery.php?del="+id;
				}
			else
				{
					
				}
		}
</script>