<?php
$dbname = 'tusharsh_vitcart';
$link = mysql_connect("localhost","tusharsh_vitcart","vitcart") or die("Couldn't make connection.");
$db = mysql_select_db($dbname, $link) or die("Couldn't select database");
?>