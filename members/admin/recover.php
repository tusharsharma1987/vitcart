
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Recover Password</title>
<style type="text/css">
<!--
.style1 {
	color: #66FF99;
	font-weight: bold;
	font-size: 24px;
}
.style2 {font-size: 12px}
-->
</style>
</head>

<body style="background-color:grey">
<p align="center" class="style1">Recover Your Password</p>

<?php
include 'dbc.php';
if(isset($_POST['Recover']))
{
//echo "recover";
$question=$_POST['question'];
$answer=$_POST['answer'];
$password=$_POST['password'];
$passwordmd5=md5($password);;
$k=0;
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

if($_POST['password']=='')
{
echo "<p align=center style=color:darkblue;><b>Please Enetr New Password</b></p>";
$k=1;
}

if($_POST['conpassword']=='')
{
echo "<p align=center style=color:darkblue;><b>Please Confirm New Password</b></p>";
$k=1;
}

if($_POST['password']!='' && $_POST['conpassword']!='' && $_POST['password']!=$_POST['conpassword'])
{
echo "<p align=center style=color:darkblue;><b>New Password Do not get confirmed</b></p>";
$k=1;
}


$sql=mysql_query("select * from admin where question='$question' and answer='$answer'");
$count=mysql_num_rows($sql);
	if($count==1 && $k!=1)
		{
		//echo "success";
		$update=mysql_query("update admin set password='$password', passwordmd5='$passwordmd5' where question='$question'");
	//echo "tushar";
//	if($nojs==1)
		{
		echo "<p align=center style=color:#66FF99><b>Password Changed Successfully. <a href=index.php>Click Here To Login</a></b></p>";
		exit;}
		?>
<script language=javascript>
window.location.href="pchange.php";

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
//else
{
?>
<div align="center">
<form action="" method="post" enctype="multipart/form-data" name="recover" class="style1" onSubmit="return validate();">
  
  <table width="401" border="0">
    <tr>
      <td width="134"><span class="style2">Security Question</span> </td>
      <td width="257"><select name="question" id="question" >
        <option>Select The Question</option>
        <option value="spouse" <?php if(isset($_POST['Recover']) && ($_POST['question']=="spouse")){ echo "selected";} ?>>What is your spouse name?</option>
        <option value="sport" <?php if(isset($_POST['Recover']) && ($_POST['question']=="sport")){ echo "selected";} ?>>Which is your favorite sport?</option>
        <option value="city" <?php if(isset($_POST['Recover']) && ($_POST['question']=="city")){ echo "selected";} ?>>Which is your favorite city?</option>
        <option value="teacher" <?php if(isset($_POST['Recover']) && ($_POST['question']=="teacher")){ echo "selected";} ?>>What is your first teacher name?</option>
      </select>      </td>
    </tr>
    <tr>
      <td><span class="style2">Answer</span></td>
      <td><input name="answer" type="text" id="answer" value="<?php if(isset($_POST['Recover'])){ echo $_POST['answer'];} ?>"/></td>
    </tr>
    <tr>
      <td><span class="style2">New Password </span></td>
      <td><input type="password" name="password" /></td>
    </tr>
    <tr>
      <td><span class="style2">Confirm Password </span></td>
      <td><input type="password" name="conpassword" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Recover" value="Recover" /></td>
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
	
	if(document.recover.password.value=='')
	{
	alert('Please enter New Password');
	document.recover.password.focus();
	return false;
	}
	
	if(document.recover.conpassword.value=='')
	{
	alert('Please Confirm New Password');
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
	
	}
</script>