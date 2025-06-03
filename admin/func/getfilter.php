<?php
$a=mysqli_real_escape_string($con,$_POST["a"]);
?>	
	<div class="container-fluid IB">
		<div class="row">
			<div class="col-md-8 NOP">
				<input class="form-control ANF" placeholder="ფილტრის სახელი GE" t="filter" n="pos" d="<?=$a?>"/>
			</div>
			<div class="col-md-4 NOP">
				&nbsp;<div class="btn btn-primary ADF IB" d="<?=$a?>">ფილტრის დამატება</div>
			</div>
		</div>
<?php
	$qf=mysqli_query($con,"SELECT * FROM filter WHERE fid='".$a."' ORDER BY pos ASC ");
	while($rf=mysqli_fetch_array($qf)){
?>

<div class="row" style="margin-top:7px">
	<div class="col-md-3"><input class="form-control UPT" placeholder="nameen" t="filter" value="<?=$rf["nameen"]?>" n="nameen" d="<?=$rf["id"]?>"/></div>
	<div class="col-md-3"><input class="form-control UPT" placeholder="namege" t="filter" value="<?=$rf["namege"]?>" n="namege" d="<?=$rf["id"]?>"/></div>
	<div class="col-md-3 d-none"><input class="form-control UPT" placeholder="nameru" t="filter" value="<?=$rf["nameru"]?>" n="nameru" d="<?=$rf["id"]?>"/></div>
	<div class="col-md-1 NOP"><input class="form-control UPT" placeholder="Position" t="filter"  value="<?=$rf["pos"]?>" n="pos" d="<?=$rf["id"]?>"/></div>
	<div class="col-md-1"> <div class="btn btn-danger DGA" d="<?=$rf["id"]?>" n="filter" ><i class="fa fa-trash"></i></div></div>
</div>
<?php
	}
?> 
	</div>