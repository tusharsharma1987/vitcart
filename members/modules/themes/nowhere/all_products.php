<?php include 'header.php'; ?>
<div id="wrapper">

<!-- start page -->

<div id="page">

	<!-- start content -->

	<div id="content">

		<div class="post">

			<h2 class="title"><a href="#">All Products</a></h2>

			<div style="margin-top:15px">&nbsp;</div>
			<?php include 'sidebar.php'; ?>
			<div class="entry" style="float:left; width:700px;">
			<?php  if($total_product > 0) {	while($all_products=mysql_fetch_array($products_exec)) { if($all_products['image1']=="") {$all_products['image1']="noimage.jpg";} ?>
                <div onclick="show_product('<?php echo $all_products['id']; ?>');" style="float:left; cursor:pointer; margin:5px; width:200px; margin-left:20px; border:2px solid #f0f0f0;">
                	<div style="position:absolute; background: none repeat scroll 0 0 #EEEEEE; text-align: center; width: 194px; padding:3px; color:#000"><span style="text-decoration:line-through"><?php echo "$".number_format($all_products['annual_prise'],2); ?></span> &nbsp; &nbsp; &nbsp; <?php echo "$".number_format($all_products['store_prise'],2)." (".$all_products['discount']."% off) "; ?></div>
                    <div><img src="<?php echo SITE_URL; ?>images/products/<?php echo $all_products['image1']; ?>" width="200" /></div>
            		<?php  ?>
                    <div style="position:absolute; background: none repeat scroll 0 0 #EEEEEE;margin-top: -30px; text-align: center; width: 194px; padding:3px; color:#000"><?php echo ($all_products['product_name']); ?></div>
            
                </div>
                <?php } } else {?>
                <div align="center">No products for this Category</div>
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