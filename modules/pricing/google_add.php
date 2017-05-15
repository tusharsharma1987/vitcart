<?php
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$_REQUEST['id']."&sensor=true";

$crl = curl_init();
curl_setopt ($crl, CURLOPT_URL,$url);
curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, 5);
$ret = curl_exec($crl);
curl_close($crl);

if(sizeof(json_decode($ret)->results)>0)
{
	$d= json_decode($ret)->results[0]->formatted_address;
}
else
{
	$d= "No Location Please write full city";
}
$results=array();
$results[]=$d;
echo json_encode($results);
?>