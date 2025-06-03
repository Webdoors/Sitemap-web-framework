<?php
  require_once("../db_open.php");
$url = $_SERVER['REQUEST_URI'];
$path = $_SERVER['REDIRECT_URL']??"";
$url=str_replace("/?","?",$url);
$url=str_replace("?","/?",$url);
$parts = explode('/',$url);
array_shift($parts);
$i=1;
 include("../func/functions.php");
foreach($parts as $part){
	$p="p".$i;
	$$p=mysqli_real_escape_string($con,$part);
	if(strpos($$p,"?")===0){
		$$p="";
	}
	$i++;
}
 include("../func/invoice.php");
  require_once("../db_close.php");
?>