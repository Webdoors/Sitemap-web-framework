<?php 
date_default_timezone_set('Asia/Tbilisi');
header('Content-Type: text/plain; charset=utf-8');

if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}
	mb_internal_encoding("UTF-8");  
	include("../../db_open.php");
	$T=time();
	mysqli_set_charset($con,"utf8");
 
$apikey=$_SERVER["HTTP_API_KEY"]; 

if($apikey==""){
	die("no api key in request");
};
$q1=mysqli_query($con,"SELECT * FROM merchants WHERE apikey='".$apikey."' AND active='1'");
$r1=mysqli_fetch_array($q1);
$m=$r1;
if(mysqli_num_rows($q1)<1){
	die("wrong api key or inactive");
}
// echo $_SERVER['HTTP_API_KEY'];
$url = $_SERVER['REQUEST_URI']; 

$parts = explode('/',$url);

if(array_key_exists(1,$parts)){
	$p1=mysqli_real_escape_string($con,$parts[1]);
}
if(array_key_exists(2,$parts)){
	$p2=mysqli_real_escape_string($con,$parts[2]);
}
if(array_key_exists(3,$parts)){
	$p3=mysqli_real_escape_string($con,$parts[3]);
}
if(array_key_exists(4,$parts)){
	$p4=mysqli_real_escape_string($con,$parts[4]);
}
if(array_key_exists(5,$parts)){
	$p5=mysqli_real_escape_string($con,$parts[5]);
}
if(array_key_exists(6,$parts)){
	$p6=mysqli_real_escape_string($con,$parts[6]);
}
 // echo $p1."/".$p2."/".$p3.".php";
if($p2=="authorise"){
	$p3="accesstoken";
}
// echo 	$p1."/".$p2."/".$p3.".php";	
// echo "function/".$p3.".php";
include("functions/".$p3.".php");	
include("../../db_close.php");

?>