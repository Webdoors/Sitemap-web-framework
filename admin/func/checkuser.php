<?php

	$user=mysqli_real_escape_string($con,$_POST["user"]);
	$pass=mysqli_real_escape_string($con,$_POST["pass"]);

	$q1=mysqli_query($con,"SELECT * FROM admins WHERE user='".$user."' AND sms='1'");
	$r1=mysqli_fetch_array($q1);
	$cou=$q1?mysqli_num_rows($q1):0;
	if($cou>0){
		echo 1;
	}else{
		echo 0;
	}



?>