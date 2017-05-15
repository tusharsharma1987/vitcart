<?php
session_start();
$pagename='poet';

include 'header.php';
include 'dbc.php';
//print_r($_POST);
if(isset($_POST['add']) && $_POST['add']=="add")
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$address1=$_POST['address1'];
		$address2=$_POST['address2'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$zip=$_POST['zip'];
		$poet_type=$_POST['poet_type'];
		$phone=$_POST['phone'];
		$country=$_POST['country'];
		
			//header("location:message.php?msg=2");
			?> 
		<script language=javascript>
		//window.location.href="message.php?msg=2";
		
		</script>
		<?php
		$photo_poet="";
			if(isset($_FILES['cfile']['name'] ) )
					{	
					
					//print_r($_FILES);
						if($_FILES['cfile']['error'] == '1' || $_FILES['cfile']['size'] > "900000")
							{
							?>
							<div style="text-align:center; padding-top:10px; margin-bottom:0px; color:#FF0000; font-weight:bold">Image Size is more, please insert small image of less than 900 kb</div>
							<div align="center"><a href="history(-1)">Click Here</a> to Go back</div>
							<?php
							exit;
							}
						else
							{ 
							if($_FILES['cfile']['name'] != "" )
								{
								$type=explode("/",$_FILES['cfile']['type']);
								if($type[0]=="image")
								{
								include('SimpleImage.php');
								$image1 = new SimpleImage();
								$image1_load=$_FILES['cfile']['name'];
								$image1->load($_FILES['cfile']['tmp_name']);
								$name1=explode('.',$image1_load);
								$photo1=date('s').md5($name1[0]).".".$name1[1];
								$image1->resize(110,140);
								$image1->save('poets/'.$photo1);
								$photo_poet=$photo1;
								//$contact_image=mysql_query("update contactus set photo='$photo1'") or die(mysql_error());
								}
							}
						}
					}
						$insert_contact=mysql_query("insert into poets (name,poet_type,address,phone,photo) values ('".ucfirst($fname)." ".ucfirst($lname)."','".$poet_type."','".$address1.", ".$address2.",<br>".$city.",".$state." - ".$zip.",".$country."','".$phone."','".$photo_poet."')");
					//$update_contact=mysql_query("update contactus set fname='".$fname."',lname='".$lname."',address1='".$address1."',address2='".$address2."',city='".$city."',state='".$state."',country='".$country."',phone='".$phone."',zip='".$zip."',poet_type='".$poet_type."'");
				//header("location:message.php?msg=3");
				?> 
			<script language=javascript>
			window.location.href="message.php?msg=13";
			
			</script>
	
		<?php			
	}
if(isset($_POST['edits']) && $_POST['edits']=="edits")
	{
		$id=$_POST['id'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$address1=$_POST['address1'];
		$address2=$_POST['address2'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$zip=$_POST['zip'];
		$poet_type=$_POST['poet_type'];
		$phone=$_POST['phone'];
		$country=$_POST['country'];
		
			{
			
			if(isset($_FILES['cfile']['name'] ) )
					{	
					//print_r($_FILES);
						if($_FILES['cfile']['error'] == '1' || $_FILES['cfile']['size'] > "900000")
							{
							?>
							<div style="text-align:center; padding-top:10px; margin-bottom:0px; color:#FF0000; font-weight:bold">Image Size is more, please insert small image of less than 900 kb</div>
							<div align="center"><a href="history(-1)">Click Here</a> to Go back</div>
							<?php
							exit;
							}
						else
							{ 
							if($_FILES['cfile']['name'] != "" )
								{
								$type=explode("/",$_FILES['cfile']['type']);
								if($type[0]=="image")
								{
								include('SimpleImage.php');
								$image1 = new SimpleImage();
								$image1_load=$_FILES['cfile']['name'];
								$image1->load($_FILES['cfile']['tmp_name']);
								$name1=explode('.',$image1_load);
								$photo1=date('s').md5($name1[0]).".".$name1[1];
								$image1->resize(110,140);
								$image1->save('poets/'.$photo1);
								$contact_image=mysql_query("update poets set photo='".$photo1."' where id='".$id."'") or die(mysql_error());
								}
							}
						}
					}
					//echo "update poets set name='".ucfirst($fname)." ".ucfirst($lname)."'',address='".$address1.", ".$address2.",".$city.",".$state." - ".$zip.",".$country."',phone='".$phone."',poet_type='".$poet_type."' where id='".$id."'";
					$update_contact=mysql_query("update poets set name='".ucfirst($fname)." ".ucfirst($lname)."',address='".$address1.", ".$address2.",".$city.",".$state." - ".$zip.",".$country."',phone='".$phone."',poet_type='".$poet_type."' where id='".$id."'") or die(mysql_error());
				//header("location:message.php?msg=3");
				?> 
			<script language=javascript>
			window.location.href="message.php?msg=14";
			
			</script>
	
		<?php			
		}
	}
?>
<div style="min-height:500px">
<div align="center" style="font-size:26px; font-weight:bold; padding-top:30px">Add Poets</div>
 <?php 
			include 'dbc.php';
			if(isset($_GET['id']))
			{
			$sql=mysql_query("select * from poets where id='".$_GET['id']."'");
			//echo mysql_num_rows($sql);
			$data=mysql_fetch_array($sql);
			//print_r($data);
			if($data['photo']=="")
				{
				$photo="";
				}
				else
				{
				$photo=$data['photo'];
				}
				$name=$data['name'];
				$name_exp=explode(" ",$name);
				$fname=$name_exp[0];
				$lname=$name_exp[1];
				$address=$data['address'];
				$add_exp=explode(",",$address);
				$add_len=sizeof($add_exp);
				$address1=$add_exp[0];
				$address2=$add_exp[1];
				$add_last=explode("-",$add_exp[($add_len-2)]);
				$zip=$add_last[1];
				$country=$add_exp[($add_len-1)];
				$state=$add_last[0];
				$city=$add_exp[($add_len-3)];
			}
			?></p>
            <div align="right" class="add_item"><a href="poets.php" >Poets List</a></div>
			<div align="center">
			<form action="" method="post" enctype="multipart/form-data" name="contact">
			<table  border="0">
			<tr>
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
						<td><strong>Poet Type</strong></td>
						<td><strong><input name="poet_type" type="text" value="<?php if(isset($poet_type)){echo $poet_type;}else { echo $data['poet_type']; } ?>" size="30" /></strong></td>
					</tr>
					<tr>
						<td><strong>Contact Number </strong></td>
						<td><strong><input name="phone"  type="text" value="<?php if(isset($phone)){echo $phone;}else { echo ucfirst($data['phone']); }?>" size="30" /></strong></td>
					</tr>
                    <tr>
						<td><strong>Poet's Photo</strong></td>
                    	<td><input type="file" name="cfile" /></td>
                    </tr>
					<tr>
						<td><strong>&nbsp;</strong></td>
						<?php if(isset($_GET['id'])){ ?>
						<input type="hidden" name="edits" value="edits" />
						<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
						<td><strong> <input type="image" name="Edit" id="Edit" src="images/edit.png"></strong></td>
                        <?php }else { ?>
						<input type="hidden" name="add" value="add" />
						<td><strong> <input type="image" name="Add" id="Add" src="images/submit_c.png"></strong></td>
                        <?php } ?>
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