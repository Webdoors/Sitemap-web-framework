<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$q3=mysqli_query($con,"SELECT * FROM special as t1 LEFT JOIN productbase as t2 on(t1.ITEM=t2.name) WHERE  t1.BARCODE='".$b."' LIMIT 1");
	$r3=mysqli_fetch_array($q3);
	mysqli_query($con,"UPDATE special SET salesprice='".$a."' WHERE BARCODE='".$b."'");
	mysqli_query($con,"UPDATE productbase SET salesprice='".$a."' WHERE name='".$r3["name"]."'");
	echo 1;

}
?>