<?php
$a=mysqli_real_escape_string($con,$_POST["a"]);
?>	
	<div class="row NOP IB">
		<div class="col-md-7 NOP">
			<select class="form-control SFL">
				<option>Choose Filter Group</option>
<?php
	$q1=mysqli_query($con,"SELECT * FROM filters ORDER BY pos ASC ");
	while($r1=mysqli_fetch_array($q1)){
?>
				<option value="<?=$r1["id"]?>"><?=$r1["nameen"]?> <?=$r1["comment"]?></option>
<?php
	}
?>
			</select>
		</div>
		<div class="col-md-5">
			<div class="btn btn-primary AFG IB" d="<?=$a?>">Add filter group</div>
		</div>
<?php
	$qf=mysqli_query($con,"SELECT * FROM fcategory WHERE cid='".$a."' ORDER BY pos ASC ");
	while($rf=mysqli_fetch_array($qf)){
		$q1=mysqli_query($con,"SELECT * FROM filters WHERE id='".$rf["fid"]."' ORDER BY pos ASC ");
		$r1=mysqli_fetch_array($q1);
?>

<div class="col-sm-12" style="margin-top:7px">
	<div class="row" style="margin-top:7px">
		<div class="col-md-10"><?=$r1["nameen"]?></div>
		<div class="col-md-2"> <div class="btn btn-primary DGA" d="<?=$rf["id"]?>" n="fcategory" >Delete</div></div>
	</div>
</div>
<?php
	}
?> 
	</div>