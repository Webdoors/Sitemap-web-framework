<?php
include("functions.php");
$token=mysqli_real_escape_string($con,$_POST["token"]);
$newpass=$_POST["pass"];
$user=encrypt_decrypt("decrypt",$token);
$user=explode("|",$user);
$type=$user[1];
$username=$user[3];
$pass=$user[5];
$newpass=encrypt_decrypt("encrypt",$newpass);
$q1=mysqli_query($con,"SELECT id FROM users WHERE email='".$username."' AND password<>'' AND password='".$pass."'");
$q2=mysqli_query($con,"SELECT * FROM tokens WHERE token='".$token."' AND date>".(time()-60*5)." ");

if(mysqli_num_rows($q1)>0&&mysqli_num_rows($q2)>0){
	$r1=mysqli_fetch_array($q1);  
	$id=$r1["id"];
	$_SESSION['timeout']=time()+3600*7;
	$_SESSION['uid']=$id;
	mysqli_query($con,"UPDATE users SET password='".$newpass."' WHERE email='".$username."' AND password<>'' AND password='".$pass."'");
	echo 1;
}else{
	echo 2;
}
?>