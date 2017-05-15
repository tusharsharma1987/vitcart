<?php

session_start();

$dbname = 'tusharsh_vitcart';

$link = mysql_connect("localhost","tusharsh_vitcart","vitcart") or die("Couldn't make connection.");

$db = mysql_select_db($dbname, $link) or die("Couldn't select database");


//$domain_exp=explode(".",$_SERVER['HTTP_HOST']);

	define("SITE_URL","http://".$_SERVER['HTTP_HOST']."/");

	define("SITE_IMG",SITE_URL."images/site/");

	define("SITE_CSS",SITE_URL."css/");

	define("SITE_MOD",SITE_URL."modules/");

	

?>