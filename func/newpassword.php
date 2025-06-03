<?php

if(isset($_SESSION['uid']))
{
	$uid=(int)$_SESSION['uid'];
     ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
$a=mysqli_real_escape_string($con,$_POST['a']);
$b=mysqli_real_escape_string($con,$_POST['b']);
require_once("functions.php");
	
	$pass=encrypt_decrypt("encrypt",$a);
	$oldpass=encrypt_decrypt("encrypt",$b);
$users=mysqli_query($con,"SELECT * FROM users WHERE id='$uid' AND password='$oldpass' ");
if(mysqli_num_rows($users)>0)
{
	$rusers=mysqli_fetch_assoc($users);
	mysqli_query($con,"UPDATE users SET password='".$pass."' WHERE id='".$uid."'");	
	echo "1";
}else{
	echo "2";
}
}
?>