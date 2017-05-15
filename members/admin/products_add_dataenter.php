<?php
include 'dbc.php';
?>

<?php
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
$image1=$_POST['products_image1'];
$image2=$_POST['products_image2'];
$image3=$_POST['products_image3'];
$image4=$_POST['products_image4'];

$qr="insert into products (product_name,category,sub_category,brand_name,annual_prise,discount,store_prise,short_description,long_description,status,quantity,image1,image2,image3,image4) values ('".$productname."','".$category."','".$subcategory."','".$brandname."','".$annualprice."','".$discount."','".$storeprice."','".$shortdiscription."','".$longdiscription."','".$status."','".$quantity."','".$image1."','".$image2."','".$image3."','".$image4."')";
	mysql_query($qr); 

	header("location:products_add.php");
?>
