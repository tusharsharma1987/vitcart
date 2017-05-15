<?php
if($page_name=="home")
	include("../include/config.php");
else
	include("../../include/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<link rel="canonical" href="http://www.vitindia.com"  />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_IMG; ?>engine1/style.css" />
<script type="text/javascript" src="<?php echo SITE_IMG; ?>engine1/jquery.js"></script>
<style type="text/css">a#vlb{display:none}</style>
<script type="text/javascript" src="<?php echo SITE_IMG; ?>engine1/wowslider.js"></script>

<?php if($page_name=="plan")
{ ?>
	<script src="<?php echo SITE_URL; ?>include/dimensions.js" type="text/javascript"></script>
	<script src="<?php echo SITE_URL; ?>include/autocomplete.js" type="text/javascript"></script>
	<script language="javascript">
    $(function(){
	setAutoComplete("locid", "results", "google_add.php?id=");
});
</script>
<?php } ?>
<script type="text/javascript" src="<?php echo SITE_URL; ?>include/javascript.js"></script>

<script type="text/javascript"> 
jQuery.noConflict();
var v;
jQuery(document).ready(function(){
 
 
	jQuery(".run").click(function(){
	
		if(v!=1)
		{

		jQuery("#box")
		.animate({opacity: "1.0", left: "+=95"}, 1200)
			document.getElementById("closes").style.display="block";
			v=1;
		return false;
		}
	});


	jQuery(".close").click(function(){
		v="";
		jQuery("#box")
		.animate({opacity: "1.0", left: "-=95"}, 1200)
		document.getElementById("closes").style.display="none";
		return false;
	
	});
 
});

var v1;
jQuery(document).ready(function(){
 
	jQuery(".run1").click(function(){
	
		if(v1!=1)
		{
		jQuery("#box1")
		.animate({opacity: "1.0", left: "+=95"}, 1200)
			document.getElementById("closes1").style.display="block";
			v1=1;
		return false;
		}
	});


	jQuery(".close1").click(function(){
		v1="";
		jQuery("#box1")
		.animate({opacity: "1.0", left: "-=95"}, 1200)
		document.getElementById("closes1").style.display="none";
		return false;
	
	});
 

 
});
var v2;
jQuery(document).ready(function(){
 
 
	jQuery(".run2").click(function(){
	
		if(v2!=1)
		{

		jQuery("#box2")
		.animate({opacity: "1.0", left: "+=95"}, 1200)
			document.getElementById("closes2").style.display="block";
			v2=1;
		return false;
		}
	});


	jQuery(".close2").click(function(){
		v2="";
		jQuery("#box2")
		.animate({opacity: "1.0", left: "-=95"}, 1200)
		document.getElementById("closes2").style.display="none";
		return false;
	
	});
 
});
var v3;
jQuery(document).ready(function(){
 
 
	jQuery(".run3").click(function(){
	
		if(v3!=1)
		{

		jQuery("#box3")
		.animate({opacity: "1.0", left: "+=95"}, 1200)
			document.getElementById("closes3").style.display="block";
			v3=1;
		return false;
		}
	});


	jQuery(".close3").click(function(){
		v3="";
		jQuery("#box3")
		.animate({opacity: "1.0", left: "-=95"}, 1200)
		document.getElementById("closes3").style.display="none";
		return false;
	
	});
 
});

</script> 

<style type="text/css">
	#box {
	float:left;
	margin-left:-105px;
	position: relative;
	background:url(<?php echo SITE_IMG; ?>bk.png) no-repeat;
	width:152px;
}
	#box1 {
	float:left;
	margin-left:-163px;
	position: relative;
	background:url(<?php echo SITE_IMG; ?>bko.png) no-repeat;
	width:152px;
}
	#box2 {
	float:left;
	margin-left:-163px;
	position: relative;
	background:url(<?php echo SITE_IMG; ?>bko.png) no-repeat;
	width:152px;
}
	#box3 {
	float:left;
	margin-left:-166px;
	position: relative;
	background:url(<?php echo SITE_IMG; ?>bko.png) no-repeat;
	width:152px;
}

</style>
<title>VitCart :: A Online Store</title>
<link href="<?php echo SITE_CSS;?>style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo SITE_CSS;?>autocomplete.css" type="text/css" media="screen">

</head>

<body>
	
    <div class="header-lsized">
    	<div class="header">
        	<div class="header-left-panel fl">
            	<div class="logo"><a href="#"><img src="<?php echo SITE_IMG; ?>logo.png" alt="Logo" border="0" /></a></div><!--.logo-->
            </div><!--.header-left-panel .fl-->
            <div class="header-right-panel fr">
            	<div class="top-menu fl">
                	<ul>
                    	<li ><a href="<?php echo SITE_MOD; ?>"><img src="<?php echo SITE_IMG; ?>home_sim.png" alt="Home" border="0" onmouseover="this.src='<?php echo SITE_IMG; ?>home.png'" onmouseout="this.src='<?php echo SITE_IMG; ?>home_sim.png'"/></a></li>
                    	<li ><a href="#"><img src="<?php echo SITE_IMG; ?>menu-sep.png" alt="|" border="0" /></a></li>
                    	<li ><a href="<?php echo SITE_MOD; ?>cms/aboutus.php"><img src="<?php echo SITE_IMG; ?>abt-us_sim.png" alt="About Us" border="0" onmouseover="this.src='<?php echo SITE_IMG; ?>abt-us.png'" onmouseout="this.src='<?php echo SITE_IMG; ?>abt-us_sim.png'" /></a></li>
                    	<li ><a href="#"><img src="<?php echo SITE_IMG; ?>menu-sep.png" alt="|" border="0" /></a></li>
                    	<li ><a href="<?php echo SITE_MOD; ?>cms/services.php"><img src="<?php echo SITE_IMG; ?>services_sim.png" alt="Services" border="0" onmouseover="this.src='<?php echo SITE_IMG; ?>services.png'" onmouseout="this.src='<?php echo SITE_IMG; ?>services_sim.png'"/></a></li>
                    	<li ><a href="#"><img src="<?php echo SITE_IMG; ?>menu-sep.png" alt="|" border="0" /></a></li>
                    	<li ><a href="<?php echo SITE_MOD; ?>pricing/index.php"><img src="<?php echo SITE_IMG; ?>pricing_sim.png" alt="Pricing" border="0" onmouseover="this.src='<?php echo SITE_IMG; ?>pricing.png'" onmouseout="this.src='<?php echo SITE_IMG; ?>pricing_sim.png'"/></a></li>
                    	<li ><a href="cms/prising.php"><img src="<?php echo SITE_IMG; ?>menu-sep.png" alt="|" border="0" /></a></li>
                    	<li ><a href="<?php echo SITE_MOD; ?>cms/contact.php"><img src="<?php echo SITE_IMG; ?>contact-us_sim.png" alt="Contact Us" border="0" onmouseover="this.src='<?php echo SITE_IMG; ?>contact-us.png'" onmouseout="this.src='<?php echo SITE_IMG; ?>contact-us_sim.png'"/></a></li>
                    </ul><!--UL LI-->
                </div><!--.top-menu-->
            </div><!--.header-right-panel .fr-->
            <div class="clear"></div><!--.clear-->
        </div><!--.header-->
    </div><!--.header-lsized-->
	<!--Content Middle div Start-->

<?php

?>