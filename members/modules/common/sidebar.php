<?php 
$pagename="terms";
include("../../common.php");

	$fetch1="select * from category where user_id='$user_id' and parent_id='0'";
	$select1=mysql_query($fetch1);
	$total_cat=mysql_num_rows($select1);
	$i=0;
	while($category=mysql_fetch_array($select1))
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
	print_r($sub_category_array);
	 
	include ($theme_folder.'sidebar.php');

?>