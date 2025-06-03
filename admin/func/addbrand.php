<?php
if($_SESSION['GuserID']!=""){
	$a=mysqli_real_escape_string($con,$_POST["a"]??"");
	$b=mysqli_real_escape_string($con,$_POST["b"]??"");
	$c=mysqli_real_escape_string($con,$_POST["c"]??"");
	mysqli_query($con,"INSERT INTO brands SET name_ka='".$a."'");
	echo 1;
}
?>