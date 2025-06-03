<?php
if(isset($_SESSION['GuserID'])){
	mysqli_query($con,"INSERT INTO sitemap SET name_ka='',itemtype='3'");
	$sid=mysqli_insert_id($con);
	mysqli_query($con,"INSERT INTO products SET title_ka='product_sitemapid-".$sid."',sitemapid='".$sid."'");
	$pid=mysqli_insert_id($con);
	mysqli_query($con,"UPDATE sitemap SET name_ka='product_sitemapid-".$sid."' WHERE id='".$sid."'");
	echo $pid;
	$q1=mysqli_query($con,"SELECT * FROM filters ");
	while($r1=mysqli_fetch_array($q1)){
		mysqli_query($con,"INSERT INTO goods_prices SET good_id='".$pid."',group_id='".$r1["id"]."' ");		
	}
}
?>