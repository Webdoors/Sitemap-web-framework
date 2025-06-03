<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

if(isset($_SESSION['GuserID'])){
	$uid=mysqli_real_escape_string($con,$_POST["uid"]);
	mysqli_query($con,"UPDATE id SET deleted='1' WHERE id='".$uid."'");
	echo 1;
}

?>