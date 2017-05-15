<?php
session_start();
$pagename='paypal';

include 'header.php';
include 'dbc.php';
if(isset($_POST['edits']) && $_POST['edits']=="edit")
	{
		$paypal_id=$_POST['paypal_id'];
		
		$check=mysql_query("select * from paypal_setting where user_id='".$_SESSION['id']."'");
		$record=mysql_num_rows($check);
		if($record<=0)
			{
			$insert_contact=mysql_query("insert into paypal_setting (paypal_id,user_id,updated_date) values ('".$paypal_id."','".$_SESSION['id']."','".date("Y-m-d H:i:s")."')");
			//header("location:message.php?msg=2");
			?> 
		<script language=javascript>
		window.location.href="message.php?msg=22";
		
		</script>
		<?php
			}
		else
			{
				$update_contact=mysql_query("update paypal_setting set paypal_id='".$paypal_id."',updated_date='".date("Y-m-d H:i:s")."' where user_id='".$_SESSION['id']."'");
				//header("location:message.php?msg=3");
				?> 
			<script language=javascript>
			window.location.href="message.php?msg=22";
			
			</script>
	
		<?php			
		}
	}
?>
<div style="min-height:500px">
<div align="center" style="font-size:26px; font-weight:bold; padding-top:30px">Paypal Setting</div>
 <?php 
			include 'dbc.php';
			$sql=mysql_query("select * from paypal_setting where user_id='".$_SESSION['id']."'");
			//echo mysql_num_rows($sql);
			$data=mysql_fetch_array($sql);
			$paypal_id=$data['paypal_id'];
			?></p>
			<div align="center">
			<form action="" method="post" enctype="multipart/form-data" name="contact">
			<table  border="0">
			<tr>
				<td width="125"><div></div> <div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>				</td>
				<td width="600">
					<table width="500" border="0">
						<tr>
						<td width="124"><strong>Paypal Id </strong></td>
						<td width="400"><strong><input name="paypal_id" type="text" value="<?php echo $paypal_id;?>" style="width:200px" /></strong></td>
					</tr>
					<tr>
						<td><strong>&nbsp;</strong></td>
						<input type="hidden" name="edits" value="edit" />
						<td><strong> <input type="image" name="Edit" id="Edit" src="images/edit.png"></strong></td>
					</tr>
				  </table>
			  </td>
			</tr>
		</table>	
		</form>
		</div>
</div>

<?php
include 'footer.php';
?>