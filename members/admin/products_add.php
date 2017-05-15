<?php

session_start();

$pagename='products';

include 'header.php';

include 'dbc.php';



$error="";

$productname = "";

$category="";

$subcategory="";

$brandname="";

$annualprice="";

$discount="";

$storeprice="";

$shortdiscription="";

$longdiscription="";

$quantity="";

$status=0;

if(isset($_GET['id']) && $_GET['id']!="")

{

	$id=$_GET['id'];

	$qr1="select * from products where id='".$id."' and user_id='".$_SESSION['id']."'";

	$data=mysql_query($qr1);

	$rows=mysql_fetch_array($data);

	$productname = $rows['product_name'];

	$category=$rows['category'];

	$subcategory=$rows['sub_category'];

	$brandname=$rows['brand_name'];

	$annualprice=$rows['annual_prise'];

	$discount=$rows['discount'];

	$storeprice=$rows['store_prise'];

	$shortdiscription=$rows['short_description'];

	$longdiscription=$rows['long_description'];

	$quantity=$rows['quantity'];

	$status=$rows['status'];

}



if(isset($_POST['action']) && $_POST['action']=="edit")

{

	$productname = $_POST['products_name'];

	$category=$_POST['products_category'];

	$subcategory=$_POST['products_subcategory'];

	$brandname=$_POST['products_brandname'];

	$annualprice=$_POST['products_annualprice'];

	$discount=$_POST['products_discount'];

	$storeprice=$_POST['products_storeprice'];

	$shortdiscription=$_POST['products_shortdiscription'];

	$longdiscription=$_POST['products_longdiscription'];

	$status=$_POST['products_status'];

	$quantity=$_POST['products_quantity'];

	//print_r($_FILES);

	$image1=$_FILES['products_image1']['name'];

	$image2=$_FILES['products_image2']['name'];

	$image3=$_FILES['products_image3']['name'];

	$image4=$_FILES['products_image4']['name'];

	$edit_id=$_POST['edit_id'];

	

	if($productname=="")

	{

		$error="Enter Product Name";

	}

	elseif($category=="0")

	{

		$error="Select category";

	}

	elseif($subcategory=="0" && $category!="0")

	{

		$error="Select Sub-Category";

	}

	elseif($brandname=="")

	{

		$error="Enter Brand Name";

	}

	elseif($annualprice=="")

	{

		$error="Enter Actual Price";

	}

	elseif($discount=="")

	{

		$error="Enter Discount rate";

	}

	elseif($shortdiscription=="")

	{

		$error="Enter Short Description";

	}

	elseif($longdiscription=="")

	{

		$error="Enter Long Description";

	}

	elseif($quantity=="")

	{

		$error="Enter Product Quantity";

	}

	else

	{

		$qr="update products set product_name='".$productname."',category='".$category."',sub_category='".$subcategory."',brand_name='".$brandname."',annual_prise='".$annualprice."',discount='".$discount."',store_prise='".$storeprice."',short_description='".$shortdiscription."',long_description='".$longdiscription."',status='".$status."',quantity='".$quantity."',image1='".$image1."',image2='".$image2."',image3='".$image3."',image4='".$image4."' where id='".$edit_id."'";

			mysql_query($qr) or die(mysql_error());

			//echo mysql_insert_id(); 

		if(mysql_affected_rows()!=0)

		{
			if($image1!="")
			{
				include 'SimpleImage.php';

				$image_upload = new SimpleImage();
				$image_load=$_FILES['products_image1']['name'];
				$image_upload->load($_FILES['products_image1']['tmp_name']);
				$name=explode('.',$image_load);
				$photo=date('s').md5($name[0]).".".$name[1];
				
				$image_upload->save('../images/products/original_'.$photo);
				
				$image_upload->resize(235,235);
				$image_upload->save('../images/products/235x235_'.$photo);
				
				$qr_image="update products set image1='235x235_".$photo."' where id='".$edit_id."'";
				mysql_query($qr_image);
			}

			header("location:message.php?msg=21");
			exit;

		}

	}

}







if(isset($_POST['action']) && $_POST['action']=="add")

