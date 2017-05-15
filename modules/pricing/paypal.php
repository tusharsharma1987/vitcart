<?php
include("../../include/config.php");

/*echo "<pre>";

print_r($_SESSION);

echo "</pre>";
*/
$plan_id=$_SESSION['plan_id'];

$qr="select * from package where id='".$plan_id."'";

$qr_exe=mysql_query($qr);

$plan_data=mysql_fetch_array($qr_exe);



//echo $_SESSION['paypal']['user_name'];

$transaction_qr="insert into package_purchase (amount, package_plan, member_id) values('".$plan_data['plan_price']."','".$plan_data['id']."','".$_SESSION['paypal']['new_user_id']."')";

$execute_qr=mysql_query($transaction_qr);

$store_transaction_id=mysql_insert_id();

?>

<html>

	<body onLoad="check_paypal();">

		<form method="post" name="paypal" id="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr"> 

			<input type="hidden" name="cmd" value="_xclick"> 

			<input type="hidden" name="amount" value="<?php echo $plan_data['plan_price']; ?>"> 

			<input type="hidden" name="item_name" value="<?php echo $plan_data['plan_name']; ?>"> 

			<input name="item_number" type="hidden" value="<?php echo $plan_data['id']; ?>">

            <INPUT TYPE="hidden" NAME="return" value="http://localhost/vitcart/modules/confirmation/confirmation.php?return=gdjhfjdk">

            <INPUT TYPE="hidden" NAME="cancel_return" value="http://localhost/vitcart/modules/pricing/index.php">

            <INPUT TYPE="hidden" NAME="currency_code" value="USD">

            <INPUT TYPE="hidden" NAME="notify_url" value="http://localhost/vitcart/modules/confirmation/ipn.php">

            <input type="hidden" name="business" value="tushky_1348452477_biz@gmail.com"> 

			<input type="hidden" name="custom" value="<?php echo $store_transaction_id; ?>"> 

		</form>

        <script language="javascript">

			function check_paypal()

			{

				document.getElementById("paypal").submit();

			}

		</script>

	</body>

</html>