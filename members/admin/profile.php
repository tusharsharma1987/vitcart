<?php
session_start();
$pagename='profile';
include 'header.php';
include 'dbc.php';


if(isset($_POST) && !empty($_POST))
{
	$updatefullname=$_POST['profile_fullname'];
	$updateaddress=$_POST['profile_address'];
	$updatelocation=$_POST['profile_location'];
	$updatezipcode=$_POST['profile_zipcode'];
	$updatecountry=$_POST['profile_country'];
	$updatepackage=$_POST['profile_package'];
	$updatephone=$_POST['profile_phone'];
	$updatetheme=$_POST['profile_theme'];
	
	
	$updateqr="update member SET full_name='$updatefullname',address='$updateaddress',location='$updatelocation',zipcode='$updatezipcode',phone='$updatephone',country='$updatecountry',package='$updatepackage',theme='$updatetheme' where id='".$_SESSION['id']."'";
	
	mysql_query($updateqr);
	$_SESSION['success']="Profile Updated Successfully";
	//header("location:profile.php");
}
	$qr="select * from member where id='".$_SESSION['id']."'";
	$select=mysql_query($qr);
	
	$data=mysql_fetch_array($select);
	$id=$data['id'];
	
	$username=$data['user_name'];
	$fullname=$data['full_name'];
	$storename=$data['store_name'];
	$address=$data['address'];
	$location=$data['location'];
	$zipcode=$data['zipcode'];
	$email=$data['email'];
	$phone=$data['phone'];
	$country=$data['country'];
	$createddate=$data['created_date'];
	$updateddate=$data['updated_date'];
	$package=$data['package'];
	$theme=$data['theme'];
	$status=$data['status'];
	


?>


<div>
<form action="#" method="post" enctype="multipart/form-data">
<div class="page_title">Profile</div>
	<?php if(isset($_SESSION['success']) && $_SESSION['success']!="") { ?><div class="success_text"><?php echo $_SESSION['success']; ?></div><?php $_SESSION['success']="";} ?>
	<div style="padding-top:30px; padding-left:30%;">
	<div >
		<div class="titlefloat">User Name: </div>
		<div class="padding"><input type="text" name="profile_username" id="profile_username_id" value="<?php echo $username; ?>" readonly/></div>
		<div class="clear"></div>
	</div>
	
	<div >	
		<div class="titlefloat">Full Name: </div>
		<div class="padding"><input type="text" name="profile_fullname" id="profile_fullname_id" value="<?php echo $fullname; ?>"/></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">Store Name: </div>
		<div class="padding"><input type="text" name="profile_storename" id="profile_storename_id" value="<?php echo $storename; ?>" readonly/></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">Address: </div>
		<div class="padding"><textarea name="profile_address" rows="6" cols="20" id="profile_address_id"><?php echo $address; ?></textarea></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">Location: </div>
		<div class="padding"><input type="text" name="profile_location" id="profile_location_id" value="<?php echo $location; ?>"/></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">Zip Code: </div>
		<div class="padding"><input type="text" name="profile_zipcode" id="profile_zipcode_id"  value="<?php echo $zipcode; ?>"/></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">Email: </div>
		<div class="padding"><input type="text" name="profile_email" id="profile_email_id"  value="<?php echo $email; ?>" readonly/></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">phone: </div>
		<div class="padding"><input type="text" name="profile_phone" id="profile_phone_id" value="<?php echo $phone; ?>" /></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">Country: </div>
		<div class="padding"><input type="text" name="profile_country" id="profile_country_id"  value="<?php echo $country; ?>"/></div>
		<div class="clear"></div>
	</div>	
	<div >	
		<div class="titlefloat">package: </div>
		<div class="padding"><input type="text" name="profile_package" id="profile_package_id"  value="<?php if($package==1){echo 'Economy Plan';} else{echo 'Business plan';}?>"/></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">Theme: </div>
		<div class="padding"><input type="text" name="profile_theme" id="profile_theme_id"  value="<?php echo $theme; ?>"/></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">Ststus: </div>
		<div class="padding"><input type="text" name="profile_ststus" id="profile_status_id"  value="<?php if($status==0){echo 'Deactive';} else if($ststus==1){echo 'Active';} else{echo 'Deleted';} ?>"/></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">&nbsp;</div>
		<div class="padding"><input type="submit" name="submit" id="submit_id" value="Update"/></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div style="padding-left:150px"><a href="changepassword.php">Want To Change password??</a></div>
		<div class="clear"></div>
	</div>
	
</div>
</form>
<div class="clear"></div>



<?php
include 'footer.php';
?>
