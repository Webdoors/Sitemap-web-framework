<?php

$a=$_POST['a'];

mysqli_query($con, "DELETE FROM methods WHERE id='$a'");
echo 1;


?>