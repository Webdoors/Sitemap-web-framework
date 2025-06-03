<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);
	$e=mysqli_real_escape_string($con,$_POST["e"]);
	$f=mysqli_real_escape_string($con,$_POST["f"]);
	$T=time();
	$uid=$_SESSION['GuserID'];
	mysqli_query($con,"INSERT INTO journal SET storeid='$a',opertype='1',com='$f',amount='$c',itemid='$e',uid='".$uid."',date='".$T."'");
	mysqli_query($con,"INSERT INTO journal SET storeid='$b',opertype='2',com='$f',amount='$c',itemid='$e',uid='".$uid."',date='".$T."'");

		mysqli_query($con,"UPDATE qbystore SET quantity=quantity-$c WHERE storeid='$a' AND itemid='$e'");
		mysqli_query($con,"UPDATE qbystore SET quantity=quantity+$c WHERE storeid='$b' AND itemid='$e'");

	//echo "UPDATE qbystore SET quantity=quantity+$d WHERE storeid='$a' AND itemid='$e'";

	echo 1;
}
?>