<?php
if(isset($_SESSION['GuserID'])){
	include("functions.php");
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);
	$e=mysqli_real_escape_string($con,$_POST["e"]);
	$p1=$d;
	$pass=encrypt_decrypt("encrypt",$p1);

	mysqli_query($con,"INSERT INTO admins SET firstname='$a',lastname='$b',name='$c',pass='$pass',tel='".$e."'");
	$aid=mysqli_insert_id($con);
	mysqli_query($con,"INSERT INTO `permissions` ( `adminid`, `permissions`, `dashboard`, `journal`, `users`, `brands`, `stores`, `excel`, `export`, `orders`, `installs`,`allorders`) VALUES ( '$aid', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1','1')");

	echo 1;
}
?>