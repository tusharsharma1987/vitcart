<?php
include 'include/config.php';

$domain_exp=explode(".",$_SERVER['HTTP_HOST']);
if($domain_exp[0]=="www")
{
	$domain=$domain_exp[1];
}
else
{
	$domain=$domain_exp[0];
}
$qr="select * from member where store_name='".$domain."'";
$qr_exe=mysql_query($qr) or die (mysql_error());
$check_domain=mysql_num_rows($qr_exe);
if($check_domain == 1)
{
	$store_data=mysql_fetch_array($qr_exe);
	//echo "<pre>"; print_r($store_data); echo "</pre>";
	$theme=$store_data['theme'];
	$user_id=$store_data['id'];

	$qr_theme="select * from theme where id='".$theme."'";
	$qr_theme_exe=mysql_query($qr_theme) or die (mysql_error());
	$theme_data=mysql_fetch_array($qr_theme_exe);
	//echo "<pre>"; print_r($theme_data); echo "</pre>";
	$theme_name=$theme_data['theme_name'];
	$qr_content="select * from static_pages where user_id='".$user_id."' and page_name='home'";
	$qr_content_exe=mysql_query($qr_content) or die (mysql_error());
	$page_content=mysql_fetch_array($qr_content_exe);
	
	if(file_exists('../themes/'.$theme_name.'/index.php'))
	{ 
		$theme_folder= '../themes/'.$theme_name.'/';
	}
	elseif(file_exists('../themes/'.$theme_name.'/'.$theme_name.'/index.php'))
	{
		$theme_folder='../themes/'.$theme_name.'/'.$theme_name.'/';
	}

}

?>