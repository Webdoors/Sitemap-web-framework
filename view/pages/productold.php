<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
$size=mysqli_real_escape_string($con,$_GET["size"]??"");

$conditions=mysqli_real_escape_string($con,$_GET["conditions"]??"");
$complect=mysqli_real_escape_string($con,$_GET["complect"]??"");
$color=mysqli_real_escape_string($con,$_GET["color"]??"");




$q111=mysqli_query($con,"SELECT t1.*,t2.id as 'pcat',t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug' FROM products as t1 
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid)
WHERE t2.slug='".$p5."' ORDER BY position ASC");

$r111=mysqli_fetch_array($q111);
$pid=$r111["id"];
$cat=$r111["pcat"];
	// if($r1["img"]!=""){
		// $img=$r1["img"];
	// }else{
		 // $img="/admin/uploads/products/".str_replace(" ","-",substr($r1["nameen"],0,6)).".jpg";
		// if(!file_exists(getcwd().$img)){
			// $img="/admin/img/noimage.png";
		// }		 
	// }
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container-fluid mt-4">
	<div class="row">
		<div class="col-sm-12 px-0 mt-1">
<?php
$q2=mysqli_query($con,"SELECT t1.*,
(SELECT t2.nameen FROM productgroups as t2 WHERE t1.groupid=t2.id) as 'groupname',
(SELECT t2.slug FROM productgroups as t2 WHERE t1.groupid=t2.id) as 'gslug'
 FROM products as t1  WHERE t1.category='".$cat."'  GROUP by t1.groupid ORDER BY t1.position ASC");

$numrows=mysqli_num_rows($q2);
?>
<div class="other-models <?=$numrows>0?"":"d-none"?> "> 
    <ul>
		
<?php
$slugi="";
$i=0;
$p7??"";
$groupid='';
$WFG="";
if($p6!=""){
	$q1=mysqli_query($con,"SELECT id FROM productgroups WHERE slug='".$p6."'");
	if(mysqli_num_rows($q1)==0){
		$WGR=" t1.slug='".$p6."'";
		
	}else{	
		$r1=mysqli_fetch_array($q1);
		$groupid=$r1["id"];
		$WGR=" t1.groupid='".$r1["id"]."'";
		if($size!='')
		{
		$WGR.=" AND t1.size IN( SELECT id FROM sizes WHERE nameen='$size'  )";
		}
		if($color!='')
		{
		$WGR.=" AND t1.color IN( SELECT id FROM colors WHERE nameen='$color'  )";
		}
		if($conditions!='')
		{
		$WGR.=" AND t1.conditions IN( SELECT id FROM conditions WHERE nameen='$color'  )";
		}
	}
	if($p7!=""){
		$WFG=" AND t1.slug='".$p7."' ";
	}
	
if($p5!="")
{
	$currprod=mysqli_query($con,"SELECT * FROM products WHERE id='$p5' ");
	$rcurrprod=mysqli_fetch_assoc($currprod);
	
}	

	$q1=mysqli_query($con,"SELECT t1.*,t2.id as 'pcat',t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug' FROM products as t1 
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid) WHERE ".$WGR." ".$WFG." ORDER BY t1.position ASC LIMIT 1");


}else{
	$q1=mysqli_query($con,"SELECT t1.*,t2.id as 'pcat',t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug' FROM products as t1 
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid)
WHERE t2.slug='".$p5."' ORDER BY position ASC");
}
$r1=mysqli_fetch_array($q1);
$p=$r1;
mysqli_query($con,"UPDATE products SET views=views+1 WHERE  id='".$r1["id"]."'");
while($r2=mysqli_fetch_array($q2)){
	if($slugi==""){
		$slugi=$r2["slug"];
	}
	$i++;
?>					
			<li class="<?=($p6==""&&$i==1)||($r2["gslug"]==""?$r2["slug"]:$r2["gslug"])==$p6?"active":""?>">
				<a href="<?=$L?>/product/<?=$r111["subcatslug"]?>/<?=$r2["gslug"]==""?$r2["slug"]:$r2["gslug"]?>" class="<?=($p6==""&&$i==1)||($r2["gslug"]==""?$r2["slug"]:$r2["gslug"])==$p6?"font-weight-bold":""?>">
					<i class="icon iphonexs" style="background-image: url('<?=$r2["img"]?>');"></i><p><?=$r2["groupname"]==""?$r2["titlege"]:$r2["groupname"]?> </p>
				</a>
				<p class="other-models-p"><?=$r2["smalltexten"]?></p>
			</li>
<?php
}
	
$pid=$r1["id"];
$q5=mysqli_query($con,"SELECT * FROM productimgs WHERE productid='".$pid."' AND main='1'");
$r5=mysqli_fetch_array($q5);
$img=$r5["img"];
$p=$r1;
?>					

		
    </ul>
</div>
		</div>
	</div>
</div>
<div class="container mt-3">
	<div class="row mb-3">
		<div class="col-sm-12">

		</div>	
		<small class="col-sm-12">
			<a class="GRAY" href="/">მთავარი</a>
			<i aria-hidden="true" class="fa fa-angle-right GRAY"></i>
			<a class="GRAY" href="<?=$L?>/products">პროდუქცია</a>
			<i aria-hidden="true" class="fa fa-angle-right GRAY <?=$r1["cat"]==""?"d-none":""?>"></i>
			<a class="GRAY" href="<?=$L?>/products/<?=$r1["catslug"]?>"><?=$r1["cat"]?></a>
			<i aria-hidden="true" class="fa fa-angle-right GRAY"></i>
			<a class="GRAY" href="<?=$L?>/products/<?=$r1["subcatslug"]?>"><?=$r1["subcat"]?></a>
			<i aria-hidden="true" class="fa fa-angle-right GRAY"></i>
			<a class="GRAY" href="<?=$L?>/product/<?=$r1["id"]?>"><?=$r1["titlege"]?></a>
		</small>	
	</div>
	<div class="row">
		<div class="col-sm-6">
			<a class="example-image-link w-100" href="<?=$img?>" data-title="<?=$r1["nameen"]?> - ფასი: <?=number_format($r1["price"])?> ₾" data-lightbox="example-1"><img style="width:61px" class="GIM w-100" src="<?=$img?>" alt="image-1" /></a>
			<div class="mt-3">
<?php
$q4=mysqli_query($con,"SELECT * FROM productimgs WHERE productid='".$pid."'");
while($r4=mysqli_fetch_array($q4)){
?>
			<a class="example-image-link w-100" href="<?=$r4["img"]?>" data-title="<?=$r1["nameen"]?>" data-lightbox="example-1"><img style="width:61px" class="GIM w-25" src="<?=$r4["img"]?>" alt="image-1" /></a>
<?php
}
$product1 = array(
'title'=>$r1["nameen"],
'price'=>round($r1["price"]/0.94),
'quantity' => 1,
);

$cart = array(
'products'=> [$product1],
'total_sum'=> round($r1["price"]/0.94),
);
?>
			</div>	
			<div class="mt-4 border-top pt-3">
			<strong class="mt-3">ამ პროდუქტთან ერთად ყიდულობენ</strong>
			<div class="row mt-3">
<?php
$q4=mysqli_query($con,"SELECT *,t2.id as 'prid' FROM productsuggest as t1 LEFT JOIN products as t2 ON(t1.spid=t2.id) WHERE t1.pid='".$pid."'");
if(mysqli_num_rows($q4)>0){
	while($r4=mysqli_fetch_array($q4)){
		
		$q5=mysqli_query($con,"SELECT * FROM productimgs WHERE productid='".$r4["prid"]."' AND main='1'");
$r5=mysqli_fetch_array($q5);
?>
<div class="col-sm-3">
<a href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r4["slug"]?>">
<img style="width:100px" class=" w-100" src="<?=$r5["img"]?>" alt="image" />
		<div class="text-dark">	<?=$r4["nameen"]?></div>
			<small><?=$r4["price"]??$r4["price"]?>₾</small>
</a>
<a class="btn btn-success p-0 ADDCART" d="<?=$r4["prid"]?>"><i class="fa fa-shopping-cart CP text-white"></i></a>
</div>
<?php		
	}
}
?>			
			</div>	
			</div>	
		</div>	
		<div class="col-sm-6">
			<div class="col-sm-12">
				<div class="col-sm-12">
					<h2 class="FWB TIT" d="<?=$r1["id"]?>"><?=$r1["titlege"]?></h2>
				</div>	
				
				<div class="col-sm-12">
					<div class="price-product">
						<h2 class="new-price my-4 PRI" d="<?=$r1["id"]?>">
							<?=number_format($p["price"])?>₾
							<span class="old-price <?=$p["saleprice"]!="0"?"":"d-none"?>">
								<small><?=number_format($p["price"])?>₾</small>
							</span>
						</h2>			
					</div>
				</div>
<?php
	$q11=mysqli_query($con,"SELECT * FROM products WHERE groupid='".$groupid."'");
	if(mysqli_num_rows($q1)>0){
?>
				<div class="col-sm-12 d-none">
					<select class="form-control GROPRO">
<?php
		while($r11=mysqli_fetch_array($q11)){
?>
						<option slug="<?=$L?>/product/<?=$r111["subcatslug"]?>/<?=$r11["slug"]?>" <?=$r11["slug"]==$p6?"selected":""?> value="<?=$r11["id"]?>"><?=$r11["nameen"]?></option>
<?php
		}
?>
					</select>
				</div>
<?php
	}
?>
<?php
	$q11=mysqli_query($con,"SELECT * FROM products WHERE groupid='".$groupid."' AND groupid<>''");
	if(mysqli_num_rows($q1)>0){
?>
				<div class="col-sm-12 mb-3">
					<div class="row">
<?php
		while($r11=mysqli_fetch_array($q11)){
?>
						<div class="col-sm-4 px-1">
							<a class="btn w-100 btn-<?=$r11["slug"]==$p7?"outline-primary text-dark":"outline-secondary text-dark"?> " href="<?=$L?>/product/<?=$r111["subcatslug"]?>/<?=$p6?>/<?=$r11["slug"]?>?size=<?=$size?>&color=<?=$color?>&complect=<?=$complect?>&conditions=<?=$conditions?>"><?=$r11["nameen"]?></a>				
						</div>
<?php
		}
?>
					</div>
				</div>
<?php
	}
?>
				<div class="col-sm-12">
				<strong><?=$r1["smalldesc"]?></strong>
				<hr>
				</div>
				<div class="col-sm-12 <?=$r1["saleprice"]<150?"d-none":""?>">
					<div class="price-product" style="font-weight:bold;color:#fc5340;">
						<span class="new-price ">
							განვადების შემთხვევაში <?=number_format($r1["saleprice"]/0.94)?>₾
						</span>
						
						<a class="ml-3" href="https://akido.ge//vendor_login/7665/?cart=<?=urlencode(json_encode($cart))?>"><img style="height:50px" src="/img/logo_ka.png" /></a>
					</div>
					
					<div class=" <?=$r1["saleprice"]<150?"d-none":""?>">თვეში <?=number_format($r1["saleprice"]/0.94/12)?>₾-დან</div>
					<div class="col-sm-12 <?=$r1["saleprice"]<150?"d-none":""?>">
						<form action="http://ganvadeba.credo.ge/widget/" id="myform" class="text-right pr-2 mt-2" method="post"> 
						<input type="hidden" name="credoinstallment" 
						value='{"merchantId":"11823", 
						"orderCode":"<?=rand(11111,99999)?>", 
						"check":"<?=md5($r1["id"].",".$r1["nameen"].",1".",".$r1["saleprice"].",0")?>", 
						"products":[ 
						{"id":"<?=$r1["id"]?>", 
						"title":"<?=$r1["nameen"]?>", 
						"amount":"1", 
						"price":"<?=$r1["saleprice"]/0.94*100?>", 
						"type":"0"} 
						]
						}' /> 
						<img onclick="document.forms['myform'].submit();" class="CP" style="width:200px;" src="/img/credo.png" />
						</form>
					</div>
					<hr>
				</div>	
