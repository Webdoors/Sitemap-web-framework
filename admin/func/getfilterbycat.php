<?php
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
$q4=mysqli_query($con,"SELECT * FROM fcategory WHERE cid='".$a."'");
if(mysqli_num_rows($q4)>0){
	while($r4=mysqli_fetch_array($q4)){
	$q5=mysqli_query($con,"SELECT * FROM filters WHERE id='".$r4["fid"]."'");
	$r5=mysqli_fetch_array($q5);
?>
			<div class="col-md-12"><label><?=$r5["nameen"]?></label></div>
<?php
	$q6=mysqli_query($con,"SELECT * FROM filter WHERE fid='".$r4["fid"]."'");
		while($r6=mysqli_fetch_array($q6)){
		$q7=mysqli_query($con,"SELECT * FROM fproduct WHERE flid='".$r6["id"]."' AND pid='".$pid."'");
		$r7=mysqli_fetch_array($q7);
?>
			<div class="col-md-12"><input class="UPF" <?=$r7["val"]==1?"checked":""?> d="<?=$r6["id"]?>" type="checkbox" />&nbsp;<?=$r6["nameen"]?></div>
<?php
		}
	}
}else{
	echo "No filters";
}
}
?>