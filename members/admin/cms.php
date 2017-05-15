<?php

session_start();

$pagename='static_pages';

include 'header.php';

?>



<?php

	if(isset($_GET['id']) && $_GET['id']!="")

	{

		$id=mysql_real_escape_string($_GET['id']);

		$check=mysql_query("select * from static_pages where page_name='".$id."' and user_id='".$_SESSION['id']."'") or die(mysql_error());

		$poem_count=mysql_num_rows($check);

			

		if($poem_count >0 )

		{

			$row=mysql_fetch_array($check);

		}

		else

		{

			$row['content']="";

		}

	}

	else

	{

		$id=0;

		$poem_count=0;

	}

	

	if(isset($_POST['edit']) && $_POST['edit']=="home_page_edit")

	{

		$content=checck_data(addslashes($_POST['poem']));

		$id=$_POST['id'];

		

		$check=mysql_query("select * from static_pages where user_id='".$_SESSION['id']."' and page_name='".$id."'") or die(mysql_error());

		$poem_count=mysql_num_rows($check);

		if($poem_count >0 )

		{

			$row=mysql_fetch_array($check);

			$update_poem=mysql_query("update static_pages set content='".$content."' where page_name = '".$id."' and user_id='".$_SESSION['id']."'") or die(mysql_error());		

			?>

			<script language="javascript">

					window.location.href="message.php?msg=11";

			</script>

			<?php

		}

		else

		{

			$insert_cms=mysql_query("insert into static_pages (page_name,content,user_id) values ('".$id."','".$content."','".$_SESSION['id']."')") or die(mysql_error());		

			?>

			<script language="javascript">

				window.location.href="message.php?msg=11";

			</script>

			<?php

		}

	}		

		

	?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

	<div align="center" style="min-height:500px; text-align:center">

		<div style="height:50px">&nbsp;</div>

		

		<form name="home_content" method="post" action="" onsubmit="test()" enctype="multipart/form-data" >



		<div style="float:left; padding-left:160px; width:100px"><strong>Page Title</strong></div>

		<div style="float:left;  padding-left:10px; ">

        	<select name="title" id="title" onchange="select_page(this.value)">

            	<option <?php if($id=="0"){echo "selected";} ?> value="0">Select</option>

            	<option <?php if($id=="home"){echo "selected";} ?> value="home">Home Page</option>

            	<option <?php if($id=="about_us"){echo "selected";} ?> value="about_us">About Us</option>

            	<option <?php if($id=="privacy_policy"){echo "selected";} ?> value="privacy_policy">Privacy Policy</option>

            	<option <?php if($id=="terms"){echo "selected";} ?> value="terms">Terms and Condition</option>

            	<option <?php if($id=="faq"){echo "selected";} ?> value="faq">FAQ</option>

            	<option <?php if($id=="services"){echo "selected";} ?> value="services">Services</option>

            </select>

        </div>

		<div style="clear:both">&nbsp;</div>



		<div style="float:left; padding-left:160px; width:100px"><strong>Page Content</strong></div>

		<div style="float:left;  padding-left:10px; "><textarea  name="poem" rows="50" id="poem_text" style="width:500px; height:500px"><?php if($poem_count > 0){echo $row['content']; } ?></textarea></div>

		<div style="clear:both">&nbsp;</div>

        <script type="text/javascript">

			//<![CDATA[



				CKEDITOR.replace( 'poem_text', {

					extraPlugins : 'autogrow',

					removePlugins : 'resize'

				});



			//]]>

			</script>



		<div style="clear:both">&nbsp;</div>





		<div style="clear:both; text-align:left; padding-left:270px; padding-top:20px"><input type="image" src="images/submit_c.png" /></div>

		<?php

		if(isset($_GET['id']) && $_GET['id']!="" )

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

		{		}

	}

	function select_page(id)

	{

			window.location.href="cms.php?id="+id;

	}

</script>