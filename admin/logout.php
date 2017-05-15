<?php
session_start();
if(!isset($_SESSION['uname']))
{
echo("window.location.href='index.php';");
}
else
{
	session_destroy();
	echo("<script language=javascript>");
	echo("window.location.href='index.php';");
	echo("</script>");	
}
?>
