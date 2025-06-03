<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
	date_default_timezone_set("Asia/Tbilisi");
	include("../config.php");

include($_POST["fname"].".php");


//'http://bi.msg.ge/sendsms.php?username=suftage&password=VhR6EajtfynGB&client_id=631&service_id=2146&utf=1&to=+995'.$tel.'&text='.urlencode("text");
?>