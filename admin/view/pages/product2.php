<?php

$a=mysqli_real_escape_string($con,$_GET["id"]);


$T=time();

if($a!=""){
	$q1=mysqli_query($con,"SELECT * FROM products WHERE id='".$a."' ");
	$r1=mysqli_fetch_array($q1);
}else{

	$ina=mysqli_query($con,"INSERT INTO products SET date='$T' ");

	// $dd=mysqli_query($con, "SELECT id FROM products  ORDER BY id DESC");
	// $rd=mysqli_fetch_array($dd);$a=$rd['id'];
	$a=mysqli_insert_id($con);
	
	

	?>
	
<script>location.href="?page=product&id=<?=$a?>"</script>
<?php
	}
	
?>
<style>
td,select,input{
	padding: 2px!important;
	height: 30px!important;
	font-size: 12px!important;
}
.ADDIMG{
	height: 26px!important;
}
</style>
<div class="container">
                                                

	<div class="col-sm-12 my-3">
	<h3 class="title mt-3 mb-4 p-2 d-inline w-75">
    <span>
        <?=$r1["nameen"]?> - პროდუქტის რედაქტირება 
    </span>
</h3>	<a href="/product/<?=$r1["id"]?>"><button class="btn btn-primary d-inline">საიტზე პროდუქტის ნახვა</button></a>
	</div>
	<div class="col-sm-12 my-3">
<table class="table table-striped table-bordered">
	<tr>
		<td colspan="7">ოპციების დამატება</td>
	</tr>
	<tr>
		<td>მეხსიერება</td>
		<td>ფერი</td>
		<td>მდგომარეობა</td>
		<td>ფასი ₾</td>
		<td>ფასი ბარათით</td>	
		<td>სურათი</td>
		<td></td>
	</tr>
	<tr>
		<td>
				<select class="form-control col-sm-12 INP" n="size" value="<?=$r1["cardpriceusd"]?>" rows="10" data-locale="ge" id="SLGGE" placeholder="0.00" name="SLGGE" cols="50">
					<option>ზომა</option>
<?php
$q1=mysqli_query($con,"SELECT * FROM sizes ");
while($r1=mysqli_fetch_array($q1)){
?>
					<option <?=$r1["id"]==$p["size"]?"selected":""?> value="<?=$r1["id"]?>" ><?=$r1["nameen"]?></option>
<?php
}
?>
				</select>		
		</td>
		<td>
				<select class="form-control col-sm-12 INP" n="color" value="<?=$r1["cardpriceusd"]?>" rows="10" data-locale="ge" id="SLGGE" placeholder="0.00" name="SLGGE" cols="50">
					<option>ფერი</option>
<?php
$q1=mysqli_query($con,"SELECT * FROM colors");
while($r1=mysqli_fetch_array($q1)){
?>
					<option <?=$r1["id"]==$p["color"]?"selected":""?> value="<?=$r1["id"]?>" ><?=$r1["nameen"]?></option>
<?php
}
?>
				</select>		
		</td>
		<td>
<select class="form-control INP" n="conditions" >
	<option value="">
		მდგომარეობა
	</option>
<?php
$q2=mysqli_query($con,"SELECT * FROM conditions ORDER BY nameen ASC");
while($r2=mysqli_fetch_array($q2)){
?>	
	<option <?=$r1["conditions"]==$r2["nameen"]?"selected":""?> value="<?=$r2["nameen"]?>">
		<?=$r2["nameen"]?>
	</option>	
<?php
}
?>	
</select>		
		</td>
		
		<td><input class="form-control col-sm-12 INP" n="priceUSD" value="<?=$r1["priceUSD"]?>" rows="10" data-locale="ge" id="SLGGE" name="SLGGE" placeholder="0.00" cols="50"></td>
		<td><input class="form-control col-sm-12 INP" n="price" value="<?=$r1["price"]?>" rows="10" data-locale="ge" id="SLGGE" placeholder="0.00" name="SLGGE" cols="50"></td>
		<td><div class="input-append row">
					<div class="col-md-9 pr-1">
						<input id="YDA97670323" class="form-control PIMG" placeholder="სურათის ლინკი" type="text" value="">	
					</div>
					<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA97670323&relative_url=0')"><button class="btn iframe-btn btn-outline-success px-1 py-0"><i class="fa fa-upload"></i></button></a>
					<button class="btn iframe-btn btn-primary ADDIMG ml-1 px-1 py-0" d="<?=$a?>"><i class="fa fa-plus"></i></button>
				</div></td>
		<td><a class="btn btn-success px-1 py-0"><i class="fa fa-plus text-white"></i></a></td>
	</tr>
