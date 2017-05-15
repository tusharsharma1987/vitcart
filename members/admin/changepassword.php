<?php
session_start();
$pagename='packages';
include 'header.php';
include 'dbc.php';
$error="";
?>

<?php
	if(isset($_POST['submit']))
	{
		$enteredoldpwd=$_POST["oldpassword"];
		$enterednewpwd=$_POST["newpassword1"];
		
		$re_enterednewpwd=$_POST["newpassword2"];
		$encriptedold=md5($enteredoldpwd);
			
		$qr="select * from member where id='".$_SESSION['id']."'";
		$execute=mysql_query($qr);
		$pwd=mysql_fetch_array($execute);
		$oldpassword=$pwd['password'];
		
		if($enteredoldpwd=="")
		{
			$error="Please Enter Old Password";
		}elseif($enterednewpwd=="")
		{
			$error="Please Enter New Password";
		}elseif($re_enterednewpwd=="")
		{
			$error="Please verify New Password";
		}else
		{
			if($encriptedold==$oldpassword)
			{
				if($enterednewpwd==$re_enterednewpwd)
				{
					$encripted_re_entered=md5($re_enterednewpwd);
					$qr="update member SET password='$encripted_re_entered' where id='".$_SESSION['id']."'";
					mysql_query($qr);
					$_SESSION['success']="Password Changed Successfully";
					header("location:profile.php");	
				}
				else
					$error="New Password is not verfied";
			}
			else
				$error= "Old Password is incorrecct, Entere correct password";
		}
	}
	
		
?>

<form action="" method="post">
<div class="page_title">Profile</div>
<div class="error_text"><?php echo $error; ?></div>
<div style="padding-top:30px; padding-left:30%;">
	<div>	
		<div class="titlefloat">Enter Old Password: </div>
		<div class="padding"><input type="password" name="oldpassword" value="<?php echo $_POST['oldpassword']; ?>" /></div>
		<div class="clear"></div>
	</div>
	<div>	
		<div class="titlefloat">Enter New Password: </div>
		<div class="padding"><input type="password" name="newpassword1" value="<?php echo $_POST['newpassword1']; ?>" /></div>
		<div class="clear"></div>
	</div>
	<div>	
		<div class="titlefloat">Re-enter New Password: </div>
		<div class="padding"><input type="password" name="newpassword2" value="<?php echo $_POST['newpassword2']; ?>" /></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">&nbsp;</div>
		<div class="padding"><input type="submit" name="submit" id="submit_id" value="Update"/></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div style="padding-left:150px"><a href="profile.php">Go back to previous page</a></div>
		<div class="clear"></div>
	</div>
</div>
</form>
<div class="clear"></div>



<?php
include 'footer.php';
?>
