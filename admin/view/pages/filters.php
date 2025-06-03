<div class="container-fluid">
<div class="col-md-12 LIS H">
	<div class="D1 d-none" style="width:20px"></div>
	<div class="D2" style="width:30%"><input placeholder="ფილტრის ჯგუფის სახელი GE" class="ADN w-100"/></div>
	<div class="D2" style="width:0px"></div>
	<div class="D6" style="width:180px"><input value="ფილტრის ჯგუფის დამატება" type="button" class="AFI"/></div>	
</div> 
<div class="row" style="margin-top:7px">
	<div class="col-md-2">დასახელება GE</div>
	<div class="col-md-2">დასახელება EN</div>
	<!-- <div class="col-md-2">Name RU</div> -->
	<div class="col-md-2">კომენტარი</div>
	<div class="col-md-2">
		ფილტრები
	</div>
	<div class="col-md-1">პოზიცია</div>
	<div class="col-md-1">წაშლა</div>
</div>
<?php
	$qc=mysqli_query($con,"SELECT * FROM filters ORDER BY pos ASC ");
	while($rc=mysqli_fetch_array($qc)){
?>

<div class="row" style="margin-top:7px">
	<div class="col-md-2"><input class="form-control UPT" placeholder="დასახელება ge" t="filters" value="<?=$rc["namege"]?>" n="namege" d="<?=$rc["id"]?>"/></div>
	<div class="col-md-2"><input class="form-control UPT" placeholder="დასახელება en" t="filters" value="<?=$rc["nameen"]?>" n="nameen" d="<?=$rc["id"]?>"/></div>
	<!-- <div class="col-md-2"><input class="form-control UPT" placeholder="nameru" t="filters" value="<?=$rc["nameru"]?>" n="nameru" d="<?=$rc["id"]?>"/></div> -->
	<div class="col-md-2"><input class="form-control UPT" placeholder="კომენტარი" t="filters" value="<?=$rc["comment"]?>" n="comment" d="<?=$rc["id"]?>"/></div>
	<div class="col-md-2">
		<div class="btn btn-primary GFI" d="<?=$rc["id"]?>">ფილტრები</div>
	</div>
	<div class="col-md-1"><input class="form-control UPT" placeholder="Position" t="filters"  type="number" value="<?=$rc["pos"]?>" n="pos" d="<?=$rc["id"]?>"/></div>
	<div class="col-md-1"><div class="btn btn-danger DGA" d="<?=$rc["id"]?>" n="filters" ><i class="fa fa-trash"></i></div></div>
</div>
<?php
	}
?> 
</div>