<?php
$q6=mysqli_query($con,"SELECT DISTINCT(t1.size),(SELECT nameen FROM sizes as t2 WHERE t1.size=t2.id) as 'memory' FROM products as t1 WHERE t1.groupid='".$p["groupid"]."' AND t1.size<>'' GROUP BY size ORDER BY (SELECT position FROM sizes as t2 WHERE t1.size=t2.id) ASC ");
if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 mt-1 border-bottom p-3 px-0">
					<div class="row ">
						<div class="col-sm-12 ">
							<label>მეხსიერება</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){
?>
					
							<a class="btn mr-2 btn-<?=$r6["memory"]==$size?"outline-primary":"outline-secondary"?> text-dark" href="<?=$L?>/product/<?=$p5?>/<?=$p6?><?=$p7!=""?"/".$p7:""?>?size=<?=$r6["memory"]?>&color=<?=$color?>&complect=<?=$complect?>&conditions=<?=$conditions?>"><?=$r6["memory"]?></a>				
					
<?php
}
?>

					</div>
				</div>
<?php
}
?>
<?php
$q6=mysqli_query($con,"SELECT DISTINCT(t1.color),t1.id,(SELECT nameen FROM colors as t2 WHERE t1.color=t2.id) as 'colour' FROM products as t1 WHERE t1.groupid='".$p["groupid"]."' AND t1.color<>'' group by color ");

