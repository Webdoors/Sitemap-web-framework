<?php
if(isset($_SESSION['GuserID'])){
	$file=mysqli_real_escape_string($con,$_POST["file"]);
	$pid=mysqli_real_escape_string($con,$_POST["productid"]);
	$q1=mysqli_query($con,"SELECT code FROM products WHERE id='".$pid."'");
	$r1=mysqli_fetch_array($q1);
	mysqli_query($con,"INSERT INTO productfiles SET file='$file',productid='".$pid."',code='".$r1["code"]."'");
	$iid=mysqli_insert_id($con);
		$file=explode("/",$file);
	$file=end($file);
?>
<div class="row FILES mb-2 pb-2">
<div class="col-sm-2 mb-2 pb-2">
	<a target="_blank" href="<?=$r2["file"]?>" style="height:30px"  ><?=$file?></a>
</div>
<div class="col-sm-2">
</div>
<div class="col-sm-2">
	<button class="btn iframe-btn btn-danger DGA ml-2" d="<?=$iid?>" n="productfiles"><i class="fa fa-trash text-light"></i></button>
</div>
<div class="col-sm-6">
</div>
</div>
<?php
}
?>