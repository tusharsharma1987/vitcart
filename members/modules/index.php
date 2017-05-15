<?php 
include '../include/config.php';

$domain_exp=explode(".",$_SERVER['HTTP_HOST']);
if($domain_exp[0]=="www")
{
	$domain=$domain_exp[1];
}
else
{
	$domain=$domain_exp[0];
}
$qr="select * from member where store_name='".$domain."'";
$qr_exe=mysql_query($qr) or die (mysql_error());
$check_domain=mysql_num_rows($qr_exe);
if($check_domain == 1)
{
	$store_data=mysql_fetch_array($qr_exe);
	//echo "<pre>"; print_r($store_data); echo "</pre>";
	$theme=$store_data['theme'];
	$user_id=$store_data['id'];

	$qr_theme="select * from theme where id='".$theme."'";
	$qr_theme_exe=mysql_query($qr_theme) or die (mysql_error());
	$theme_data=mysql_fetch_array($qr_theme_exe);
	//echo "<pre>"; print_r($theme_data); echo "</pre>";
	$theme_name=$theme_data['theme_name'];
	
	//to get the top four products
	$qr_products="select * from products where user_id='".$user_id."' and status='0' order by id desc limit 0,4 ";
	$qr_products_exe=mysql_query($qr_products) or die (mysql_error());
	$i=0;
	while($top_products=mysql_fetch_array($qr_products_exe))
	{
		$products_detail[$i]['name']=$top_products['product_name'];
		$products_detail[$i]['price']=$top_products['store_prise'];
		$products_detail[$i]['mrp']=$top_products['annual_prise'];
		$products_detail[$i]['discount']=$top_products['discount'];
		$products_detail[$i]['image']=$top_products['image1'];
		if($products_detail[$i]['image']=="")
		{
			$products_detail[$i]['image']="noimage.jpg";
		}
		$i++;
	}
	for($j=0;$j<4;$j++)
	{
		if($products_detail[$j]['name']=="")
		{
			$products_detail[$j]['name']="No Product";
		}
		if($products_detail[$j]['price']=="")
		{
			$products_detail[$j]['price']="0.00";
		}
		if($products_detail[$j]['mrp']=="")
		{
			$products_detail[$j]['mrp']="0.00";
		}
		if($products_detail[$j]['discount']=="")
		{
			$products_detail[$j]['discount']="0";
		}
		if($products_detail[$j]['image']=="")
		{
			$products_detail[$j]['image']="noimage.jpg";
		}
	}
	//echo "<pre>"; print_r($products_detail); echo "</pre>";
	$qr_content="select * from static_pages where user_id='".$user_id."' and page_name='home'";
	$qr_content_exe=mysql_query($qr_content) or die (mysql_error());
	$page_content=mysql_fetch_array($qr_content_exe);
	if(file_exists('themes/'.$theme_name.'/index.php'))
	{
		include 'themes/'.$theme_name.'/index.php';
	}
	elseif(file_exists('themes/'.$theme_name.'/'.$theme_name.'/index.html'))
	{
		include 'themes/'.$theme_name.'/'.$theme_name.'/index.html';
	}

}
?>