<tr>
		<td>
				<select class="form-control col-sm-12 INP" n="size" value="0" rows="10" data-locale="ge" id="SLGGE" placeholder="0.00" name="SLGGE" cols="50">
					<option>ზომა</option>
					<option value="1">128GB</option>
					<option selected value="2">256GB</option>
					<option value="3">512GB</option>
					<option value="4">1TB</option>
					<option value="5">64GB</option>
				</select>		
		</td>
		<td>
				<select class="form-control col-sm-12 INP" n="color" value="" rows="10" data-locale="ge" id="SLGGE" placeholder="0.00" name="SLGGE" cols="50">
					<option>ფერი</option>
					<option value="1">white</option>
					<option value="3">black</option>
					<option selected value="4">gold</option>
					<option value="5">silver</option>
					<option value="6">blue</option>
					<option value="7">red</option>
				</select>		
		</td>
		<td>
<select class="form-control INP" n="conditions">
	<option value="">
		მდგომარეობა
	</option>
	
	<option selected value="A">
		A	</option>	
	
	<option value="A+">
		A+	</option>	
	
	<option value="A-">
		A-	</option>	
	
	<option value="New">
		New	</option>	
	
</select>		
		</td>
		<td><input class="form-control col-sm-12 INP" n="priceUSD"  rows="10" data-locale="ge" id="SLGGE" name="SLGGE" placeholder="0.00" value="7000" cols="50"></td>
		<td><input class="form-control col-sm-12 INP" n="price"  rows="10" data-locale="ge" id="SLGGE" placeholder="0.00" name="SLGGE" value="6500" cols="50"></td>
		<td><div class="input-append row">
					<div class="col-md-9 pr-1">
						<input id="YDA97670323" class="form-control PIMG" placeholder="სურათის ლინკი" type="text" value="">	
					</div>
					<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA97670323&relative_url=0')"><button class="btn iframe-btn btn-outline-success px-1 py-0"><i class="fa fa-upload"></i></button></a>
					<button class="btn iframe-btn btn-primary ADDIMG ml-1 px-1 py-0" d="<?=$a?>"><i class="fa fa-plus"></i></button>
				</div></td>		
		<td><a class="btn btn-danger px-1 py-0"><i class="fa fa-trash text-white"></i></a></td>
	</tr>
<tr>
		<td>
				<select class="form-control col-sm-12 INP" n="size" value="0" rows="10" data-locale="ge" id="SLGGE" placeholder="0.00" name="SLGGE" cols="50">
					<option>ზომა</option>
					<option value="1">128GB</option>
					<option value="2">256GB</option>
					<option selected value="3">512GB</option>
					<option value="4">1TB</option>
					<option value="5">64GB</option>
				</select>		
		</td>
		<td>
				<select class="form-control col-sm-12 INP" n="color" value="" rows="10" data-locale="ge" id="SLGGE" placeholder="0.00" name="SLGGE" cols="50">
					<option>ფერი</option>
					<option selected value="1">white</option>
					<option value="3">black</option>
					<option value="4">gold</option>
					<option value="5">silver</option>
					<option value="6">blue</option>
					<option value="7">red</option>
				</select>		
		</td>
		<td>
<select class="form-control INP" n="conditions">
	<option value="">
		მდგომარეობა
	</option>
	
	<option value="A">
		A	</option>	
	
	<option value="A+">
		A+	</option>	
	
	<option value="A-">
		A-	</option>	
	
	<option selected value="New">
		New	</option>	
	
</select>		
		</td>
		<td><input class="form-control col-sm-12 INP" n="priceUSD" rows="10" data-locale="ge" id="SLGGE" name="SLGGE" placeholder="0.00" value="1000" cols="50"></td>
		<td><input class="form-control col-sm-12 INP" n="price"  rows="10" data-locale="ge" id="SLGGE" placeholder="0.00" name="SLGGE" value="1500" cols="50"></td>
		<td><div class="input-append row">
					<div class="col-md-9 pr-1">
						<input id="YDA97670323" class="form-control PIMG" placeholder="სურათის ლინკი" type="text" value="">	
					</div>
					<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA97670323&relative_url=0')"><button class="btn iframe-btn btn-outline-success px-1 py-0"><i class="fa fa-upload"></i></button></a>
					<button class="btn iframe-btn btn-primary ADDIMG ml-1 px-1 py-0" d="<?=$a?>"><i class="fa fa-plus"></i></button>
				</div></td>		
		<td><a class="btn btn-danger px-1 py-0"><i class="fa fa-trash text-white"></i></a></td>
	</tr>
</table>	
	</div>