<?php
session_start();
$pagename='publication';
include 'header.php';
if(isset($_GET['del']) && $_GET['del'] != "")
	{
	$id=$_GET['del'];
	$delete_program=mysql_query("delete from publication where id= '".$id."'");
			?>
			<script language="javascript">
				window.location.href="message.php?msg=19";
			</script>
			<?php

	}

$msg="";

if(isset($_FILES['file']['name'] ))
	{
		//print_r($_FILES);
		if($_FILES['file']['name'] != "" )
		{
		$type=explode("/",$_FILES['file']['type']);
			//print_r($_FILES); 
			if($_FILES['file']['error']=="0")
			{		
				if($type[0]=="application" || ($type[0]=="msword" || $type[0]=="pdf"))
				{
				include('SimpleImage.php');
				$pub = new SimpleImage();
				$pub_load=$_FILES['file']['name'];
				$pub->load($_FILES['file']['tmp_name']);
				$pub_temp=$_FILES['file']['tmp_name'];
				$tmp_pub=explode(".",$pub_load);
				$name_pub=md5(date('s').$tmp_pub[0]).".".$tmp_pub[1];
				move_uploaded_file($pub_temp,'../publications/'.$name_pub);
				$cv_insert=mysql_query("insert into publication (name,publication) values ('".$_POST['name']."','".$name_pub."')") or die(mysql_error());
				$result=1;
				?>
				<script language="javascript">
					window.location.href="message.php?msg=18";
				</script>
				<?php
				}
				else
				{
				$msg.= "Please Insert Only PDF or Doc File";
				$image_error=1;
				}
			}else
			{
				$msg.="There is some problem with the image so insert other.";
			}
		}else
		{
			$msg.="Please Insert Some File.";
		}
	}	
	
?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.1.css" media="screen" />

<link rel="stylesheet" type="text/css" href="grid/gt_grid_orginal.css" />
<script type="text/javascript" src="grid/gt_msg_en.js"></script>
<script type="text/javascript" src="grid/gt_grid_all.js"></script>


<script type="text/javascript" >

var dsConfig2= {

	uniqueField : 'no' ,

	fields :[
		{name : 'text'},
	]
};

var colsConfig2 = [
		{ id : 'text'  , header : "text" , width : 350 , editable:false },
		{ id : 'action' , header : "action" , width : 200 , align:"left", editable:false}

];

var gridConfig2={

	id : "grid2",
	
	loadURL : 'grid/export_php/testList.php?pagename=pub',

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
                Publications
                </div>
				<div align="center" style="color:red; font-size:14px"><?php echo $msg; ?></div>
                <div style=" height:300px;">
                	<div id="bigbox" style="margin:15px;display:!none; float:left; border:2px double #CCC" >
					  <div style="border:0px solid #cccccc; padding:5px;height:250px;width:500px; margin-left:20px" >
                      	     <form action="" method="post" enctype="multipart/form-data" name="image"  >
                                <table  border="0" align="center" style=""  >
                                  <tr>
                                  	<td colspan="2" align="center"> <span style="font-size:14px">Please Insert Publication</span></td>
                                  </tr>
                                  <tr >
                                    <td height="50"><div align="right"><strong>Insert Publication </strong></div></td>
                                    <td><input type="file" name="file" /></td>
                                  </tr>
                                  <tr>
                                    <td height="38"><div align="right"><strong>Title </strong></div></td>
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
					  <div id="grid1_container2" style="border:0px solid #cccccc;background-color:#f3f3f3;padding:5px;height:260px;width:550px;" ></div>
					</div>
                </div>
					<table id="myHead3" style="display:none">
				<tr>
                    <td columnId='text'>text</td>
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
			if(confirm ("Do you really want to delete this Publication"))
				{
					window.location.href="publications.php?del="+id;
				}
			else
				{
					
				}
		}
</script>