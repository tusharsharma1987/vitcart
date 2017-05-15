<?php include 'header.php';
$total_price=0;
//print_r($_SESSION['cart']);
 ?>

<div id="wrapper">

<!-- start page -->

<div id="page">

	<!-- start content -->

	<div id="content">

		<div class="post">

			<h2 class="title"><a href="#">Cart Detail</a></h2>

			

			<div class="entry">
            <?php if(count($cart_detail) > 0){ foreach($cart_detail as $cart_items) { if($cart_items['image1']==""){ $cart_items['image1']="noimage.jpg";}?>
				<div style="height: 100px; border: 1px solid; width: 900px; margin: 5px; margin-top:15px;">
                	<div style="float:left; padding:5px">
                		<img src="<?php echo SITE_URL ?>images/products/<?php echo $cart_items['image1']; ?>" width="90" />
                    </div>
                	<div style="float:left; padding-left:15px; width:500px;">
                		<?php echo $cart_items['product_name']; ?>
                    </div>
                	<div style="float:left; padding-left:15px; width:100px; padding-top:35px;">
                		$<?php echo number_format($cart_items['store_prise'],2); ?>
                    </div>
                	<div style="float:right; padding-left:15px; width:100px; padding-top:35px;">
                		<span class="buynow" onClick="delete_cart('<?php echo $cart_items['id']; ?>')">Delete</span>
                    </div>
                    <div style="clear:both"></div>
                </div>
			
			<?php $total_price=$total_price + $cart_items['store_prise'];} ?>
            
            <div style="width: 900px; margin: 5px; margin-top:0px;">
                	<div style="float:left; padding:5px">
                		&nbsp;
                    </div>
                	<div style="float:left; padding-left:15px; width:405px;">
                		&nbsp;
                    </div>
                	<div style="float:left; padding-left:15px; width:150px; padding-top:35px;">
                		Total Amount: $<?php echo number_format($total_price,2); ?>
                    </div>
                	<div style="float:right; padding-left:15px; width:100px; padding-top:35px;">
                		<span class="buynow" onClick="checkout()">Checkout</span>
                    </div>
                    <div style="clear:both"></div>
                </div>
            	<?php } else { 
					echo "<div style='width:900px; margin-top:100px; text-align:center'>No Product In cart</div>";
					} ?>
            </div>
            <div style="clear:both"></div>
				
		</div>

		

		

	</div>

	<!-- end content -->

	<div style="clear: both;">&nbsp;</div>

</div>

<!-- end page -->

</div>

<?php include 'footer.php'; ?>