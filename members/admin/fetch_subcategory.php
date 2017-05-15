<?php
	include 'dbc.php';
	$id=$_GET['id'];
	$qr="select * from category where parent_id='".$id."'";
	$qr_exec=mysql_query($qr);
	while($row=mysql_fetch_array($qr_exec))
	{
	echo "<option value='".$row['id']."'>".$row['category_name']."</option>";
	}
?>
