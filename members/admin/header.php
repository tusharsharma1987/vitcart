<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link type="text/css" href="style.css" rel="stylesheet">

<script language="javascript" src="javascript/common.js"></script>

<title>Untitled Document</title>

</head>



<body>



<?php

if((!isset($_SESSION['id']) && $_SESSION['id'] != '') || $_SESSION['type']!="member")

	{

		header("location:index.php");

	}

	include 'dbc.php';

?>

<div class="header">

		<div class="welcome" >

			Welcome to <?php echo ucfirst($_SESSION['uname']); ?>'s Control Panel

			<div style="float:right; font-size:15px; padding-right:10px">

			<a href="logout.php" style="text-decoration:none; color:#000000">Logout</a>

		</div>

		</div>

		

		<!-- <div style="padding-left:70px; float:left; ">&nbsp;</div>

		<div class="menu" <?php if($pagename=='home') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >

		<a href="home_admin.php">Home Content</a>

		</div> -->

		<div style="width:3px; float:left">&nbsp;</div>

		<div class="menu" <?php if($pagename=='profile') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >

		<a href="profile.php">Profile</a>

		</div>

		<div style="width:3px; float:left">&nbsp;</div>

		<div class="menu" <?php if($pagename=='contact') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >

		<a href="contact.php">Contact</a>

		</div>

		<div style="width:3px; float:left">&nbsp;</div>

		<div class="menu" <?php if($pagename=='static_pages') { echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >

		<a href="cms.php">CMS</a>

		</div>

		<div style="width:3px; float:left">&nbsp;</div>

		<div class="menu" <?php if($pagename=='products') { echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >

		<a href="products.php">Products</a>

		</div>

		<div style="width:3px; float:left">&nbsp;</div>

		<div class="menu" <?php if($pagename=='category') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >

		<a href="category.php">Category</a>

		</div>

		<!-- <div style="width:3px; float:left">&nbsp;</div>

		<div class="menu" <?php if($pagename=='comments') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >

		<a href="comments.php">Comments</a>

		</div>

		<div style="width:3px; float:left">&nbsp;</div>

		<div class="menu" <?php if($pagename=='publication') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >

		<a href="publications.php">Publications</a>

		</div>-->

		<div style="width:3px; float:left">&nbsp;</div>

		<div class="menu" <?php if($pagename=='paypal') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >

		<a href="paypal_setting.php">Paypal Setting</a>

		</div>

		<div style="width:3px; float:left">&nbsp;</div>

		<div class="menu" <?php if($pagename=='transaction') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >

		<a href="transaction_report.php">Transaction Report</a>

		</div>





</div>