<?php 
$pagename="products";
include("../../common.php");
	if(isset($_GET['cat']) && $_GET['cat']!="")
		{
			$data=base64_decode($_GET['cat']);
			$data_exp=explode("/",$data);
			$sub_cat=$data_exp[1];
			$cat=$data_exp[0];
			$products="select * from products where user_id='$user_id' and status='0' and sub_category='".$sub_cat."' and category='".$cat."'";
			$products_exec=mysql_query($products);
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
		$j=0;
		while($subcategory=mysql_fetch_array($select2))
		{
			$sub_category_array[$i][$j]['name']=$subcategory['category_name'];
			$sub_category_array[$i][$j]['id']=$subcategory['id'];
			$j++;
		}
		$i++;
	}

	include ($theme_folder.'/all_products.php');

?>