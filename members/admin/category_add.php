<?php
session_start();
$pagename='category';
include 'header.php';
$error="";
$success="";
$category_name="";
$parent_id="";

if(isset($_GET['id']) && $_GET['id']!="")
{
	$id=$_GET['id'];
	$qr1="select * from category where id='".$id."' and user_id='".$_SESSION['id']."'";
	$data=mysql_query($qr1);
	$rows=mysql_fetch_array($data);
	$category_name=$rows['category_name'];
	$parent_id=$rows['parent_id'];
}
if(isset($_POST['action']) && $_POST['action']=="edit")
{
	if($_POST['category_name']=="")
	{
		$error="Please Enter Category Name";
	}
	else
	{
		$category_name=$_POST['category_name'];
		$parent_category=$_POST['parent_category'];
		$id=$_POST['edit_id'];
		$qr_insert="update category set category_name='".$category_name."',parent_id='".$parent_category."' where id='".$id."'";
		$qr_insert_exec=mysql_query($qr_insert) or die(mysql_error());
		$insert_id=mysql_affected_rows();
		
	
		if($insert_id==0)
		{
			$error="There is some problem in updating category";
		}
		else
		{
			$success="Category Updated Successfully";
		}
	}
}

if(isset($_POST['action']) && $_POST['action']=="add")
{
	if($_POST['category_name']=="")
	{
		$error="Please Enter Category Name";
	}
	else
	{
		$category_name=$_POST['category_name'];
		$parent_category=$_POST['parent_category'];
		$qr_insert="insert into category (category_name,parent_id,user_id) values ('".$category_name."','".$parent_category."','".$_SESSION['id']."')";
		$qr_insert_exec=mysql_query($qr_insert) or die(mysql_error());
		$insert_id=mysql_insert_id();
		
	
		if($insert_id==0)
		{
			$error="There is some problem in inserting category";
		}
		else
		{
			$success="Category Inserted Successfully";
		}
	}
}
?>

<div>
<form method="post" action="">
<div class='page_title'>Add Category </div>
<div class="error_text"><?php echo $error; ?></div>
<div class="success_text"><?php echo $success; ?></div>
<div style="padding-top:30px; padding-left:30%;">
	<div >
		<div class="titlefloat">Parent Category: </div>
		<div class="padding">
			<select name="parent_category" >
				<option value="0">Parent</option>
			<?php
				$qr="select * from category where parent_id='0' and user_id='".$_SESSION['id']."'";
				$qr_exec=mysql_query($qr);
				while($row=mysql_fetch_array($qr_exec))
				{
					if($parent_id==$row['id']){$select="selected";} else {$select="";}
				echo "<option ".$select." value='".$row['id']."'>".$row['category_name']."</option>";
				}
			?>
			</select>
		</div>
		<div class="clear"></div>
	</div>
	
	<?php
	if(isset($_GET['id']) && $_GET['id']!="")
	{
		echo '<input type="hidden" name="action" value="edit" />';
		echo '<input type="hidden" name="edit_id" value="'.$_GET['id'].'" />';
		$submit_value="Update ";
	}
	else
	{
		echo '<input type="hidden" name="action" value="add" />';
		$submit_value="Add ";
	}
	?>
	
	<div >
		<div class="titlefloat">Category Name: </div>
		<div class="padding"><input type="text" name="category_name" id="category_id" value="<?php echo $category_name;?>"/></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">&nbsp;</div>
		<div class="padding"><input type="submit" name="submit" id="" value="<?php echo $submit_value; ?>Category" /></div>
		<div class="clear"></div>
	</div>
	
	
</div>

<div class="clear"></div>
		
		
</form>
<script>
		var category=document.getElementById("category_id").innerHTML;
		document.write(category);
</script>

<div class="clear"></div>

<?php
include 'footer.php';
?>