<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title><?php echo ucfirst($domain); ?></title>

<meta name="keywords" content="" />

<meta name="Small Window " content="" />

<link href="<?php echo SITE_URL; ?>modules/themes/nowhere/default.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript">
function show_product(id)
{
	window.location.href="<?php echo SITE_URL ?>modules/products/products.php?id="+id;
}
function show_hide(id)
{
	document.getElementById(id+"_sub").style.display="";
}
function buy_now(id)
{
	window.location.href="<?php echo SITE_URL ?>modules/products/cart.php?id="+id;
}
function delete_cart(id)
{
	window.location.href="<?php echo SITE_URL ?>modules/products/cart.php?del="+id;
}
function checkout()
{
	window.location.href="<?php echo SITE_URL ?>modules/products/checkout.php";
}

</script>
</head>

<body>

<!-- start header -->

<div id="header">

<div id="logo">

	<h1><a href="#"><?php echo ucfirst($domain); ?></a></h1>

</div>

<div id="menu">

	<ul>

		<li <?php if($pagename=="home") { ?>class="current_page_item" <?php } ?>><a href="<?php echo SITE_URL; ?>">Homepage</a></li>

		<li <?php if($pagename=="products") { ?>class="current_page_item" <?php } ?>><a href="<?php echo SITE_URL; ?>modules/products/all_products.php">Products</a></li>

		<li <?php if($pagename=="terms") { ?>class="current_page_item" <?php } ?>><a href="<?php echo SITE_URL; ?>modules/cms/terms.php">Terms</a></li>

		<li <?php if($pagename=="about") { ?>class="current_page_item" <?php } ?>><a href="<?php echo SITE_URL; ?>modules/cms/about.php">About Us</a></li>

		<li <?php if($pagename=="cart") { ?>class="current_page_item" <?php } ?>><a href="<?php echo SITE_URL; ?>modules/products/cart.php">Cart</a></li>

		<li <?php if($pagename=="contact") { ?>class="current_page_item" <?php } ?>><a href="<?php echo SITE_URL; ?>modules/cms/contact.php">Contact Us</a></li>

	</ul>

</div>

<div style="clear:both"></div>
