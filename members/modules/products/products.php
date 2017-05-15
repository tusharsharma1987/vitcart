<?php 
$pagename="products";
include("../../common.php");

	if(isset($_GET['id']) && $_GET['id']!="")
		{
			$product_id=$_GET['id'];
			$products="select * from products where user_id='$user_id' and status='0' and id='".$product_id."'";
			$products_exec=mysql_query($products);
			$product_presence=mysql_num_rows($products_exec);
			$product_detail=mysql_fetch_array($products_exec);
			$cat="select * from category where user_id='$user_id' and parent_id='0' and id='".$product_detail['category']."'";
			$cat_exe=mysql_query($cat);
			$cat_fetch=mysql_fetch_array($cat_exe);
			$category_name=$cat_fetch['category_name'];
			$subcat="select * from category where user_id='$user_id' and parent_id='".$product_detail['category']."' and id='".$product_detail['sub_category']."'";
			$subcat_exe=mysql_query($subcat);
			$subcat_fetch=mysql_fetch_array($subcat_exe);
			$sub_category=$subcat_fetch['category_name'];
		}
	else
		{
			$products="select * from products where user_id='$user_id' and status='0'";
			$products_exec=mysql_query($products);
		}


	$total_product=mysql_num_rows($products_exec);
	$fetch1_1="select * from category where user_id='$user_id' and parent_id='0'";
	$select1_1=mysql_query($fetch1_1);
	$total_cat=mysql_num_rows($select1_1);
	$i=0;
	while($category=mysql_fetch_array($select1_1))
	{
		$category_array[$i]['name']=$category['category_name'];
		$category_array[$i]['id']=$category['id'];
		$fetch2="select * from category where user_id='$user_id' and parent_id='".$category['id']."'";
		$select2=mysql_query($fetch2);
		$total_sub_cat[$i]=mysql_num_rows($select2);
		while($subcategory=mysql_fetch_array($select2))
		{
			$sub_category_array[$i]['name']=$subcategory['category_name'];
			$sub_category_array[$i]['id']=$subcategory['id'];
		}
		$i++;
	}

	if(isset($_GET['id']) && $_GET['id']!="")
		{
			include ($theme_folder.'/products.php');
		}
	else
		{
			include ($theme_folder.'/all_products.php');
		}


?>