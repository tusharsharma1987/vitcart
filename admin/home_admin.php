<?php
session_start();
$pagename='home';
include 'header.php';

$sql_content=mysql_query("select * from home_page where id='1'");
$data=mysql_fetch_array($sql_content);
?>
<?php
	if(isset($_POST['submit']))
		{
			$content=addslashes($_POST['home']);
			$update_query=mysql_query("update home_page set content='".$content."' where id=1;");
			//header("location:message.php?msg=1");
			?>
			<script language="javascript">
				window.location.href="message.php?msg=1";
			</script>
			<?php
			
		}
?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<div align="center" style="min-height:500px; text-align:center">
		<div style="height:50px">&nbsp;</div>
		
		<form name="home_content" method="post" action="" enctype="multipart/form-data" >
		<div align="left" style="padding-bottom:20px; padding-left:50px">Enter the content that you want to show at home page of the site.</div>
		<div style="float:left; padding-left:160px"><strong>Home Content</strong></div>
		<div style="float:left;  padding-left:10px; "><textarea  name="home" id="home_content" style="width:500px; height:500px"><?php echo $data['content']; ?></textarea></div>
        <script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'home_content', {
					extraPlugins : 'autogrow',
					removePlugins : 'resize'
				});

			//]]>
			</script>
		<div style="clear:both; text-align:left; padding-left:270px; padding-top:20px"><input type="image" src="images/submit_c.png" /></div>
		<input type="hidden" name="submit" value="home_page" />
		</form>
	</div>
<?php
include 'footer.php';
?>