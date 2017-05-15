<?php
session_start();
$pagename='poems';
include 'header.php';
?>
<?php
	if(isset($_GET['del']) && $_GET['del'] != "")
		{
		$id=$_GET['del'];
		$delete_program=mysql_query("delete from poems where id= '".$id."'");
			?>
			<script language="javascript">
				window.location.href="message.php?msg=10";
			</script>
			<?php
//		header("location:message.php?msg=8");
		}

	if(isset($_GET['edit']) && $_GET['edit']!="")
		{
		$id=$_GET['edit'];
		$check=mysql_query("select * from poems where id='".$id."'");
		$poem_count=mysql_num_rows($check);
		if($poem_count >0 )
			{
				$row=mysql_fetch_array($check);
			}
		}

	if(isset($_POST['edit']) && $_POST['edit']=="home_page_edit")
		{
			$content=checck_data(addslashes($_POST['poem']));
			$title=addslashes($_POST['title']);
			$writer=$_POST['writer'];
			$id=$_POST['id'];
			$update_poem=mysql_query("update poems set title='".$title."', poem_content='".$content."', writer='".$writer."' where id = '".$id."'") or die(mysql_error());		
			?>
			<script language="javascript">
				window.location.href="message.php?msg=11";
			</script>
			<?php
			
		}		
		
	if(isset($_POST['submit']))
		{
			$content=checck_data(addslashes($_POST['poem']));
			$title=addslashes($_POST['title']);
			$writer=$_POST['writer'];
			$insert_poem=mysql_query("insert into poems (title,poem_content,writer,status) values ('".$title."','".$content."','".$writer."','1')") or die (mysql_error());
			?>
			<script language="javascript">
				window.location.href="message.php?msg=9";
			</script>
			<?php

//			header("location:message.php?msg=9");
		}
?>
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
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
		{ id : 'title'      , header : "title" , width : 250 , editable:true},
		{ id : 'content'    , header : "content" , width : 350 ,editable:true},
		{ id : 'writer'     , header : "writer" , width : 150 , editable:false},
		{ id : 'action'     , header : "action" , width : 150 , editable:false}

];

var gridConfig={

	id : "grid1",
	
	loadURL : 'grid/export_php/testList.php?pagename=poems',

	exportURL : 'grid/export_php/testList.php?export=true',
	
	exportFileName : 'test_export_doc',

	dataset : dsConfig ,

	columns : colsConfig ,

	container : 'grid1_container', 

	toolbarPosition : 'bottom',

	toolbarContent : 'nav | goto | pagesize | save' ,

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
<!-- TinyMCE -->
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,akIndicPlugin,indicime",

		// Theme options
		theme_advanced_buttons1 : "akIndicPlugin,indicime, save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		//theme_advanced_fonts : "Devanagari New='Devanagari New'; hindi=Kruti dev 10; chiller=chiller",
		
		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px,22px,24px,26px,28px,30px,38px,42px,52px",
		font_size_style_values : "10px,12px,13px,14px,16px,18px,20px,22px,24px,26px,28px,30px,38px,42px,52px",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
	<div align="center" style="min-height:500px; text-align:center">
		<div style="height:50px">&nbsp;</div>
		
		<form name="home_content" method="post" action="test_new.php" onsubmit="test()" >

		<div style="float:left; padding-left:160px; width:100px"><strong>Poem Title</strong></div>
		<div style="float:left;  padding-left:10px; "><input type="text" size="50" name="title" id="title" value="<?php if(isset($_GET['edit'])){echo $row['title']; } ?>"/></div>
		<div style="clear:both">&nbsp;</div>

		<div style="float:left; padding-left:160px; width:100px"><strong>Poem Content</strong></div>
		<div style="float:left;  padding-left:10px; "><textarea  name="poem" rows="50" id="elm1" style="width:500px; height:500px"><?php if(isset($_GET['edit'])){echo $row['poem_content']; } ?></textarea></div>
		<div style="clear:both">&nbsp;</div>

		<div style="float:left; padding-left:160px; width:100px"><strong>Poem Writers</strong></div>
		<div style="float:left;  padding-left:10px; "><input type="text" size="50" name="writer" id="writer"  value="<?php if(isset($_GET['edit'])){echo $row['writer']; } ?>"  /></div>
		<div style="clear:both">&nbsp;</div>


		<div style="clear:both; text-align:left; padding-left:270px; padding-top:20px"><input type="image" src="images/submit_c.png" /></div>
		<?php
		if(isset($_GET['edit']) && $_GET['edit']!="" )
			{
			?>
				<input type="hidden" name="edit" value="home_page_edit" />
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<?php
			}
		else
			{
		?>
			<input type="hidden" name="submit" value="home_page" />
		<?php
			}
		?>
		</form>
	</div>
	<?php 
	if(isset($_GET['edit']) && $_GET['edit']!="" )
		{
		$display="none";
		}
	else
		{
		$display="block";
		}
	?>
    <div id="bigbox" style="margin:15px;display:!none; display:<?php echo $display; ?>" align="center">
      <div id="grid1_container" style="border:0px solid #cccccc;background-color:#f3f3f3;padding:5px;height:500px;width:900px;" ></div>
    </div>
    <table id="myHead1" style="display:none">
<tr>
	<td colspan="8" resizable='false' align="center" style="font-size:18px; padding:10px; "><< Poem Management >></td>
</tr>
<tr>
	<td columnId='title'>title</td>
	<td columnId='content'>content</td>
	<td columnId='writer'>writer</td>
	<td columnId='action'>action</td>
</tr>
</table>

<?php
include 'footer.php';
function checck_data($data)
{
	$data_new=str_replace("<p>","<br>",$data);
	$data_new=str_replace("</p>","",$data_new);
	return $data_new;
}
?>
<script language="javascript">
	function delpoem(id)
		{
			if(confirm ("Do you really want to delete this Poem"))
				{
					window.location.href="poems.php?del="+id;
				}
			else
				{
					
				}
		}
	function editpoem(id)
		{
			window.location.href="poems.php?edit="+id;
		}
	function test()
	{
		alert("sdsd");
		var l=document.getElementById("elm1").value;
		alert(l);
		return false;
	}
</script>