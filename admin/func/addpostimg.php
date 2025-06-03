<?php
if(isset($_SESSION['GuserID'])){
	$postid=mysqli_real_escape_string($con,$_POST["postid"]);
	$img=mysqli_real_escape_string($con,$_POST["img"]);

	mysqli_query($con,"INSERT INTO postimgs SET postid='$postid',img='$img'");
	echo mysqli_insert_id($con);
}
?>
