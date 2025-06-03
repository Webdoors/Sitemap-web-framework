<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$gid=mysqli_real_escape_string($con,$_REQUEST["gid"]??"");
if($gid==""){
	$q1=mysqli_query($con,"INSERT INTO products SET nameen=''");
	$pid=mysqli_insert_id($con);
	mysqli_query($con,"DELETE FROM products WHERE id='".$pid."' ");	
	mysqli_query($con,"INSERT INTO productgroups SET id='".$pid."' ");	
	$gid=mysqli_insert_id($con);
}

$qp=mysqli_query($con,"SELECT * FROM productgroups WHERE id='".$gid."' LIMIT 1");
$rp=mysqli_fetch_array($qp);
if(mysqli_num_rows($qp)<1){
	mysqli_query($con,"INSERT INTO productgroups SET id='".$pid."' ");	
	$gid=mysqli_insert_id($con);	
	$qp=mysqli_query($con,"SELECT * FROM productgroups WHERE id='".$gid."' LIMIT 1");
	$rp=mysqli_fetch_array($qp);
}
    $q1=mysqli_query($con,"SELECT t1.id,t1.pos,t1.active,t1.nameen,t1.namege,t1.slug,t1.code,t1.sale,t1.saleprice,t1.price,
(SELECT nameen FROM categories as t2 WHERE t2.id=t1.category LIMIT 1) as 'cat',
(SELECT nameen FROM brands as t3 WHERE t3.id=t1.brand LIMIT 1) as 'brandi' FROM products as t1
WHERE t1.groupid='".$gid."' ");
$r10=mysqli_fetch_all($q1,MYSQLI_ASSOC); 

@$cat=$r10[0]["cat"];
// echo $gid;
?>
<style>
td{
	padding:0px !important;
	text-align:center!important;
}
.form-control {
    padding: 0px !important;
    height: auto;
    border-radius: 0px;
}
</style>
<input class="gid" type="hidden" value="<?=$gid?>"/>
<script>
const url = new URL(window.location);
url.searchParams.set('gid', $(".gid").val());
window.history.pushState({}, '', url);
</script>
<div class="container-fluid">
<div class="col-md-12">
<div class="row pt-4">

	<div class="col-md-12 px-0">
		<div class="row">
			<div class="col-md-7">
		<input placeholder="პროდუქტის დამატება Id-ით ან code-ით"  class="w-75 form-control d-inline form-control PROCO" d="code"/>&nbsp;<a style="vertical-align: top;" class="btn btn-primary py-0 px-1 GETPROCO"><i class="fa fa-plus text-white"></i></a>
			</div>
			<div class="col-md-6">
<table class="table table-striped mt-2 table-condensed table-bordered">
	<thead>
		<tr>
			<td>
			ACTIVE
			</td>
			<td>
<input type="checkbox" class="CHK" <?=$r10[0]["active"]?"checked":""?> d="active"/>			</td>
		</tr>	
		<tr>
			<td>
			GROUP PART #
			</td>
			<td>
<input placeholder="Groupcode" value='<?=$rp["groupcode"]?>' class="w-50 UPT  d-inline form-control" t="productgroups" d="<?=$rp["id"]?>" n="groupcode"/>
			</td>
		</tr>

		<tr>
			<td>
			NAME GE
			</td>
			<td>
<input class="form-control UPT SLG3" n="namege" t="productgroups" d="<?=$rp["id"]?>" placeholder="Item name" value="<?=$rp["namege"]?>"/>
			</td>
		</tr>
		<tr>
			<td>
			NAME EN
			</td>
			<td>
<input class="form-control UPT SLG3" n="nameen" t="productgroups" d="<?=$rp["id"]?>" placeholder="Item name" value="<?=$rp["nameen"]?>"/>
			</td>
		</tr>
		<tr>
			<td>
	<div class="btn btn-primary py-0 GETMAP" d="<?=$pid?>">Category</div>
			</td>
			<td>
	<input class="form-control" disabled value="<?=$cat?>"/>
			</td>
		</tr>
		<tr>
			<td>
			SLUG
			</td>
			<td class="position-relative">
				<input class="form-control UPT SLV" n="slug"  t="productgroups" d="<?=$rp["id"]?>" readonly placeholder="slug" value="<?=$rp["slug"]?>"/>
				<input type="checkbox" class="position-absolute" style="top:4px;right:4px;" onclick="$(this).prev().prop('readonly',!$(this).prev().attr('readonly'))" />
			</td>
		</tr>
	</thead>
</table>
</div>
</div>
<table class="table table-striped mt-2 table-condensed table-bordered">
	<thead>
		<tr>
			<td>
			POS
			</td>
			<td>
			
			</td>
			<td>
			კოდი
			</td>
			<td>
			დაახელება WEB GE
			</td>
			<td>
			PRICE
			</td>

			<td>
			INSTOCK
			</td>
			<td>
		
			</td>
		</tr>
	</thead>
	<tbody class="PROCOS">
<?php

    
	foreach($r10 as $r1){
		$cat=$r1["cat"];
//	    ase loopshi gamodzaxeba ara efficient aris
	 $q3=mysqli_query($con,"SELECT img,ident,ext FROM productimgs WHERE productid='".$r1["id"]."' AND main=1");
	 $r3=mysqli_fetch_array($q3);
	$img=$r3["img"];
	if($img==""){
		$img="uploads/noimg.png";
	}	
?>
	<tr>
		<td><input class="form-control UPT mx-auto text-center" placeholder="Pos" style="width:70px" type="number"value="<?=$r1["pos"]?>" d="<?=$r1["id"]?>" t="products" n="pos" value="<?=$r1["pos"]?>"/></td>
		<td><a class="example-image-link" href="<?=$img?>" data-title="<?=$r1["nameen"]?>" data-lightbox="example-1"><img style="max-width:70px" src="<?=$img?>" alt="Main image"/></a></td>
		<td><a href="?page=product&id=<?=$r1["id"]?>" target="_blank"><span class="FORSLUG" d="<?=$r1["code"]?>"><?=$r1["code"]?></span><br><small>(Edit)</small></a></td>
		<td><a href="/ka/product/<?=$r1["slug"]?>" target="_blank"><?=$r1["nameen"]?><br><small>(View)</small></a></td>
		<td><span style="<?=$r1["sale"]!="0"?"text-decoration: line-through;":""?>"><?=$r1["price"]?> ₾</span><br><span class="<?=$r1["sale"]!="0"?"":"d-none"?>"><?=$r1["sprice"]?> ₾</span></td>

	
	

		<td>

		</td>
		<td><a class="btn btn-danger REMGROUP"d="<?=$r1["id"]?>" gid="<?=$gid?>" ><i class="fa fa-trash  text-white"></i></a></td>
	</tr>	
<?php
	}
?>
	</tbody>
</table>
	

	</div>
	</div>
	</div>	
</div>	
</div>	
<br>&nbsp;
<div class="col-md-12">
<div class="row">
	<div class="col-md-12 ">
		&nbsp;


	</div>
	</div>
	<br>&nbsp;
</div>
</div>

