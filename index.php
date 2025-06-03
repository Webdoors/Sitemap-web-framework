<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if (session_status() == PHP_SESSION_NONE) {
    // Set the session name before starting the session
    session_name('wizerentals');
    session_start();
}
date_default_timezone_set('Asia/Tbilisi');
mb_internal_encoding("UTF-8");
include("db_open.php");
if(isset($_COOKIE['kbag'])) {
	$bag=$_COOKIE['kbag'];
}else{
	$bag='';
}
function isM() {
    $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    $mK = array('mobile','android','silk','kindle','blackberry', 'opera mini','opera mobi','windows phone','iemobile','iphone','ipod','ipad');
    foreach ($mK as $key){if(strpos($ua,$key)!==false){return true;}}    
    return false;
}
$bag_count=0;
$bag_count=count(explode('-', $bag)); if($bag_count>0) $bag_count--;
if(isset($_COOKIE['kfavorite'])) {
	$favorite=$_COOKIE['kfavorite'];
}else{
	$favorite='';
}
$favorite_count=0;
$favorite_count=count(explode('-', $favorite)); if($favorite_count>0) $favorite_count--;
$url = $_SERVER['REQUEST_URI'];
$url=str_replace("/?","?",$url);
$url=str_replace("?","/?",$url);
$parts = explode('/',$url);
array_shift($parts);
$i=1;
foreach($parts as $part){
	$p="p".$i;
	$$p=mysqli_real_escape_string($con,$part);
	if(strpos($$p,"?")===0){
		$$p="";
	}
	$i++;
}
$L=$p1!=""?$p1:(isset($_COOKIE["lang"])?$_COOKIE["lang"]:"ka");
$page="home";
if(isset($p2)&&$p2!=""){
	$page=$p2;
}
if(!isset($p2)){
	$p2="";
}
if(!isset($p3)){
	$p3="";
}
$uid=$_SESSION["uid"]??"";
$qu=mysqli_query($con,"SELECT * FROM users WHERE id='".$uid."' ");
$ru=mysqli_fetch_array($qu);
$qs=mysqli_query($con,"SELECT * FROM sitemap WHERE slug_$L='".($p3==""?$p2:$p3)."' ");
$rs=mysqli_fetch_array($qs);
if(($rs["systemfile"]??"")!=""){
	$page=substr($rs["systemfile"], 0, -4);;
}
$P=$page;

include("lang/$L.php");
include("view/inc/header.php");

include("view/pages/".$page.".php");

include("view/inc/footer.php");
mysqli_close($con);
?>
