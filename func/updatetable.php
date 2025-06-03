<?php
session_start();
if(isset($_SESSION['uid'])){
	$UID=$_SESSION['uid'];
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);

if($a='users')
{
	$d=$UID;
}
	
	mysqli_query($con,"UPDATE $a SET ".$b."='".$c."' WHERE id='".$d."'");
	echo "UPDATE $a SET ".$b."='".$c."' WHERE id='".$d."'";
	echo 1;
}
?>
