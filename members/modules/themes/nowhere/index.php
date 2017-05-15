<?php 
$pagename="home";
include 'header.php';
//echo "<pre>"; print_r($products_detail); echo "</pre>";
 ?>
<div style="">

	<div style="float:left; padding:5px;">

		<div><img src="<?php echo SITE_URL; ?>images/products/<?php echo $products_detail[3]['image']; ?>" /></div>

		<div style="position:absolute; background: none repeat scroll 0 0 #EEEEEE;margin-top: -25px; text-align: center; width: 229px; padding:3px;"><?php echo $products_detail[3]['name']; ?></div>

	</div>

	<div style="float:left; padding:5px;">

		<div><img src="<?php echo SITE_URL; ?>images/products/<?php echo $products_detail[2]['image']; ?>" /></div>

		<div style="position:absolute; background: none repeat scroll 0 0 #EEEEEE;margin-top: -25px; text-align: center; width: 229px; padding:3px;"><?php echo $products_detail[2]['name']; ?></div>

	</div>

	<div style="float:left; padding:5px;">

		<div><img src="<?php echo SITE_URL; ?>images/products/<?php echo $products_detail[1]['image']; ?>" /></div>

		<div style="position:absolute; background: none repeat scroll 0 0 #EEEEEE;margin-top: -25px; text-align: center; width: 229px; padding:3px;"><?php echo $products_detail[1]['name']; ?></div>

	</div>

	<div style="float:left; padding:5px;">

		<div><img src="<?php echo SITE_URL; ?>images/products/<?php echo $products_detail[0]['image']; ?>" /></div>

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

<?php include 'footer.php'; ?>