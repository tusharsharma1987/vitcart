<?php 
$page_name="pricing";
include("../header.php");

$fetch1="select * from package where id='1'";
	$fetch2="select * from package where id='2'";
	$select1=mysql_query($fetch1);
	$select2=mysql_query($fetch2);
	$row1=mysql_fetch_array($select1);
	$row2=mysql_fetch_array($select2);
	
	$packageid1=$row1['id'];
	$packageid2=$row2['id'];
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
	$price1=$row1['plan_price'];
	$price2=$row2['plan_price'];
	if($row1['on_page_seo']=='0')
		$onpageseo1="Yes";
	else
		$onpageseo1="No";
	$onpageseo2=$row2['on_page_seo'];
	if($row2['on_page_seo']=="0")
		$onpageseo2="Yes";
	else
		$onpageseo2="No";
	$livechat1=$row1['live_chat'];
	if($row1['live_chat']=="0")
		$livechat1="Yes";
	else
		$livechat1="No";
	$livechat2=$row2['live_chat'];
	if($row2['live_chat']=="0")
		$livechat2="Yes";
	else
		$livechat2="No";

?>
<div class="content">
    	<div class="content-top"></div>
    	<div class="content-mid">
        	<div class="content-mid-heading">Pricing</div>
        	<div class="content-mid-text">
            	
                <div class="blank">
                	<div class="heading-list">
                    	<div class="frstblank">&nbsp;</div> 
						<div class="fl">
                            <div class="economy"><?php echo $packagename1; ?><br />$<?php echo $price1; ?>/Mo<br /><a href="plan.php?id=<?php echo base64_encode($packageid1); ?>">Sign Up</a></div>
                        </div>
						<div class="fl">
	                        <div class="business"><?php echo $packagename2; ?><br />$<?php echo $price2; ?>/Mo<br /><a href="plan.php?id=<?php echo base64_encode($packageid2); ?>">Sign Up</a></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    
                    <div class="plan-data">
                   	 	<div class="feature-list">Total Products</div>
                    	<div class="economy-data"><?php echo $totalproduct1; ?></div>
                        <div class="business-data"><?php echo $totalproduct2; ?></div>
                    </div>

                    <div class="clear"></div>
                    
                    <div class="plan-data">
                   	 	<div class="feature-list">Data Transfer</div>
                    	<div class="economy-data"><?php echo $datatransfer1; ?></div>
                    	<div class="business-data"><?php echo $datatransfer2; ?></div>
                    </div>

					<div class="plan-data">
                   	 	<div class="feature-list">Setup Fee</div>
                    	<div class="economy-data"><?php echo $setupfee1; ?></div>
                    	<div class="business-data"><?php echo $setupfee2; ?></div>
                    </div>
                    
                    <div class="plan-data">
                   	 	<div class="feature-list">Transaction Fee</div>
                    	<div class="economy-data"><?php echo $transactionfee1; ?></div>
                    	<div class="business-data"><?php echo $transactionfee2; ?></div>
                    </div>
                    
                    <div class="plan-data">
                   	 	<div class="feature-list">Free Transaction</div>
                    	<div class="economy-data"><?php echo $freetransaction1; ?></div>
                    	<div class="business-data"><?php echo $freetransaction2; ?></div>
                    </div>
                    
                    <div class="plan-data">
                   	 	<div class="feature-list">Free templats</div>
                    	<div class="economy-data"><?php echo $freetemplate1; ?></div>
                    	<div class="business-data"><?php echo $freetemplate2; ?></div>
                    </div>
                    
                    <div class="plan-data">
                   	 	<div class="feature-list">On Page SEO</div>
                    	<div class="economy-data"><?php echo $onpageseo1; ?></div>
                    	<div class="business-data"><?php echo $onpageseo2; ?></div>
                    </div>
                    
                    <div class="plan-data">
                   	 	<div class="feature-list">Live Chat</div>
                    	<div class="economy-data"><?php echo $livechat1; ?></div>
                    	<div class="business-data"><?php echo $livechat2; ?></div>
                    </div>
                </div>
                
            </div>
         </div>
    	<div class="content-bot"></div>
    </div>

<?php include("../footer.php");?>