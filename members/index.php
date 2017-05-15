<?php
include 'include/config.php';
//$_SERVER['HTTP_HOST'];
$domain_exp=explode(".",$_SERVER['HTTP_HOST']);
//print_r($domain_exp);
if($domain_exp[0]=="www")
{
	$domain=$domain_exp[1];
}
else
{
	$domain=$domain_exp[0];
}
$qr="select * from member where store_name='".$domain."'";
$qr_exe=mysql_query($qr);
$check_domain=mysql_num_rows($qr_exe);
if($check_domain == 1)
{
	header('location:modules/index.php');
}
else
{
	echo "You are not a authorized User.";
}
 exit;

?>