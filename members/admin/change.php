<?php
session_start();
$pagename='password';
include 'header.php';
$error="";
if(isset($_POST['submit']) && $_POST['submit'] == "submit")
	{
	$opwd=$_POST['opwd'];
	$npwd=$_POST['npwd'];
	$cnpwd=$_POST['cnpwd'];
	if($opwd=="")
		{
			$error="Required Fileds are Blank";
		}
	elseif($npwd=="")
		{
			$error="Required Fileds are Blank";
		}
	elseif($cnpwd=="")
		{
			$error="Required Fileds are Blank";
		}
	elseif($npwd!=$cnpwd)
		{
			$error="New Password is not same as Confirm Password";
		}
	elseif($npwd==$opwd)
		{
			$error="New Password can't be same as Old Password";
		}
	else
		{
		$sql_check=mysql_query("select * from admin where id =1");
		$data_admin=mysql_fetch_array($sql_check);
		$password=$data_admin['password'];
		
		if($password != $opwd)
			{
				$error = "Old Password is not Correct";
			}
		else
			{
			$sql_chamge=mysql_query("update admin set password = '".$npwd."', passwordmd5 = '".md5($npwd)."'");
			?>
			<script language="javascript">
				window.location.href="message.php?msg=6";
			</script>
			<?php
			}
		}

	}
?>
<div style="min-height:500px">
	<div style="text-align:center; padding-top:50px; font-size:24px; font-weight:bold">Change Password</div>
	<div style="text-align:center; padding-top:10px; font-size:12px; color:red; font-weight:bold"><?php echo $error; ?></div>
	<div style="width:600px; padding-left:400px; ">
     <form action="" method="post" enctype="multipart/form-data" name="form2" id="form2" onSubmit="return validate();">
			  <table width="80%" height="142" border="0" align="center" style="padding-top:20px">
                <tr>
                  <td width="30%" height="34" ><span style="font-size:12px">OLD PASSWORD </span></td>
                  <td width="70%"><input name="opwd" type="password" id="opwd" onKeyPress="return numValid(tp);" value="<?php if(isset($_SESSION['opwd'])){ echo $_SESSION['opwd'];} ?>"/></td>
                </tr>
                <tr>
                  <td height="29"  ><span style="font-size:12px">NEW PASSWORD </span></td>
                  <td><b><font color="#0000FF" >
                    <input name="npwd" type="password" id="npwd" onKeyPress="return charValid();" value="<?php if(isset($_SESSION['npwd'])){ echo $_SESSION['npwd'];} ?>"/>
                  </font></b></td>
                </tr>
                <tr>
                  <td height="27" ><span style="font-size:12px">CONFIRM PASSWORD </span></td>
                  <td><input name="cnpwd" type="password" id="cnpwd" value="<?php if(isset($_SESSION['cnpwd'])){ echo $_SESSION['cnpwd'];} ?>"/></td>
                </tr>
                <tr>
                  <td height="42">&nbsp;</td>
                  <td><input type="image" src="images/submit_c.png" onClick="return validate();"/>
				  <input name="submit" value="submit" type="hidden" /></td>
                </tr>
        </table>
              <p align="center">&nbsp;</p>
      </form>
	</div>
	
</div>
<?php
include 'footer.php';
?>
<script language="javascript">
	function validate()
		{
		if(document.form2.opwd.value=="")
			{
				alert("Passowrd can't be blank");
				document.form2.opwd.focus();
				return false;
			}
		if(document.form2.npwd.value=="")
			{
				alert("New Passowrd can't be blank");
				document.form2.npwd.focus();
				return false;
			}
		if(document.form2.cnpwd.value=="")
			{
				alert("Confirm Passowrd can't be blank");
				document.form2.cnpwd.focus();
				return false;
			}
		if(document.form2.cnpwd.value!=document.form2.npwd.value)
			{
				alert("New Password is not same as confirm password");
				document.form2.npwd.focus();
				return false;
			}
		if(document.form2.opwd.value==document.form2.npwd.value)
			{
				alert("New Password can't be same as old Password");
				document.form2.npwd.focus();
				return false;
			}

		}
</script>