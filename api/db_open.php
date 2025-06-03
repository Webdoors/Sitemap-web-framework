<?php

	$con=mysqli_connect("localhost","admin_socmarl","********","admin_socmarl"); 
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_set_charset($con,"utf8");
?>
