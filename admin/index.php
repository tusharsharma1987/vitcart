<?php
include 'dbc.php';
$admin=mysql_query("select * from admin_user");
$check=mysql_num_rows($admin);
if($check!=1)
{

	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Admin Registration</title>
	<style type="text/css">
	<!--
	.style1 
	{
		color: #66FF99;
		font-weight: bold;
		font-size: 24px;
	}
	.style2 {font-size: 12px}
	.style4 {font-size: 12px}
	.style4 {color: darkblue}
	-->
	</style>
	</head>
	
	<body style="background-color:grey">
	<p align="center" class="style1"><table border="0" align="center" > <td><div style="display:inline;vertical-align:middle;"><img src="images/settingsev4.png" width="60px" title="Contro panel" height="60px"/></div></td><td>&nbsp;&nbsp;<div style="vertical-align:middle; display:inline" ><font size="+3" color="#FFFFFF">Control panel Registration</font></div> </p></td></table></p>
	<?php
	
	
	if(isset($_POST['Submit']))
	{
		//echo "recover";
		$username=$_POST['username'];
		$question=$_POST['question'];
		$answer=$_POST['answer'];
		$password=$_POST['password'];
		$passwordmd5=md5($password);;
		$k=0;
		if($_POST['username']=='')
		{
			echo "<p align=center style=color:darkblue;><b>Please Enetr Username</b></p>";
			$k=1;
		}
				
		if($_POST['password']=='')
		{
			echo "<p align=center style=color:darkblue;><b>Please Enetr Password</b></p>";
			$k=1;
		}
		
		if($_POST['conpassword']=='')
		{
			echo "<p align=center style=color:darkblue;><b>Please Confirm Password</b></p>";
			$k=1;
		}
		
		if($_POST['password']!='' && $_POST['conpassword']!='' && $_POST['password']!=$_POST['conpassword'])
		{
			echo "<p align=center style=color:darkblue;><b>New Password Do not get confirmed</b></p>";
			$k=1;
		}
		
		if($_POST['question']=='Select The Question')
		{
			echo "<p align=center style=color:darkblue;><b>Please Select The Question</b></p>";
			$k=1;
		}
		
		if($_POST['answer']=='')
		{
			echo "<p align=center style=color:darkblue;><b>Empty Answer</b></p>";
			$k=1;
			//require_once('recover.php');
			//exit;
		}
		
		if($k!=1)
		{
				//echo "success";
				$update=mysql_query("insert into admin_user(user_name,password,question,answer,update_date)values('".$username."','".$passwordmd5."','".$question."','".$answer."','".date("Y-m-d")."')") or die (mysql_error());
			//echo "tushar";
			//exit;
		//	if($nojs==1)
			{
				echo "<p align=center style=color:#66FF99><b>You are registered. <a href=index.php>Click Here To Login</a></b></p>";
				exit;
			}
		?>
		<script language=javascript>
		//window.location.href="index.php";
		
		</script>
		<?php
		
		}
		else
		{
			//echo "fail";
			
			?>
			<div align="center">
			<?php if($k!=1){ echo "<b style=color:darkblue;>OOPS!!!  Authentication Denied!!!!</b>"; }?>
			<?php
		}
	}
	
	else
	{
		?>
		<div align="center">
		<form action="" method="post" enctype="multipart/form-data" name="recover" class="style1" onSubmit="return validate();">
		  
		  <p class="style4">(This Registration goes for one time only So keep remember the details) </p>
		  <table width="401" border="0">
			<tr>
			  <td><span class="style2">Username</span></td>
			  <td><input name="username" type="text" id="username" value="<?php if(isset($_POST['Submit'])){ echo $_POST['username'];} ?>"/></td>
			</tr>
			<tr>
			  <td><span class="style2">Password </span></td>
			  <td><input name="password" type="password" id="password" /></td>
			</tr>
			<tr>
			  <td><span class="style2">Confirm Password </span></td>
			  <td><input type="password" name="conpassword" /></td>
			</tr>
			<tr>
			  <td width="134"><span class="style2">Security Question</span> </td>
			  <td width="257"><select name="question" id="question" >
				<option>Select The Question</option>
				<option value="spouse" <?php if(isset($_POST['Submit']) && ($_POST['question']=="spouse")){ echo "selected";} ?>>What is your spouse name?</option>
				<option value="sport" <?php if(isset($_POST['Submit']) && ($_POST['question']=="sport")){ echo "selected";} ?>>Which is your favorite sport?</option>
				<option value="city" <?php if(isset($_POST['Submit']) && ($_POST['question']=="city")){ echo "selected";} ?>>Which is your favorite city?</option>
				<option value="teacher" <?php if(isset($_POST['Submit']) && ($_POST['question']=="teacher")){ echo "selected";} ?>>What is your first teacher name?</option>
			  </select>      </td>
			</tr>
			<tr>
			  <td><span class="style2">Answer</span></td>
			  <td><input name="answer" type="text" id="answer" value="<?php if(isset($_POST['Submit'])){ echo $_POST['answer'];} ?>"/></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="Submit" type="submit" id="Submit" value="Submit" /></td>
			</tr>
		  </table>
		  <p class="style2">&nbsp;  </p>
		</form>
		<?php
	}
	
	?>
	</div>
	</body>
	</html>
	<script language="javascript">
	function validate()
	{
		
		if(document.recover.username.value=='')
		{
			alert('Please enter the username');
			document.recover.username.focus();
			return false;
		}
		
		if(document.recover.password.value=='')
		{
			alert('Please enter Password');
			document.recover.password.focus();
			return false;
		}
		
		if(document.recover.conpassword.value=='')
		{
			alert('Please Confirm Password');
			document.recover.conpassword.focus();
			return false;
		}
	
		if(document.recover.conpassword.value!=document.recover.password.value)
		{
			alert('New Password Did not get confirmed');
			document.recover.password.value='';
			document.recover.conpassword.value='';
			document.recover.password.focus();
			return false;
		}
		
		if(document.recover.question.value=='Select The Question')
		{
			alert('Please select the security question');
			document.recover.question.focus();
			return false;
		}
		
		if(document.recover.answer.value=='')
		{
			alert('Please answer the security question');
			document.recover.answer.focus();
			return false;
		}
		
		
		
	}
	</script>
	
	<?php
}
else
{
	session_start();
	if(!isset($_SESSION['uname']))
	{
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="logincss.css" rel="stylesheet" type="text/css" media="screen" />
		<title>Admin</title>
		</head>
		<body style="height:120%">
		
			<div class="header">
				<div class="header_text">VitCart Administrator Login</div>
			</div>
			
			<form name="login" method="post" action="logincode.php" >
			<div class="middle">
			
				<div align="center" class="error">
					 <?php
					   if(!isset($_POST['Submit']))
					   {
						   $error=0;
					   }
						if(isset($_POST['Submit']))
						{
							require_once('logincode.php');
						}
						
						if($error==1)
						{
						?>
							<script language="javascript">
							alert("Password Do not Match");
							</script>
							<?php
							echo "<br>Username and Password do not match";
								echo "<br> Please Try Again !";
							
						}
						
						if(isset($_GET['error']))
						{	
							echo "<br>Username and Password do not match";
							echo "<br> Please Try Again !";
						}
						
						
						if(isset($_GET['type']))
						{	
							$type=$_GET['type'];
							if($type==1)
							{
								echo "<br>Please enter Username";
							}
							if($type==2)
							{
								echo "<br>Please enter Password";
							}
							if($type==3)
							{
								echo "<br>Please enter Username";
								echo "<br>Please enter Password";
							}
						}
						?>
		
				</div>
					<div  class="login" align="center">
					<div class="username"> Username </div>
					<div class="textfield"><input name="mid" size="30" style="height:70%; margin-left:-47px; margin-top:2px; border:#FFFFFF" type="text" id="mid" value="<?php if(isset($_GET['name'])){echo $_GET['name'];}  ?>" /></div>
					<div class="username" style="margin-top:-160px" > Password</div>
					<div class="textfield"><input name="password" type="password" id="password" size="30" style="height:70%; margin-left:-47px; margin-top:2px; border:#FFFFFF" /></div><input type="hidden" name="submit" value="submit" />
					<div class="submit" align="center" onmouseover="this.style='color:#000000;'"> <input type="image" src="images/submit.png" onmouseover="this.src='images/submit_hover.png'" onmouseout="this.src='images/submit.png'" onclick="submitform()"></div>
					<div align="center" class="forgot">Forget Password? <a href="recover.php">Recover it </a></div>
				</div>
			</div>
			</form>
			<div class="footer">
			<div class="footer_text"> Website Developed by Vinayak Infotech</div>
			</div>
		 </body>
		</html>
		
		<?php
		//echo "tushar";
		//require_once('home_admin.php');
	}
	
	else
	{
		//echo "tushar";
		?>
		<script language=javascript>
		window.location.href="home_admin.php";
		//require_once('home_admin.php');
		</script>
		<?php
	}
}
?>