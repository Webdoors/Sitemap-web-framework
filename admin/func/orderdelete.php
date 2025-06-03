<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
if($_SESSION['GuserID']!=""){
	
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	
	mysqli_query($con,"DELETE FROM orders WHERE invoice='".$a."' ");
	echo 1;
}
	
	?>