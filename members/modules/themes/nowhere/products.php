<?php include 'header.php'; ?>
<div id="wrapper">

<!-- start page -->

<div id="page">

	<!-- start content -->

	<div id="content">

		<div class="post">

			<h2 class="title"><a href="#"><?php echo ucfirst($product_detail['product_name']); ?></a></h2>

			<div style="margin-top:-5px">&nbsp;</div>
			<?php //include 'sidebar.php'; ?>
			<div class="entry" style="float:left; width:900px;">
			<?php  if($product_presence == 1) { if($product_detail['image1']==""){$product_detail['image1']="noimage.jpg";}	?>
            	<div style="min-height:300px;">
                	<div style="margin-bottom:15px;">All Products -> <?php echo $category_name; ?> -> <?php echo $sub_category; ?> -> <?php echo ucfirst($product_detail['product_name']); ?></div>
                	<div style="float:left">
                    	<img src="<?php echo SITE_URL; ?>images/products/<?php echo $product_detail['image1']; ?>" />
                    </div>
                    <div style="float:left; margin-left:15px;">
                    	<div style="font-weight:bold; font-size:24px"><?php echo ucfirst($product_detail['product_name']); ?></div>
                        <div style="font-weight:bold; font-size:12px;"><?php echo $product_detail['brand_name']; ?></div>
                        <div style="font-weight:bold; font-size:14px;"><?php echo $product_detail['short_description']; ?></div>
                        <div style="margin-top:-10px;">&nbsp;</div>
                        <div style="font-weight:bold; font-size:14px; text-decoration:line-through">M.R.P. : $ <?php echo number_format($product_detail['annual_prise'],2); ?></div>
                        <div style="font-weight:bold; font-size:14px;">Discount : <?php echo $product_detail['discount']."%"; ?></div>
                        <div style="font-weight:bold; font-size:14px;">Our Price : $ <?php echo number_format($product_detail['store_prise'],2); ?></div>
                        <div style="font-weight:bold; font-size:14px;">Stock : <?php if($product_detail['quantity'] > 0) {echo "Present";} else { echo " Out Of Stock";} ?></div>
                        <div class="buynow" onclick="buy_now('<?php echo $product_detail['id'] ?>')">Buy Now</div>
                    </div>
                    <div style="clear:both"></div>
                    <div style="text-align:justify">
                    	<div style="text-align:justify; font-size:20px;">Product Description</div>
						<?php 
						$long_description=str_replace("\n","<br>",$product_detail['long_description']);
						echo $long_description; ?>
                    </div>
                </div>
                <?php } else {?>
                <div align="center">There is no such product Present in the store.</div>
                <?php } ?>				
			</div>
			<div style="clear: both;">&nbsp;</div>
		</div>

	</div>

	<!-- end content -->

	<div style="clear: both;">&nbsp;</div>

</div>

<!-- end page -->

</div>

<?php include 'footer.php'; ?>