<?php
session_start();
if($_SESSION['GuserID']!=""){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$q1=mysqli_query($con,"SELECT id FROM `permissions` WHERE `adminid`='".$b."'");
	if(mysqli_num_rows($q1)>0){
		mysqli_query($con,"UPDATE `permissions` SET `".$a."`='".$c."' WHERE `adminid`='".$b."'");		
	}else{
		mysqli_query($con,"INSERT INTO `permissions` SET `".$a."`='".$c."',`adminid`='".$b."'");		
	}
	echo 1;
}

?>