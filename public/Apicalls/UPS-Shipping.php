<?php
include_once 'ups.rate.class.php';

$objUpsRate = new UpsShippingQuote();
$strFromZip =$_POST['fromzipcode'];
$strDestinationZip = $_POST['zipcode'];
$strMethodShortName = $_POST['shipingmode'];

$strPackageLength = '0';
$strPackageWidth = '0';
$strPackageHeight = '0'; 
$strPackageWeight = '12';
$boolReturnPriceOnly =false;

$result = $objUpsRate->GetShippingRate(
	$strFromZip,
	$strDestinationZip, 
	$strMethodShortName, 
	$strPackageLength, 
	$strPackageWidth,
	$strPackageHeight, 
	$strPackageWeight, 
	$boolReturnPriceOnly
);

$json = json_decode($result);
echo json_encode($json);
?>
