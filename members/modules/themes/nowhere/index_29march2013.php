<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>Nowhere by FCT</title>

<meta name="keywords" content="" />

<meta name="Small Window " content="" />

<link href="<?php echo SITE_URL; ?>modules/themes/nowhere/default.css" rel="stylesheet" type="text/css" media="screen" />

</head>

<body>

<!-- start header -->

<div id="header">

<div class="shoppingcart">Cart</div>

<div id="logo">

	<h1><a href="#"><?php echo $domain; ?></a></h1>

</div>

<div id="menu">

	<ul>

		<li class="current_page_item"><a href="#">Homepage</a></li>

		<li><a href="#">Products</a></li>

		<li><a href="#">Services</a></li>

		<li><a href="#">About Us</a></li>

		<li><a href="#">Contact Us</a></li>

	</ul>

</div>

<div style="clear:both"></div>

<div style="">

	<div style="float:left; padding:5px;">

		<div><img src="<?php echo SITE_URL; ?>modules/themes/nowhere/images/note2.jpg" /></div>

		<div style="position:absolute; background: none repeat scroll 0 0 #EEEEEE;margin-top: -25px; text-align: center; width: 229px; padding:3px;"><?php echo $products_detail[3]['name']; ?></div>

	</div>

	<div style="float:left; padding:5px;">

		<div><img src="<?php echo SITE_URL; ?>modules/themes/nowhere/images/note2.jpg" /></div>

		<div style="position:absolute; background: none repeat scroll 0 0 #EEEEEE;margin-top: -25px; text-align: center; width: 229px; padding:3px;"><?php echo $products_detail[2]['name']; ?></div>

	</div>

	<div style="float:left; padding:5px;">

		<div><img src="<?php echo SITE_URL; ?>modules/themes/nowhere/images/note2.jpg" /></div>

		<div style="position:absolute; background: none repeat scroll 0 0 #EEEEEE;margin-top: -25px; text-align: center; width: 229px; padding:3px;"><?php echo $products_detail[1]['name']; ?></div>

	</div>

	<div style="float:left; padding:5px;">

		<div><img src="<?php echo SITE_URL; ?>modules/themes/nowhere/images/note2.jpg" /></div>

		<div style="position:absolute; background: none repeat scroll 0 0 #EEEEEE;margin-top: -25px; text-align: center; width: 229px; padding:3px;"><?php echo $products_detail[0]['name']; ?></div>

	</div>

</div>

<div style="clear:both"></div>

</div>

<!-- end header -->



<div id="wrapper">

<!-- start page -->

<div id="page">

	<!-- start content -->

	<div id="content">

		<div class="post">

			<h2 class="title"><a href="#">Welcome to Our Website!</a></h2>

			

			<div class="entry">

				<?php echo $page_content['content']; ?>
			</div>

		</div>

		

		

	</div>

	<!-- end content -->

	<div style="clear: both;">&nbsp;</div>

</div>

<!-- end page -->

</div>

<div id="footer">

	<p>&copy;2013 All Rights Reserved.</p>

</div>

</body>

</html>