if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 mt-1 border-bottom p-3 px-0">
					<div class="row ">
						<div class="col-sm-12 ">
							<label>ფერი</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){
?>
						<div class="col-sm-1 ">
							<a class="btn <?=$r6["colour"]==$color?"COLORACT":""?> <?=$r6["colour"]?> border-white border text-white rounded-circle CP <?=$r6["colour"]?>" style="height:30px;width:30px;box-shadow: 0px 0px 9px #0009;border-width: 3px!important;" href="<?=$L?>/product/<?=$p5?>/<?=$p6?>/<?=$p7!=""?$p7:""?>?size=<?=$size?>&color=<?=$r6["colour"]?>&complect=<?=$complect?>&conditions=<?=$conditions?>"></a>				
						</div>
<?php
}
?>
					</div>
				</div>
<?php
}
?>
<?php
$q6=mysqli_query($con,"SELECT DISTINCT(t1.complect) FROM products as t1 WHERE t1.groupid='".$p["groupid"]."' AND t1.complect<>'' group by complect ");
if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 mt-1 border-bottom p-3 px-0">
					<div class="row ">
						<div class="col-sm-12 ">
							<label>კომპლექტაცია</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){
?>
						<div class="col-sm-12 mb-2">
							<a href="<?=$L?>/product/<?=$p5?>/<?=$p6?>/<?=$p7!=""?$p7:""?>?size=<?=$size?>&color=<?=$color?>&complect=<?=$r6["complect"]?>&conditions=<?=$conditions?>" class="btn btn-<?=$r6["complect"]==$p["complect"]?"outline-primary":"outline-secondary"?> text-dark CP" style="font-size:12px"><?=$r6["complect"]?></a>				
						</div>
<?php
}
?>						


					</div>
				</div>
