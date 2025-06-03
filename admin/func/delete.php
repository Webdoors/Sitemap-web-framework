<?php
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	if($a=="products"){
		$q1=mysqli_query($con,"SELECT sitemapid FROM products WHERE id='".$b."'");
		$r1=mysqli_fetch_array($q1);
		mysqli_query($con,"DELETE FROM sitemap WHERE id='".$r1["sitemapid"]."'");			
	}
		mysqli_query($con,"DELETE FROM `$a` WHERE id='$b'");
		echo "DELETE FROM `$a` WHERE id='$b'";
	$lng=mysqli_query($con,"SELECT * FROM langs WHERE tableName='$a' AND tableId='$b' ");
	if(mysqli_num_rows($lng)>0)
	{
		mysqli_query($con,"DELETE FROM langs WHERE tableName='$a' AND tableId='$b' ");
	}
	echo 1;
}
?>