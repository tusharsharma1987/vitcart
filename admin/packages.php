<?php
session_start();
$pagename='packages';
include 'header.php';
$error="";
if(isset($_POST['submit']))
{	
	$packagename1=$_POST['packagenameone'];
	$packagename2=$_POST['packagenametwo'];
	$totalproduct1=$_POST['totalproductsone'];
	$totalproduct2=$_POST['totalproductstwo'];
	$datatransfer1=$_POST['datatransferone'];
	$datatransfer2=$_POST['datatransfertwo'];
	$setupfee1=$_POST['setupfeeone'];
	$setupfee2=$_POST['setupfeetwo'];
	$transactionfee1=$_POST['transactionfeeone'];
	$transactionfee2=$_POST['transactionfeetwo'];
	$freetransaction1=$_POST['freetransactionone'];
	$freetransaction2=$_POST['freetransactiontwo'];
	$freetemplate1=$_POST['freetemplatesone'];
	$freetemplate2=$_POST['freetemplatestwo'];
	$onpageseo1=$_POST['onpageseoone'];
	$onpageseo2=$_POST['onpageseotwo'];
	$livechat1=$_POST['livechatone'];
	$livechat2=$_POST['livechattwo'];
	$price1=$_POST['priceone'];
	$price2=$_POST['pricetwo'];
	if($packagename1=="")
	{
		$error="Enter the value of package name one";
	}
	else if($packagename2=="")
	{
		$error="Enter the value of package name two";
	}
	else if($price1=="")
	{
		$error="Enter the Price of package One";
	}
	else if($price2=="")
	{
		$error="Enter the Price of package Two";
	}
	else if($totalproduct1=="")
	{
		$error="Enter the value of total product one";
	}
	else if($totalproduct2=="")
	{
		$error="Enter the value of total product two";
	}
	else if($datatransfer1=="")
	{
		$error="Enter the value of data transfer one";
	}
	else if($datatransfer2=="")
	{
		$error="Enter the value of data transfer two";
	}
	else if($setupfee1=="")
	{
		$error="Enter the value of setup fee one";
	}
	else if($setupfee2=="")
	{
		$error="Enter the value of steup fee two";
	}
	else if($transactionfee1=="")
	{
		$error="Enter the value of transaction fee one";
	}
	else if($transactionfee2=="")
	{
		$error="Enter the value of transaction fee two";
	}
	else if($freetransaction1=="")
	{
		$error="Enter the value of free transaction one";
	}
	else if($freetransaction2=="")
	{
		$error="Enter the value of free transaction two";
	}
	else if($freetemplate1=="")
	{
		$error="Enter the value of free template one";
	}
	else if($freetemplate2=="")
	{
		$error="Enter the value of free template two";
	}
	else if($onpageseo1=="")
	{
		$error="Enter the value of on page SEO one";
	}
	else if($onpageseo2=="")
	{
		$error="Enter the value of on page SEO two";
	}
	else if($livechat1=="")
	{
		$error="Enter the value of live chat one";
	}
	else if($livechat2=="")
	{
		$error="Enter the value of live chat two";
	}
	else
	{
		$_SESSION['success']="";
		$update1="update package set plan_name='".$packagename1."',plan_price='".$price1."',product='".$totalproduct1."',data_transfer='".$datatransfer1."',setup_fee='".$setupfee1."',transaction_fee='".$transactionfee1."',free_transaction='".$freetransaction1."',free_templates='".$freetemplate1."',on_page_seo='".$onpageseo1."',live_chat='".$livechat1."' where id='1'";
		mysql_query($update1) or die(mysql_error);
		if(mysql_affected_rows())
		{
			$_SESSION['success'].="Package 1 Updated Successfully";
			$success=1;
		}
		else
		{
			$error="No update to Package 1";
		}
		$update2="update package set plan_name='".$packagename2."',plan_price='".$price2."',product='".$totalproduct2."',data_transfer='".$datatransfer2."',setup_fee='".$setupfee2."',transaction_fee='".$transactionfee2."',free_transaction='".$freetransaction2."',free_templates='".$freetemplate2."',on_page_seo='".$onpageseo2."',live_chat='".$livechat2."' where id='2'";
		mysql_query($update2) or die(mysql_error);
		
		if(mysql_affected_rows())
		{
			$_SESSION['success'].="<br>Package 2 Updated Successfully";
			$success=1;
		}
		else
		{
			$error="No update to Package 2";
		}
		if($success==1)
		{
			?>
			<script language="javascript">
				window.location.href="message.php?msg=4";
			</script>
			<?php
		}
	}
}
else
{
	$fetch1="select * from package where id='1'";
	$fetch2="select * from package where id='2'";
	$select1=mysql_query($fetch1);
	$select2=mysql_query($fetch2);
	$row1=mysql_fetch_array($select1);
	$row2=mysql_fetch_array($select2);
	
	$packagename1=$row1['plan_name'];
	$packagename2=$row2['plan_name'];
	$totalproduct1=$row1['product'];
	$totalproduct2=$row2['product'];
	$datatransfer1=$row1['data_transfer'];
	$datatransfer2=$row2['data_transfer'];
	$setupfee1=$row1['setup_fee'];
	$setupfee2=$row2['setup_fee'];
	$transactionfee1=$row1['transaction_fee'];
	$transactionfee2=$row2['transaction_fee'];
	$freetransaction1=$row1['free_transaction'];
	$freetransaction2=$row2['free_transaction'];
	$freetemplate1=$row1['free_templates'];
	$freetemplate2=$row2['free_templates'];
	$onpageseo1=$row1['on_page_seo'];
	$onpageseo2=$row2['on_page_seo'];
	$livechat1=$row1['live_chat'];
	$livechat2=$row2['live_chat'];
	$price1=$row1['plan_price'];
	$price2=$row2['plan_price'];
}
?>



