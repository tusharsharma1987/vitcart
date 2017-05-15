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
	$i=1;
	foreach($_SESSION['cart'] as $cart)
	{
		$cart_detail[$i]=fetch_product_detail($cart,$user_id);
		$i++;
	}

$qr="insert into transaction_report (merchant, amount, product, status, transaction_date) values ('".$user_id."','".$total_amount."','".$product_ids."','0',date('Y-m-d H:i:s'))";
$qr_exe=mysql_query($qr);
$trans_id=mysql_insert_id();

$paypal_setting="select * from paypal_setting where user_id='".$user_id."'";
$paypal_exe=mysql_query($paypal_setting);
$paypal_data=mysql_fetch_array($paypal_exe);
$paypal_id=$paypal_data['paypal_id'];
//echo "<pre>";print_r($cart_detail);echo "</pre>";

//include ($theme_folder.'/cart.php');
?>
<html>
<div style="margin-top:150px; text-align:center">Please Wait while we redirect you to paypal website for payment.</div>
	<body onLoad="check_paypal();">
		<form method="post" name="paypal" id="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr"> 
			<input type="hidden" name="cmd" value="_cart"> 
            <input type="hidden" name="upload" value="1">
            <?php for($i=1;$i <= count($cart_detail); $i++){ ?>
			<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $cart_detail[$i]['store_prise']; ?>"> 
			<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $cart_detail[$i]['product_name']; ?>"> 
			<input name="item_number_<?php echo $i; ?>" type="hidden" value="<?php echo $cart_detail[$i]['id']; ?>">
            <?php } ?>
            <INPUT TYPE="hidden" NAME="return" value="http://projects.vitindia.com/paypal/paypal_return.php">
            <INPUT TYPE="hidden" NAME="notify_url" value="http://projects.vitindia.com/paypal/ipn.php">
            <INPUT TYPE="hidden" NAME="cancel_return" value="http://projects.vitindia.com/paypal/index.php">
            <INPUT TYPE="hidden" NAME="currency_code" value="USD">
            <input type="hidden" name="business" value="<?php echo $paypal_id; ?>"> 
			<input type="hidden" name="custom" value="<?php echo $trans_id; ?>">
		</form>
        <script language="javascript">
			function check_paypal()
			{
				document.getElementById("paypal").submit();
			}
		</script>
	</body>
</html>