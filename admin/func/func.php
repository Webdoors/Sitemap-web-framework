<?php
ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 if (session_status() == PHP_SESSION_NONE) {
 session_name("suptaadmin");
session_start();
 }
$GUID='';

if(ISSET($_SESSION['GuserID']))
{
	$GUID=$_SESSION['GuserID'];
}


	include("../../db_open.php");
	
	date_default_timezone_set("Asia/Tbilisi");
	mysqli_set_charset($con,"utf8");
	mb_internal_encoding("UTF-8");

	$f=mysqli_real_escape_string($con,$_REQUEST["fname"]).".php";
	
	include($f);	
	include("../../db_close.php"); 
?>