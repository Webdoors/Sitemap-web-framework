<?php
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]??"");
	$b=mysqli_real_escape_string($con,$_POST["b"]??"");
	$c=mysqli_real_escape_string($con,$_POST["c"]??"");
	$d=mysqli_real_escape_string($con,$_POST["d"]??"");



			mysqli_query($con,"UPDATE $a SET ".$b."=0 ");
			echo "UPDATE $a SET ".$b."=0 ";
			mysqli_query($con,"UPDATE $a SET ".$b."='".$c."' WHERE id='".$d."'");
	
	echo 1;
}
?>
