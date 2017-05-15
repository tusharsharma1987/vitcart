<?php 
$pagename="contact";
include 'header.php';

 ?>

<div id="wrapper">

<!-- start page -->

<div id="page">

	<!-- start content -->

	<div id="content">

		<div class="post">

			<h2 class="title"><a href="#">Contact Us</a></h2>

			<div class="entry">
            	<div style="">
                	<div style="font-size:28px; font-weight:bold; margin-top:20px;"><?php echo $store_name; ?></div>
                </div>
            	<div style="">
                	<div style="float:left; width:150px;">Name:</div>
                	<div style="float:left"><?php echo $store_name; ?></div>
                </div>
            	<div style="">
                	<div style="float:left; width:150px;">Address:</div>
                	<div style="float:left"><?php echo $address; ?></div>
                </div>
            	<div style="">
                	<div style="float:left; width:150px;">&nbsp;</div>
                	<div style="float:left"><?php echo $location; ?></div>
                </div>
            	<div style="">
                	<div style="float:left; width:150px;">Email:</div>
                	<div style="float:left"><?php echo $email; ?></div>
                </div>
            	<div style="">
                	<div style="float:left; width:150px;">Phone:</div>
                	<div style="float:left"><?php echo $phone; ?></div>
                </div>
            </div>

            <div style="clear:both"></div>
				
		</div>
	</div>

	<!-- end content -->

	<div style="clear: both;">&nbsp;</div>

</div>

<!-- end page -->

</div>

<?php include 'footer.php'; ?>