<?php 
$pagename="terms";
include("../../common.php");

$fetch1="select * from static_pages where user_id='$user_id' and page_name='terms'";
	$select1=mysql_query($fetch1);
	$row1=mysql_fetch_array($select1);
	
	$content=stripslashes($row1['content']);
	
	include ($theme_folder.'/terms.php');

?>