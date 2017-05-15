<?php 
$page_name="services";
include("../header.php");

$fetch1="select * from static_pages where id='4'";
	$select1=mysql_query($fetch1);
	$row1=mysql_fetch_array($select1);
	
	$content=stripslashes($row1['content']);
	

?>
<div class="content">
    	<div class="content-top"></div>
    	<div class="content-mid">
        	<div class="content-mid-heading">Frequenty Asked Questions</div>
        	<div class="content-mid-text">
            	
                <div class="blank">
                	<div class="heading-cms">
                    	<div class="head-comp">VitCart Gurgaon</div> 
						<div ><?php echo $content; ?></div>
                        						
                    </div>
                </div>
                
            </div>
         </div>
    	<div class="content-bot"></div>
    </div>

<?php include("../footer.php");?>