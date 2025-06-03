<?php
include('../db.php');
   $r=mysqli_query($con, "SELECT * FROM productbase");
   while($rr=mysqli_fetch_assoc($r))
   
   {$c=$rr['name'];
     $b=$rr['barcode'];
	   mysqli_query($con, "UPDATE orders SET barcode='$b'  WHERE itemname='$c' ");
   }

?>