<div style="min-height:500px">
	<div style="text-align:center; padding-top:50px; font-size:24px; font-weight:bold">Package Management</div>
	<div style="width:800px; padding-left:400px">
	<div align="center" style="color:#FF0000; font-weight:bold"><?php if(isset($error) && $error != "") {echo $error;}; ?></div>
	<div style="padding-top:50px;"></div>    
    
	<form name="packagemanagement" action="" method="post" onSubmit="return check();" enctype="multipart/form-data">
	<div>	
        <div style="float:left; width:150px">&nbsp;</div>
		<div style="width:300; float:left"><b>Package One</b></div> 
        <div style="width:300; float:left"><b>Package Two</b></div>
     </div>  
	<div>	
        <div style="float:left; width:150px"><b>Package Name</b></div>
		<div style="width:300; float:left"><input type="text" name="packagenameone" value="<?php echo $packagename1; ?>" size="35" ></div> 
        <div style="width:300; float:left"><input type="text" name="packagenametwo" value="<?php echo $packagename2; ?>" size="35" /></div>
     </div>  
	<div>	
        <div style="float:left; width:150px"><b>Price</b></div>
		<div style="width:300; float:left"><input type="text" name="priceone" value="<?php echo $price1; ?>" size="35" ></div> 
        <div style="width:300; float:left"><input type="text" name="pricetwo" value="<?php echo $price2; ?>" size="35" /></div>
     </div>  
	<div>	
        <div style="float:left; width:150px"><b>Total Products</b></div>
		<div style="width:300; float:left"><input type="text" name="totalproductsone" value="<?php echo $totalproduct1; ?>" size="35" ></div> 
        <div style="width:300; float:left"><input type="text" name="totalproductstwo" value="<?php echo $totalproduct2; ?>" size="35" /></div>
     </div>  
	<div>	
        <div style="float:left; width:150px"><b>Data Transfer</b></div>
		<div style="width:300; float:left"><input type="text" name="datatransferone" value="<?php echo $datatransfer1; ?>" size="35" ></div> 
        <div style="width:300; float:left"><input type="text" name="datatransfertwo" value="<?php echo $datatransfer2; ?>" size="35" /></div>
     </div>  
	<div>	
        <div style="float:left; width:150px"><b>Setup Fee</b></div>
		<div style="width:300; float:left"><input type="text" name="setupfeeone" value="<?php echo $setupfee1; ?>" size="35" ></div> 
        <div style="width:300; float:left"><input type="text" name="setupfeetwo" value="<?php echo $setupfee2; ?>" size="35" /></div>
     </div>  
	<div>	
        <div style="float:left; width:150px"><b>Transaction Fee</b></div>
		<div style="width:300; float:left"><input type="text" name="transactionfeeone" value="<?php echo $transactionfee1; ?>" size="35" ></div> 
        <div style="width:300; float:left"><input type="text" name="transactionfeetwo" value="<?php echo $transactionfee2; ?>" size="35" /></div>
     </div>  
	<div>	
        <div style="float:left; width:150px"><b>Free Transaction</b></div>
		<div style="width:300; float:left"><input type="text" name="freetransactionone" value="<?php echo $freetransaction1; ?>" size="35" ></div> 
        <div style="width:300; float:left"><input type="text" name="freetransactiontwo" value="<?php echo $freetransaction2; ?>" size="35" /></div>
     </div>  
	<div>	
        <div style="float:left; width:150px"><b>Free Templates</b></div>
		<div style="width:300; float:left"><input type="text" name="freetemplatesone" value="<?php echo $freetemplate1; ?>" size="35" ></div> 
        <div style="width:300; float:left"><input type="text" name="freetemplatestwo" value="<?php echo $freetemplate2; ?>" size="35" /></div>
     </div>  
  	<div>	
        <div style="float:left; width:150px"><b>On Page SEO</b></div>
		<div style="width:300; float:left"><select name="onpageseoone" value="<?php echo $onpageseo1; ?>" style="width:245px">
        <option value="0">Yes</option>
        <option value="1">No</option></select></div> 
        <div style="width:300; float:left"><select name="onpageseotwo" value="<?php echo $onpageseo2; ?>" style="width:245px">
        <option value="0">Yes</option>
        <option value="1">No</option></select></div>
     </div>  
	<div>	
        <div style="float:left; width:150px"><b>Live Chat</b></div>
		<div style="width:300; float:left"><select name="livechatone" value="<?php echo $livechat1; ?>" style="width:245px">
        <option value="0">Yes</option>
        <option value="1">No</option></select></div> 
        <div style="width:300; float:left"><select name="livechattwo" value="<?php echo $livechat2; ?>" style="width:245px">
        <option value="0">Yes</option>
        <option value="1">No</option></select></div>
     </div>  
      
        
        
        
		<input type="hidden" value="submit" name="submit">
		<div style="clear:both; text-align:left; padding-left:100px; padding-top:15px"><input type="image" src="images/submit_c.png" onClick="return check();"/></div>
	</form>
	</div>
	
</div>
<?php
include 'footer.php';
?>
<script language="javascript">
	function delyoutube(id)
		{
			if(confirm ("Do you really want to delete this video"))
				{
					window.location.href="youtube.php?del="+id;
				}
			else
				{
					
				}
		}
</script>