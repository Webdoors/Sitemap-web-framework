<?php
$uid=$_SESSION["GuserID"];
if($uid!=""){
	$T=time();
	$uid=mysqli_real_escape_string($con,$_POST["uid"]??"");
	$perms=mysqli_real_escape_string($con,$_POST["perms"]??"");

	mysqli_query($con,"DELETE FROM userperms WHERE userid='".$uid."' ");	
	$perms=explode(",",$perms);
	
	foreach($perms as $perm){
		mysqli_query($con,"INSERT INTO userperms SET userid='$uid',permid='".$perm."' ");
	}
	echo 1;
}
?>