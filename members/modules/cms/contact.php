<?php 
$pagename="cart";
include("../../common.php");
	
	$fetch1="select * from member where id='".$user_id."'";
	$select1=mysql_query($fetch1);
	$row1=mysql_fetch_array($select1);
	
	$name=$row1['full_name'];
	$email=$row1['email'];
	$address=$row1['address'];
	$location=$row1['location'];
	$store_name=$row1['store_name'];
	$zip=$row1['zipcode'];
	$phone=$row1['phone'];



//echo "<pre>";print_r($cart_detail);echo "</pre>";

include ($theme_folder.'/contact.php');
?>