{

	$productname = $_POST['products_name'];

	$category=$_POST['products_category'];

	$subcategory=$_POST['products_subcategory'];

	$brandname=$_POST['products_brandname'];

	$annualprice=$_POST['products_annualprice'];

	$discount=$_POST['products_discount'];

	$storeprice=$_POST['products_storeprice'];

	$shortdiscription=$_POST['products_shortdiscription'];

	$longdiscription=$_POST['products_longdiscription'];

	$status=$_POST['products_status'];

	$quantity=$_POST['products_quantity'];

	//print_r($_FILES);

	$image1=$_FILES['products_image1']['name'];

	$image2=$_FILES['products_image2']['name'];

	$image3=$_FILES['products_image3']['name'];

	$image4=$_FILES['products_image4']['name'];

	

	if($productname=="")

	{

		$error="Enter Product Name";

	}

	elseif($category=="0")

	{

		$error="Select category";

	}

	elseif($subcategory=="0" && $category!="0")

	{

		$error="Select Sub-Category";

	}

	elseif($brandname=="")

	{

		$error="Enter Brand Name";

	}

	elseif($annualprice=="")

	{

		$error="Enter Actual Price";

	}

	elseif($discount=="")

	{

		$error="Enter Discount rate";

	}

	elseif($shortdiscription=="")

	{

		$error="Enter Short Description";

	}

	elseif($longdiscription=="")

	{

		$error="Enter Long Description";

	}

	elseif($quantity=="")

	{

		$error="Enter Product Quantity";

	}

	else

	{

		$qr="insert into products (product_name,category,sub_category,brand_name,annual_prise,discount,store_prise,short_description,long_description,status,quantity,image1,image2,image3,image4,user_id) values ('".$productname."','".$category."','".$subcategory."','".$brandname."','".$annualprice."','".$discount."','".$storeprice."','".$shortdiscription."','".$longdiscription."','".$status."','".$quantity."','".$image1."','".$image2."','".$image3."','".$image4."','".$_SESSION['id']."')";

			mysql_query($qr);

			$product_id=mysql_insert_id(); 

		if(mysql_insert_id()!=0)

		{
			if($image1!="")
			{
				include 'SimpleImage.php';

				$image = new SimpleImage();
				$image_load=$_FILES['products_image1']['name'];
				$image->load($_FILES['products_image1']['tmp_name']);
				$name=explode('.',$image_load);
				$photo=date('s').md5($name[0]).".".$name[1];
				
				$image->save('../images/products/original_'.$photo);
				
				$image->resize(235,235);
				$image->save('../images/products/235x235_'.$photo);
				
				$qr_image="update products set image1='235x235_".$photo."' where id='".$product_id."'";
				mysql_query($qr_image);
			}

			//echo "sdas";

			header("location:message.php?msg=20");

		}

	}

}



?>



<div class="success"><?php if(isset($_SESSION['success']) && $_SESSION['success']!=""){ echo $_SESSION['success']; $_SESSION['success']="";} ?></div>

<form action="" onsubmit="return check()" method="post" enctype="multipart/form-data">

<div class="page_title">Add Products</div>

<div class="error_text"><?php echo $error; ?></div>

<div style="padding-top:30px; padding-left:30%;">

	<div >

		<div class="titlefloat">Products Name: </div>

		<div class="padding"><input type="text" name="products_name" id="products_id" value="<?php echo $productname; ?>"/></div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Category: </div>

		<div class="padding">

			<select name="products_category" id="category_id" onchange="fetch_subcategory(this.value)">

				<option value="0">Select</option>

			<?php

				$qr="select * from category where parent_id='0' and user_id='".$_SESSION['id']."'";

				$qr_exec=mysql_query($qr);

				while($row=mysql_fetch_array($qr_exec))

				{

					if($category==$row['id']){$select="selected";} else {$select="";}

					echo "<option ".$select." value='".$row['id']."'>".$row['category_name']."</option>";

				}

			?>

				

			</select>

		</div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Sub Category: </div>

		<div class="padding">

			<select name="products_subcategory" id="subcategory_id">

				<option value="0">Select</option>

			<?php

			if($category!='0' && $category!=''){

				$qr="select * from category where parent_id='".$category."'";

				$qr_exec=mysql_query($qr);

				while($row=mysql_fetch_array($qr_exec))

				{

					if($subcategory==$row['id']){$select="selected";} else {$select="";}

					echo "<option ".$select." value='".$row['id']."'>".$row['category_name']."</option>";

				}

			}

			?>

			</select>

		</div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Brand Name: </div>

		<div class="padding"><input type="text" name="products_brandname" id="brandname_id" value="<?php echo $brandname; ?>"/></div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Annual Price: </div>

		<div class="padding"><input type="text" name="products_annualprice" id="annualprice_id" value="<?php echo $annualprice; ?>"/></div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Discount: </div>

		<div class="padding"><input type="text" name="products_discount" id="discount_id" onblur="return price()" value="<?php echo $discount; ?>"/></div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Store Price: </div>

		<div class="padding"><input type="text" name="products_storeprice" id="storeprice_id" readonly="readonly" value="<?php echo $storeprice; ?>"/></div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Short Discription: </div>

		<div class="padding"><textarea rows="3" cols="50" name="products_shortdiscription" id="shortdiscription_id"><?php echo $shortdiscription; ?></textarea></div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Long Discription: </div>

		<div class="padding"><textarea rows="6" cols="50" name="products_longdiscription" id="longdiscription_id" ><?php echo $longdiscription; ?></textarea></div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Status: </div>

			<div class="padding">

				Active &nbsp;&nbsp;&nbsp;<input type="radio" checked <?php if($status==0) {echo "checked";} ?> name="products_status" id="status_id" value="0"/>

				Deactive <input type="radio" name="products_status" <?php if($status==1) {echo "checked";} ?> id="status_id" value="1"/>

			</div>

			

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Quantity: </div>

		<div class="padding"><input type="text" name="products_quantity" id="quantity_id" value="<?php echo $quantity; ?>" /></div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Image 1:</div>

		<div class="padding"><input type="file" name="products_image1" id="image1_id" /></div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Image 2:</div>

		<div class="padding"><input type="file" name="products_image2" id="image2_id" /></div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Image 3:</div>

		<div class="padding"><input type="file" name="products_image3" id="image3_id" /></div>

		<div class="clear"></div>

	</div>

	<div >	

		<div class="titlefloat">Image 4:</div>

		<div class="padding"><input type="file" name="products_image4" id="image4_id" /></div>

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

		<div class="titlefloat">&nbsp;</div>

		<div class="padding"><input type="submit" name="submit" id="" value="<?php echo $submit_value; ?>Product"/></div>

		<div class="clear"></div>

	</div>

	

	

</div>

</form>

<div class="clear"></div>

<?php

include 'footer.php';

?>