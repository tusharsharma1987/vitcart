<?php
if(!isset($_SESSION['type']) && $_SESSION['type'] != 'admin')
	{ 
		header("location:index.php");
	}
	include 'dbc.php';
?>
<link type="text/css" href="style.css" rel="stylesheet">
<div class="header">
		<div class="welcome" >
			Welcome to Control Panel
			<div style="float:right; font-size:15px; padding-right:10px">
			<a href="logout.php" style="text-decoration:none; color:#000000">Logout</a>
		</div>
		</div>
		
		<div style="padding-left:70px; float:left; ">&nbsp;</div>
		<div class="menu" <?php if($pagename=='home') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >
		<a href="home_admin.php">Home Content</a>
		</div>
		<div style="width:3px; float:left">&nbsp;</div>
		<div class="menu" <?php if($pagename=='contact') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >
		<a href="contact.php">Contact</a>
		</div>
		<div style="width:3px; float:left">&nbsp;</div>
		<div class="menu" <?php if($pagename=='packages') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >
		<a href="packages.php">Packages</a>
		</div>
		<div style="width:3px; float:left">&nbsp;</div>
		<div class="menu" <?php if($pagename=='static_pages') { echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >
		<a href="cms.php">CMS</a>
		</div>
		<div style="width:3px; float:left">&nbsp;</div>
		<div class="menu" <?php if($pagename=='theme') { echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >
		<a href="theme.php">Themes</a>
		</div>
		 <div style="width:3px; float:left">&nbsp;</div>
		<div class="menu" <?php if($pagename=='member') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >
		<a href="members.php">Members</a>
		</div>
		<!--
		<div style="width:3px; float:left">&nbsp;</div>
		<div class="menu" <?php if($pagename=='comments') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >
		<a href="comments.php">Comments</a>
		</div>
		<div style="width:3px; float:left">&nbsp;</div>
		<div class="menu" <?php if($pagename=='publication') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >
		<a href="publications.php">Publications</a>
		</div>-->
		<div style="width:3px; float:left">&nbsp;</div>
		<div class="menu" <?php if($pagename=='password') {echo "style='border-bottom:1px solid #FFFFFF; background-color:#FFF; '";} ?> >
		<a href="change.php">Change Password</a>
		</div>


</div>