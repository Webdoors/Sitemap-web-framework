<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	mysqli_query($con,"UPDATE qbystore SET ".$b."='".$c."' WHERE id='".$a."'");
	echo 1;
}
?>
