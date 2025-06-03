<?php
$uid=$_SESSION["GuserID"];
if($uid!=""){
	$T=time();
	$roleid=mysqli_real_escape_string($con,$_POST["roleid"]??"");
	$rolename=mysqli_real_escape_string($con,$_POST["rolename"]??"");
	$perms=mysqli_real_escape_string($con,$_POST["perms"]??"");
	if($roleid!="undefined"){
		mysqli_query($con,"UPDATE  roles SET rolename='$rolename' WHERE id='".$roleid."' ");			
	}else{
		mysqli_query($con,"INSERT INTO roles SET rolename='$rolename' ");	
		$roleid=mysqli_insert_id($con);
	}
	mysqli_query($con,"DELETE FROM roleperms WHERE roleid='".$roleid."' ");	
	$perms=explode(",",$perms);
	
	foreach($perms as $perm){
		mysqli_query($con,"INSERT INTO roleperms SET roleid='$roleid',permid='".$perm."' ");
	}
	echo 1;
}
?>