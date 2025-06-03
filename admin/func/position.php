<?php
if(isset($_SESSION['GuserID'])){

	$a=json_decode($_POST["children"],1);
echo 1;
	 
	foreach($a as $k=>$v){
		mysqli_query($con,"UPDATE sitemap SET pos='".$k."' WHERE id='".$v."' ");
	}
}
?>