<?php 
$pagename="cart";
include("../../common.php");
if(!isset($_SESSION['cart']))
{
	$_SESSION['cart']="";
}
function fetch_product_detail($product_id,$user_id)
{
	$products="select * from products where user_id='".$user_id."' and status='0' and id='".$product_id."'";
	$products_exec=mysql_query($products);
	$product_presence=mysql_num_rows($products_exec);
	$product_detail=mysql_fetch_array($products_exec);
	return $product_detail;
}
if(isset($_GET['del']) && $_GET['del']!="")
	{
		$del_key=array_search($_GET['del'],$_SESSION['cart']);
		//$_SESSION['cart'][$del_key]="0";
		unset($_SESSION['cart'][$del_key]);
	}

if(isset($_GET['id']) && $_GET['id']!="")
	{
		if(!in_array($_GET['id'],$_SESSION['cart']))
		{
			end($_SESSION['cart']);
			$last_product=key($_SESSION['cart']);
			$_SESSION['cart'][$last_product + 1]=$_GET['id'];
		}
	}
	$i=0;
	foreach($_SESSION['cart'] as $cart)
	{
		$cart_detail[$i]=fetch_product_detail($cart,$user_id);
		$i++;
	}



//echo "<pre>";print_r($cart_detail);echo "</pre>";

include ($theme_folder.'/cart.php');
?>