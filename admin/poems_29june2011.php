<?php
session_start();
$pagename='poems';
include 'header.php';

$sql_content=mysql_query("select * from home_content where id='1'");
$data=mysql_fetch_array($sql_content);
?>
<?php
	if(isset($_POST['submit']))
		{
			$content=addslashes($_POST['poem']);
			$title=addslashes($_POST['title']);
			$writer=$_POST['writer'];
			$insert_poem=mysql_query("insert into poems (title,poem_content,writer,status) values ('".$title."','".$content."','".$writer."','1')") or die (mysql_error());
			header("location:message.php?msg=9");
		}
?>
<!-- TinyMCE -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
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
		
		<form name="home_content" method="post" action="" >

		<div style="float:left; padding-left:160px; width:100px"><strong>Poem Title</strong></div>
		<div style="float:left;  padding-left:10px; "><input type="text" size="50" name="title" id="title"  /></div>
		<div style="clear:both">&nbsp;</div>

		<div style="float:left; padding-left:160px; width:100px"><strong>Poem Content</strong></div>
		<div style="float:left;  padding-left:10px; "><textarea  name="poem" rows="50" id="elm1" style="width:500px; height:500px"><?php echo $data['content']; ?></textarea></div>
		<div style="clear:both">&nbsp;</div>

		<div style="float:left; padding-left:160px; width:100px"><strong>Poem Writers</strong></div>
		<div style="float:left;  padding-left:10px; "><input type="text" size="50" name="writer" id="writer"  /></div>
		<div style="clear:both">&nbsp;</div>


		<div style="clear:both; text-align:left; padding-left:270px; padding-top:20px"><input type="image" src="images/submit_c.png" /></div>
		<input type="hidden" name="submit" value="home_page" />
		</form>
	</div>
<?php
include 'footer.php';
?>