<?php
}
?>
<?php
$q6=mysqli_query($con,"SELECT DISTINCT(t1.conditions) FROM products as t1 WHERE t1.groupid='".$p["groupid"]."' AND t1.conditions<>'' group by conditions ORDER BY conditions DESC");
if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 mt-1 border-bottom p-3 px-0">
					<div class="row ">
						<div class="col-sm-12 ">
							<label>მდგომარეობა</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){
?>
	
							<a style="font-size:21px;padding:0px 15px;" href="<?=$L?>/product/<?=$p5?>/<?=$p6?>/<?=$p7!=""?$p7:""?>?size=<?=$size?>&color=<?=$color?>&complect=<?=$complect?>&conditions=<?=urlencode($r6["conditions"])?>" class="btn btn-<?=$r6["conditions"]==$conditions?"outline-primary":"outline-secondary"?> text-dark CP mr-2" style="font-size:12px"><?=$r6["conditions"]?></a>				
				
<?php
}
?>						


					</div>
				</div>
<?php
}
?>
				<div class="col-sm-12 mt-4 GRAY2 d-none">
					<?=nl2br($r1["smalldesc"])?>
				</div>
				<div class="col-sm-12 mt-4 ">
					<span class="badge badge-<?=$p["QUANTITY"]>0?"success":"warning"?>"><?=$p["QUANTITY"]>0?"მარაგშია":"არ არის მარაგში " ?></span>
				</div>
				<div class="col-sm-12 mt-4">
					<div class="row">
						<div class="col-sm-3 px-0 quantity-product js-call-quantity">
							<span class="btn-num-product-down col-sm-1 MINU"><i aria-hidden="true" class="entypo-icon-minus-2"></i></span>

							<input class="input-field RAO col-6 mb-2 h-100 form-control" type="number" value="1">

							<span class="btn-num-product-up col-sm-1 PLIU2"><i aria-hidden="true" class="entypo-icon-plus-2"></i></span>
						</div>

						<button d="<?=$r1["id"]?>" thumb="<?=str_replace("uploads","thumbs",$img)?>" class="col-sm-7 btn-success btn ADDCART ">
							კალათაში დამატება
						</button>
					</div>
				</div>
				<div class="col-sm-12 mt-4">
					<div class="fb-share-button text-light"  data-href="https://iland.ge/<?=$L?>/product/<?=$r1["id"]?>" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://iland.ge/<?=$L?>/product/<?=$r1["id"]?>" class="fb-xfbml-parse-ignore">Share</a></div>	
					<i aria-hidden="true" class="fa fa-eye animated heartBeat"></i><span><?=$p["views"]?></span>
					<i class="icomoon-icon-heart-6 animated heartBeat"></i>
					<span><?=$r1["likes"]??""?></span>					
				</div>
				<div class="col-sm-12 mt-4">
					<div class="row">
						<div class="col-sm-12 d-none">
