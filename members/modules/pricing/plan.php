<?php 
$page_name="plan";
include("../header.php");
function unique($table,$field,$value)
{
	$qr="select * from ".$table." where ".$field."='".$value."'";
	$qr_exe=mysql_query($qr) or die(mysql_error());
	$count=mysql_num_rows($qr_exe);
	if($count==0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
$error="";

if(isset($_POST['submit']) && $_POST['submit']==1)
{
	//Product options
	$storename=mysql_real_escape_string($_POST['txtstnm']);
	$username=mysql_real_escape_string($_POST['txtunm']);
	
	//Choose store setting
	$storesetting=mysql_real_escape_string($_POST['store']);
	
	//Personal Details
	$fullname=mysql_real_escape_string($_POST['txtfnm']);
	$address1=mysql_real_escape_string($_POST['txtadd1']);
	$address2=mysql_real_escape_string($_POST['txtadd2']);
	$location=mysql_real_escape_string($_POST['txtloc']);
	$zipcode=mysql_real_escape_string($_POST['txtpostal']);
	$phoneno=mysql_real_escape_string($_POST['txtph']);
	
	//Account detail
	$email=mysql_real_escape_string($_POST['txtmail']);
	$password=mysql_real_escape_string($_POST['txtpwd1']);
	$conpassword=mysql_real_escape_string($_POST['txtpwd2']);
	if($storename=="")
		$error.="Store name must be entered...<br />";
	else if(unique("member","store_name",$storename)==false)
		$error.="Store name already present...<br />";		
	else if($username=="")
		$error.="User name must be entered...<br />";	
	else if(unique("member","user_name",$username)==false)
		$error.="User name already present...<br />";		
	else if($fullname=="")	
		$error.="Full name must be entered...<br />";
	else if($address1=="")
		$error.="Address one must be entered...<br />";
	else if($address2=="")
		$error.="Address two must be entered...<br />";
	else if($location=="")
		$error.="Location must be entered...<br />";
	else if($zipcode=="")
		$error.="Zip code must be entered...<br />";
	else if($phoneno=="")
		$error.="Phone number must be entered...<br />";
	else if(!is_numeric($phoneno))
		$error.="Phone number must be in digit...<br />";
	else if($email=="")
		$error.="Email address must be entered...<br />";
	else if($password=="")
		$error.="Password must be entered...<br />";
	else if($password!=$conpassword)
		$error.="Password does not matched, Enter correct password as above...<br />";
	else
	{
		$insert="insert into member (user_name,full_name,password,store_name,address,location,zipcode,email,phone,country,created_date,updated_date,package,theme,status) VALUES ('".$username."','".$fullname."','".md5($password)."','".$storename."','".$address1."','".$location."','".$zipcode."','".$email."','".$phoneno."','','".date("Y-m-d h:i:s")."','".date("Y-m-d h:i:s")."','".$_SESSION['plan_id']."','1','0')";
		mysql_query($insert);
		
		$insert=array("user_name"=>$username,"full_name"=>$fullname,"password"=>$password,"store_name"=>$storename,"address"=>$address1,"location"=>$location,"zipcode"=>$zipcode,"email"=>$email,"phone"=>$phoneno);
		$_SESSION['paypal']=$insert;
		?>
        <script language="javascript">
			window.location.href="paypal.php";
		</script>
        <?php
	}
		
}
else
{
	//Product options
	$storename="";
	$username="";
	
	//Choose store setting
	$storesetting="";
	
	//Personal Details
	$fullname="";
	$address1="";
	$address2="";
	$location="";
	$zipcode="";
	$phoneno="";
	
	//Account detail
	$email="";
	$password="";
	$conpassword="";
}
$id=base64_decode($_GET['id']);
$_SESSION['plan_id']=$id;
$q="select * from package where id='".$id."'";
$plan=mysql_query($q) or die(mysql_error());
if(mysql_num_rows($plan) > 0)
{
	$abc=mysql_fetch_array($plan);
	$packagename=$abc['plan_name'];	
	$price="$ ".number_format($abc['plan_price'],2);
}
?>
<div class="regblank"></div>
<div class="regtitle">Over 10,000 success stories and counting </div>
<div class="regtitle" style="padding-top:8px">Open your online business nowto write your own!</div>
<div align="center" class="error_message"><?php echo $error; ?></div>
<?php if(mysql_num_rows($plan) > 0){ ?>
    <div class="form_div">
    <div>
        <div class="regheader1"><?php echo $packagename; ?></div>
        <div class="regheader2"><?php echo $price; ?></div>
    </div>
    <form action="#" method="post">
    <div class="main_div" >
            <div class="text_lable main_heading">Product Options</div>
        <div>
            <div class="text_lable fl width350">Enter your store name or business name</div>
            <div class="text_lable">Enter your user name</div>
        </div>
        <div class="clear"></div>
        <div class="text_lable fl width350">
            <input type="text" name="txtstnm" value="<?php echo $storename; ?>" id="txtstid" size="30px" class="text">
        </div>
        <div class="text_lable">
            <input type="text" name="txtunm" value="<?php echo $username; ?>" id="txtuid" size="25px" align="middle" class="text">
        </div>
        <div class="clear"></div>
        <div>
            <div class="text_lable main_heading">Choose Store Setting</div>
            <div class="text_lable fl width350"><input type="radio" name="store" id="storeid" checked="checked" value="0">I want to use 7 days trial</div>
            <div class="text_lable "><input type="radio" name="store" value="1" id="storeid" <?php if($storesetting==1){echo 'checked="checked"';} ?>>I want to go to the market now</div>
        </div>
        
        <div>
            <div class="text_lable main_heading">Personal Detail</div>
            <div class="text_lable ">Full Name</div>
            <div class="text_lable "><input type="text" name="txtfnm" value="<?php echo $fullname; ?>" id="fnmid" class="text"></div>
            
            <div class="clear"></div>
            <div class="text_lable fl width350">Address 1</div>
            <div class="text_lable">Address 2</div>
    
            <div class="text_lable fl width350"><input type="text" name="txtadd1" value="<?php echo $address1; ?>" id="addid1" class="text"></div>
            <div class="text_lable"><input type="text" name="txtadd2" value="<?php echo $address2; ?>" id="addid2" class="text"></div>
            
            <div class="text_lable fl width350">location</div>
            <div class="text_lable">Zipcode</div>
            <div class="text_lable fl width350">
            	<input type="text" onkeyup="" name="txtloc" value="<?php echo $location; ?>" id="locid" class="text"><span id="auto" style="margin-top:25px;"></span>
            </div>
            <div class="text_lable"><input type="text" name="txtpostal" value="<?php echo $zipcode; ?>" id="postalid" class="text"></div>
            
            <div class="text_lable ">Phone No</div>
            <div class="text_lable"><input type="text" name="txtph" value="<?php echo $phoneno; ?>" id="phid" class="text"></div>
        </div>
        
        <div>
            <div class="text_lable main_heading">Account Detail</div>
            <div class="text_lable">Email</div>
            <div class="text_lable"><input type="text" name="txtmail" value="<?php echo $email; ?>" id="mailid" class="text"></div>
            <div class="text_lable fl width350">Password</div>
            <div class="text_lable">Confirm Password</div>
            <div class="text_lable fl width350"><input type="password" name="txtpwd1" value="<?php echo $password; ?>" id="pwdid1" class="text"></div>
            <div class="text_lable "><input type="password" name="txtpwd2" value="<?php echo $conpassword; ?>" id="addid2" class="text"></div>
             
             <div class="clear"></div>
             <input type="hidden" name="submit" value="1" />
            <div class="text_lable ">
            	<input type="submit" name="sub" id="subid" value="Submit" class="submit_but" >
            </div>
        </div>
    </div>
    </form>
    </div>
<?php }else{ ?>
	<div align="center" class="error_message">No Package selected</div>
<?php } ?>


<?php include("../footer.php");?>