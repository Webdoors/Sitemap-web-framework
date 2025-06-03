<?php
if(isset($_SESSION['GuserID'])){
	$table=mysqli_real_escape_string($con,$_POST["table"]);
	$column=mysqli_real_escape_string($con,$_POST["column"]);
	$value=mysqli_real_escape_string($con,$_POST["value"]);
	mysqli_query($con,"INSERT INTO $table SET $column='$value'");
	echo 1;
}
?>