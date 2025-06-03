<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include("functions.php");
$user=mysqli_real_escape_string($con,$_POST["user"]);
$q1=mysqli_query($con,"SELECT * FROM users WHERE email='".$user."' OR personalid='".$user."'");
if(mysqli_num_rows($q1)>0&&$user!=""&&strlen($user)>4){
	$r1=mysqli_fetch_array($q1);
	$token=encrypt_decrypt("encrypt",time()."|".$r1["usertype"]."|".time()."|".$r1["email"]."|".time()."|".$r1["password"]."|".time());
	mysqli_query($con,"INSERT INTO tokens SET token='".$token."',date='".time()."'");
	$to = $r1["email"];
	$subject = "Password Recovery iland";
$lang=$_COOKIE["lang"];	
if($lang==""){
	$lang="ka";
}
	$text='	<p>follow the link to reset your password</p>
	<a href="https://iland.ge/'.$lang.'/changepassword/?token='.$token.'">
		Link
	</a>';
	$message=$text;


	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <info@iland.ge>' . "\r\n";
	//$headers .= 'Cc: myboss@example.com' . "\r\n";

	mail($to,$subject,$message,$headers);
	echo 1;
}else{
	echo 2;
}
?>