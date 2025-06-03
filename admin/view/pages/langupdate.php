<?php
$w='';
	require_once("/home/intelect/public_html/new/lang/en.php");
	$en=$w;
	require_once("/home/intelect/public_html/new/lang/ge.php");
	$ge=$w;
$sale=mysqli_query($con,"SELECT value FROM productsmeta");
while($rsale=mysqli_fetch_assoc($sale))
{
	if(!array_key_exists($rsale["value"],$en)){
		$en[$rsale["value"]]="";
	}
	if(!array_key_exists($rsale["value"],$ge)){
		$ge[$rsale["value"]]="";
	}
}
file_put_contents("/home/intelect/public_html/new/lang/en.php",'<?php $w= ' . var_export($en, true)."; \n\r ?>");
file_put_contents("/home/intelect/public_html/new/lang/ge.php",'<?php $w= ' . var_export($ge, true)."; \n\r ?>");

?>