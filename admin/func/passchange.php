<?php
require_once("functions.php");
$a=mysqli_real_escape_string($con,$_POST["a"]);
	$pass=encrypt_decrypt("encrypt",$a);

$c= $_SESSION['GuserID'];
mysqli_query($con, "UPDATE admins SET pass='$pass', salt='$salt' WHERE Id='$c' ");
echo 1;
?>