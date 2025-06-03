<?php
if(isset($_SESSION['GuserID'])){
	$img=mysqli_real_escape_string($con,$_POST["img"]);
	$pid=mysqli_real_escape_string($con,$_POST["productid"]);
	$q1=mysqli_query($con,"SELECT code FROM products WHERE id='".$pid."'");
	$r1=mysqli_fetch_array($q1);
	mysqli_query($con,"INSERT INTO productimgs SET img='$img',productid='".$pid."',code='".$r1["code"]."'");
	$iid=mysqli_insert_id($con);
?>
			<div class="row IMGS mb-2 pb-2">
<div class="col-sm-2">
	<img src="<?=$img?>" style="height:50px;" class=" CROPPER CP">
</div>
<div class="col-sm-2">
	<label for="M<?=$iid?>">მთავარი </label><input type="checkbox" name="M" id="M<?=$iid?>"  class="UPT2 ml-2" d="<?=$iid?>" t="productimgs" n="main"/>
</div>
<div class="col-sm-2">
	<button class="btn iframe-btn btn-danger DGA ml-2" d="<?=$iid?>" n="productimgs"><i class="fa fa-trash text-light"></i></button>
</div>
<div class="col-sm-6">
</div>
</div>
<?php
}
?>