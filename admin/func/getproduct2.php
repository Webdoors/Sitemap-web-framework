<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$a=mysqli_real_escape_string($con,$_POST["a"]);
$b=mysqli_real_escape_string($con,$_POST["b"]);
mysqli_query($con,"INSERT INTO productsuggest SET pid='".$b."',spid='".$a."' ");
echo 1;
?>
