<?php 
$page_name="pricing";
include("../header.php");

$fetch1="select * from contactus where id='1'";
	$select1=mysql_query($fetch1);
	$row1=mysql_fetch_array($select1);
	
	$firstname=$row1['fname'];
	$lastname=$row1['lname'];
	$email=$row1['email'];
	$address1=$row1['address1'];
	$address2=$row1['address2'];
	$city=$row1['city'];
	$state=$row1['state'];
	$country=$row1['country'];
	$zip=$row1['zip'];
	$phone=$row1['phone'];

?>
<div class="content">
    	<div class="content-top"></div>
    	<div class="content-mid">
        	<div class="content-mid-heading">Contact Us</div>
        	<div class="content-mid-text">
            	
                <div class="blank">
                	<div class="heading-cms">
                    	<div class="head-comp">VitCart Gurgaon</div> 
						<div ><?php echo ucfirst($firstname)." ".ucfirst($lastname); ?></div>
                        <div ><?php echo ucfirst($address1).","; ?></div>
                        <div ><?php echo ucfirst($address2).","; ?></div>
                        <div ><?php echo ucfirst($city)." ".$zip." - ".ucfirst($state)." ( ".strtoupper($country).")"; ?></div>
                        <div >&nbsp;</div>
                        <div >Ph:  +91 <?php echo $phone; ?></div>
                        <div >Email: <?php echo $email; ?></div>
						
                    </div>
                </div>
                
            </div>
         </div>
    	<div class="content-bot"></div>
    </div>

<?php include("../footer.php");?>