<?php
session_start();
$pagename="";
$action="";
include'header.php';
if(isset($_GET['msg']))
	{
	if($_GET['msg']==1)
		{
		$action=1;
		$message="Home Content Submitted Successfully. <a href='home_admin.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==2)
		{
		$action=1;
		$message="Contact Us Information Submitted Successfully. <a href='contact.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==3)
		{
		$action=1;
		$message="Contact Us Updated Successfully. <a href='contact.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==4)
		{
		$action=1;
		$message=$_SESSION['success']." .<a href='packages.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==5)
		{
		$action=1;
		$message="Program Schedule Deleted Successfully. <a href='programs.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==6)
		{
		$action=1;
		$message="Password Changed Successfully. <a href='change.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==7)
		{
		$action=1;
		$message="YouTube Video Uploaded Successfully. <a href='youtube.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==8)
		{
		$action=1;
		$message="YouTube Video Deleted Successfully. <a href='youtube.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==9)
		{
		$action=1;
		$message="Poem Submitted Successfully. <a href='poems.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==10)
		{
		$action=1;
		$message="Poem Deleted Successfully. <a href='poems.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==11)
		{
		$action=1;
		$message="CMS Updated Successfully. <a href='cms.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==12)
		{
		$action=1;
		$message="Comment Deleted Successfully. <a href='comments.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==13)
		{
		$action=1;
		$message="Poet Added Successfully. <a href='poets.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==14)
		{
		$action=1;
		$message="Poet Updated Successfully. <a href='poets.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==16)
		{
		$action=1;
		$message="Photo Deleted Successfully. <a href='gallery.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==17)
		{
		$action=1;
		$message="Photo Updated Successfully. <a href='gallery.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==18)
		{
		$action=1;
		$message="Publication Added Successfully. <a href='publications.php'>Click Here</a> to go back.";
		}
	if($_GET['msg']==19)
		{
		$action=1;
		$message="Publication Deleted Successfully. <a href='publications.php'>Click Here</a> to go back.";
		}
	}
else
	{
		$message="Undefined action is performed. <a href='home_admin.php'>Click Here</a> to go back.";
	}
?>
<div style="min-height:500px; text-align:center">
	<div style="padding-top:100px; font-weight:bold">
	<div><?php if($action==1){ echo "Success!!!"; } ?></div>
	<div><?php echo $message; ?></div>
	</div>
</div>
<?php  
include 'footer.php';
?>