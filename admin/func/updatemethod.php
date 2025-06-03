<?php
if($_SESSION['GuserID']!=""){
	$a=mysqli_real_escape_string($con,$_POST["a"]??"");
	$b=mysqli_real_escape_string($con,$_POST["b"]??"");
	mysqli_query($con,"UPDATE orders SET method='".$b."' WHERE invoice='".$a."'");
	//echo "UPDATE pages SET ".$c."='".$a."' WHERE id='".$b."'";
	echo 1;
}
?>
