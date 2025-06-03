<?php
if(isset($_SESSION['uid'])){
	$uid=$_SESSION['uid'];
	$T=time();
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$q1=mysqli_query($con,"SELECT id FROM reviews WHERE uid='".$uid."' AND pid='".$b."'");
	if(mysqli_num_rows($q1)>0){
		mysqli_query($con,"update reviews SET star='".$a."',text='".$c."' WHERE uid='".$uid."' AND pid='".$b."'");
	}else{
		mysqli_query($con,"INSERT INTO reviews SET star='".$a."',uid='".$uid."',text='".$c."',pid='".$b."',date='".$T."'");		
	}
	echo 1;
}
?>