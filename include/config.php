<?php
session_start();
//print_r($_SESSION);
$dbname = 'tusharsh_vitcart';
$link = mysql_connect("localhost","root","password") or die("Couldn't make connection.");
$db = mysql_select_db($dbname, $link) or die("Couldn't select database");

	define("SITE_URL","http://localhost/vitcart/");
	define("SITE_IMG",SITE_URL."images/site/");
	define("SITE_CSS",SITE_URL."css/");
	define("SITE_MOD",SITE_URL."modules/");
	
?>