BARCODE: <span class="GRAY"><?=$r1["BARCODE"]?></span>
						</div>
						<div class="col-sm-12 mt-2">
კატეგორია:  <a href="/<?=$L?>/products/<?=$r1["subcatslug"]?>"><span class="GRAY"><?=$r1["subcat"]?></span></a>
						</div>

					</div>
				</div>
			</div>	
		</div>	
	</div>	
	<div class="row">
		<div class="col-sm-12 BOX p-5 mb-3 mt-3">
			<div class="row">
				<div class="col-sm-12 GRAY">
					<?=$r1["DESCRIPTION"]?>
				</div>	
			</div>	
		</div>	
	</div>	
	<div class="row d-none">
		<div class="col-sm-12 BOX p-5 mb-5 mt-0">
			<div class="row">
				<div class="col-sm-12">
						<span class="GRAY">რევიუები</span>
				</div>	
			</div>	
			<div class="row">
				<div class="col-sm-12 mt-5 GRAY">
<div class="round p-3 kaM mx-3">
<?php
	$q91=mysqli_query($con,"SELECT t1.*,t2.firstname,t2.lastname FROM reviews as t1
	LEFT JOIN users as t2 ON(t1.uid=t2.id)
	WHERE t1.pid='".$pid."'");
	while($r91=mysqli_fetch_array($q91)){
?>	
	<div class="row">
		<div class="col-sm-10">
		<?=$r91["firstname"]?> <?=$r91["lastname"]?>
		</div>
		<div class="col-sm-2 text-right">
		 <small><?=date("d.m.Y H:i",$r91["date"])?></small>
		</div>
		<div class="col-sm-2">
			<div class="rating" d="" pid="526">
			<span class="<?=($r91["star"]==5?"BEF":"")?>" d="5">☆</span><span class="<?=($r91["star"]==4?"BEF":"")?>" d="4">☆</span><span class="<?=($r91["star"]==3?"BEF":"")?>" d="3">☆</span><span class="<?=($r91["star"]==2?"BEF":"")?>" d="2">☆</span><span class="<?=($r91["star"]==1?"BEF":"")?>" d="1">☆</span><i class="REVS"></i>
			</div>
		</div>
		<div class="col-sm-10">
			<?=$r91["text"]?>
		</div>
		<div class="col-sm-12">
		<hr>
		</div>
	</div>
<?php
	}
?>
</div>
				</div>	
			</div>	
		</div>	
	</div>	
   <div class="row mb-5">
	<div class="col-sm-12">
		<h2 class="text-center my-3">მსგავსი პროდუქცია</h2>
	</div>
<?php
$q1=mysqli_query($con,"SELECT t1.*,t2.id as 'pcat',t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug' FROM products as t1
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid)
 WHERE FIND_IN_SET('".$r1["category"]."',t1.category) ORDER BY t1.id DESC LIMIT 16");
while($r1=mysqli_fetch_array($q1)){
	
	if($r1["img"]!=""){
		$img=$r1["img"];
	}else{
		$img="/admin/uploads/products/".str_replace(" ","-",substr($r1["nameen"],0,6)).".jpg";
		if(!file_exists(getcwd().$img)){
			$img="/admin/img/noimage.png";
		}	
	}
$q5=mysqli_query($con,"SELECT * FROM productimgs WHERE productid='".$r1["id"]."' AND main='1'");
$r5=mysqli_fetch_array($q5);
$img=$r5["img"];
?>
		<div href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r1["slug"]?>" class="col-md-6 col-lg-4 col-xl-3">
			<div class="nameen mb-3">
				<div class="row p-3">
				
								<a href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r1["slug"]?>" class="col-sm-12 IMG" style="background:url('<?=$img?>');" ></a>
								<a href="/<?=$L?>/product/<?=$r1["id"]?>/<?=$r1["slug"]?>" class="col-sm-12 GRAY TIT MH70 FS14" d="<?=$r1["id"]?>"><?=$r1["titlege"]?></a>
								<div class="col-sm-12 PRI" d="<?=$r1["id"]?>">										<?=number_format($r1["saleprice"]!="0"?$r1["saleprice"]:$r1["price"])?>₾
										<span class="old-price <?=$r1["saleprice"]!="0"?"":"d-none"?>">
											<small><?=number_format($r1["price"])?>₾</small>
										</span>
								</div>
								<div class="col-sm-12 ">
<div class="row">
									<div class="col-sm-7 pr-0">
									

									</div>
									<div class="col-sm-5 pl-0 text-right">
										<i aria-hidden="true" class="fa fa-eye animated heartBeat"></i><span class="FS12"><?=$r1["views"]?></span>
										
										<span><?=$r1["likes"]??""?></span>
									</div>

									</div>							
								</div>
								<div thumb="<?=str_replace("uploads","thumbs",$img)?>" d="<?=$r1["id"]?>" n="1" class="col-sm-12 btn btn-outline-dark mt-2 text-center CP CARTBUT ADDCART">კალათაში დამატება</div>
				</div>
			</div>
		</div>
<?php
}
?>

	</div>	
</div>