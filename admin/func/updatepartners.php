<?php
if($_SESSION['admin_name']!=""){
	$id=mysqli_real_escape_string($con,$_POST["id"]??"");
	$pos=mysqli_real_escape_string($con,$_POST["pos"]??"");
	mysqli_query($con,"UPDATE partners SET position='".$pos."' WHERE id='".$id."'");
	echo 1;
}
?>