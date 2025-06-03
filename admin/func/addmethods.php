<?php
$a=$_POST['a'];

mysqli_query($con, "INSERT INTO methods (name) VALUES ('$a') ");

echo 1;
?>