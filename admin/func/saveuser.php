<?php
$uid=$_SESSION["GuserID"];
if($uid!=""){
	$T=time();
	require_once("functions.php");
	$uid=mysqli_real_escape_string($con,$_POST["uid"]??"");
	$roleid=mysqli_real_escape_string($con,$_POST["roleid"]??"");
	$firstname=mysqli_real_escape_string($con,$_POST["firstname"]??"");
	$lastname=mysqli_real_escape_string($con,$_POST["lastname"]??"");
	$email=mysqli_real_escape_string($con,$_POST["email"]??"");
	$password=mysqli_real_escape_string($con,$_POST["password"]??"");
	$password=encrypt_decrypt("encrypt",$password);
	$tel=mysqli_real_escape_string($con,$_POST["tel"]??"");
	// echo $uid;
	if($uid!="undefined"){
		mysqli_query($con,"UPDATE  admins SET name='".$email."',email='".$email."',firstname='$firstname',lastname='$lastname',password='$password',tel='$tel',roleids='".$roleid."' WHERE id='".$uid."' ");			
	}else{
		mysqli_query($con,"INSERT INTO admins SET  name='".$email."',email='".$email."',firstname='$firstname',lastname='$lastname',password='$password',tel='$tel',roleids='".$roleid."' ");	
		$uid=mysqli_insert_id($con);
	}
	mysqli_query($con,"DELETE FROM userperms WHERE userid='$uid' ");
	
	$q1=mysqli_query($con,"SELECT * FROM roleperms WHERE roleid='".$roleid."'");
	while($r1=mysqli_fetch_array($q1)){
		mysqli_query($con,"INSERT INTO userperms SET userid='$uid',permid='".$r1["permid"]."' ");
	}
	echo 1;
}
?>