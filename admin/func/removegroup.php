<?php

session_start();

if(isset($_SESSION['GuserID'])){

	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);

	mysqli_query($con,"UPDATE products  SET groupid=concat_ws('','g',id) WHERE id='".$a."'");

	// $id=mysqli_insert_id($con);
echo 1;
}

?>