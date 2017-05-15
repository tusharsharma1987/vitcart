<?php
session_start();
$pagename='contact';

include 'header.php';
include 'dbc.php';
if(isset($_POST['edits']) && $_POST['edits']=="edit")
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$address1=$_POST['address1'];
		$address2=$_POST['address2'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$zip=$_POST['zip'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$country=$_POST['country'];
		
		$check=mysql_query("select * from contactus where id=1");
		$record=mysql_num_rows($check);
		if($record<=0)
			{
			$insert_contact=mysql_query("insert into contactus (fname,lname,email,address1,address2,city,state,zip,country,phone) values ('".$fname."','".$lname."','".$email."','".$address1."','".$address2."','".$city."','".$state."','".$zip."','".$country."','".$phone."')");
			//header("location:message.php?msg=2");
			?> 
		<script language=javascript>
		window.location.href="message.php?msg=2";
		
		</script>
		<?php
			}
		else
			{
				$update_contact=mysql_query("update contactus set fname='".$fname."',lname='".$lname."',address1='".$address1."',address2='".$address2."',city='".$city."',state='".$state."',country='".$country."',phone='".$phone."',zip='".$zip."',email='".$email."'");
				//header("location:message.php?msg=3");
				?> 
			<script language=javascript>
			window.location.href="message.php?msg=3";
			
			</script>
	
		<?php			
		}
	}
?>
<div style="min-height:500px">
<div align="center" style="font-size:26px; font-weight:bold; padding-top:30px">Contact Us</div>
 <?php 
			include 'dbc.php';
			$sql=mysql_query("select * from contactus");
			//echo mysql_num_rows($sql);
			$data=mysql_fetch_array($sql);
			?></p>
			<div align="center">
			<form action="" method="post" enctype="multipart/form-data" name="contact">
			<table  border="0">
			<tr>
				<td width="125"><div></div> <div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>				</td>
				<td width="600">
					<table width="500" border="0">
						<tr>
						<td width="124"><strong>Name </strong></td>
						<td width="400"><strong><input name="fname" type="text" value="<?php if(isset($fname)){echo $fname;}else {echo ucfirst($data['fname']);}?>" /> &nbsp;<input name="lname" type="text" value="<?php if(isset($lname)){echo $lname;}else { echo ucfirst($data['lname']); }?>"/></strong></td>
					</tr>
					<tr>
						<td><strong>Address</strong></td>
						<td><strong><input name="address1" size="30" type="text" value="<?php if(isset($address1)){echo $address1;}else { echo ucfirst($data['address1']); }?>" /></strong></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><strong><input name="address2" size="30" type="text" value="<?php if(isset($address2)){echo $address2;}else { echo ucfirst($data['address2']); }?>" /></strong></td>
					</tr>
					<tr>
						<td><strong>City</strong></td>
						<td><strong><input name="city" size="30" type="text" value="<?php if(isset($city)){echo $city;}else { echo ucfirst($data['city']); }?>" /></strong></td>
					</tr>
					<tr>
						<td><strong>State</strong></td>
						<td><strong><input name="state" size="30" type="text" value="<?php if(isset($state)){echo $state;}else { echo ucfirst($data['state']); }?>" /></strong></td>
					</tr>
					<tr>
						<td><strong>Country</strong></td>
						<td><strong><input name="country" size="30" type="text" value="<?php if(isset($country)){echo $country;}else { echo ucfirst($data['country']); } ?>" /></strong></td>
					</tr>
					<tr>
						<td><strong>Zipcode</strong></td>
						<td><strong><input name="zip" size="30" type="text" value="<?php if(isset($zip)){echo $zip;}else { echo ucfirst($data['zip']); } ?>" /></strong></td>
					</tr>
					<tr>
						<td><strong>email-id</strong></td>
						<td><strong><input name="email" type="text" value="<?php if(isset($email)){echo $email;}else { echo $data['email']; } ?>" size="30" /></strong></td>
					</tr>
					<tr>
						<td><strong>Contact Number </strong></td>
						<td><strong><input name="phone"  type="text" value="<?php if(isset($phone)){echo $phone;}else { echo ucfirst($data['phone']); }?>" size="30" /></strong></td>
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