<?php
$a=(int)$_POST['a'];  $b=(int)$_POST['b']; 
 mysqli_query($con,"UPDATE promocodes SET active='$b' WHERE id='$a' "); 
echo 1;
 
 ?>