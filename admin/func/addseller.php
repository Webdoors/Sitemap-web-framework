<?php
$a=$_POST['a'];

mysqli_query($con, "INSERT INTO sellers (name) VALUES ('$a') ");

echo 1;
?>