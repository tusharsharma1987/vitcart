<?php 
	$page_name="home";
	include("header.php");
	  include 'slider/index.php';
	  	$sql_content=mysql_query("select * from home_page where id='1'");
		$data=mysql_fetch_array($sql_content);
		$content=$data['content'];
?>
<div class="content">
    	<div class="content-top"></div>
    	<div class="content-mid">
        	<div class="content-mid-heading">Why VitCart ?</div>
        	<div class="content-mid-text">
            	<?php echo $content; ?>
            </div>
         </div>
    	<div class="content-bot"></div>
    </div>

	<div class="links-lsized">
    	<div class="links">
        	<div class="links-left-panel fl">
				<div class="pay-text">Pay with many options</div>
				<div class="pay-images">
                	<img src="<?php echo SITE_IMG; ?>pay.png" alt="Payment" border="0" />
                </div>
            </div><!--.links-left-panel .fl-->
            <div class="links-right-panel fr">
				<div class="social-text">Follow Us On</div>
				<div class="social-images">
                	<img src="<?php echo SITE_IMG; ?>fb.png" class="padding10" alt="Facebook" border="0" />
                	<img src="<?php echo SITE_IMG; ?>tw.png" class="padding10" alt="Twitter" border="0" />
                	<img src="<?php echo SITE_IMG; ?>gp.png" class="padding10" alt="Google-Plus" border="0" />
                </div>
            </div><!--.links-right-panel .fr-->
            <div class="clear"></div><!--.clear-->
        </div><!--.links-->
    </div><!--.links-lsized-->
<?php include("footer.php");?>