<?php

$a=$_POST['a'];

mysqli_query($con, "DELETE FROM sellers WHERE id='$a'");
echo 1;


?>