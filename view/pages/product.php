<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
$memory=mysqli_real_escape_string($con,$_GET["memory"]??"");
$conditions=mysqli_real_escape_string($con,$_GET["conditions"]??"");
$color=mysqli_real_escape_string($con,$_GET["color"]??"");
$name=mysqli_real_escape_string($con,$_GET["name"]??"");
$network=mysqli_real_escape_string($con,$_GET["network"]??"");
$watchsize=mysqli_real_escape_string($con,$_GET["watchsize"]??"");
$processor=mysqli_real_escape_string($con,$_GET["processor"]??"");
$ram=mysqli_real_escape_string($con,$_GET["ram"]??"");
$frequency=mysqli_real_escape_string($con,$_GET["frequency"]??"");
$complect=mysqli_real_escape_string($con,$_GET["complect"]??"");

$q111=mysqli_query($con,"SELECT t1.*,t2.id as 'pcat',t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug' FROM products as t1 
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid)
WHERE t2.slug='".$p3."' ORDER BY position ASC");

$r111=mysqli_fetch_array($q111);
$pid=$r111["id"];
$pslug=$r111["slug"];
$cat=$r111["pcat"];
if($p4!=""){
	$q111=mysqli_query($con,"SELECT t1.*,t2.id as 'pcat',t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug' FROM products as t1 
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid)
WHERE t1.slug='".$p4."'  ORDER BY position ASC");

$r111=mysqli_fetch_array($q111);
$pid=$r111["id"];
$pslug=$r111["slug"];
$cat=$r111["pcat"];
}
if($p5!=""){
	$q111=mysqli_query($con,"SELECT t1.*,t2.id as 'pcat',t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug' FROM products as t1 
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid)
WHERE t1.id='".$p5."'  ORDER BY position ASC");

$r111=mysqli_fetch_array($q111);
$pid=$r111["id"];
$pslug=$r111["slug"];
$cat=$r111["pcat"];
}



	// if($r1["img"]!=""){
		// $img=$r1["img"];
	// }else{
		 // $img="/admin/uploads/products/".str_replace(" ","-",substr($r1["nameen"],0,6)).".jpg";
		// if(!file_exists(getcwd().$img)){
			// $img="/admin/img/noimage.png";
		// }		 
	// }
?>

<div class="container-fluid mt-4">
	<div class="row mx-0">
		<div class="col-sm-12 px-0 mt-1">
<?php
// if service category
	$q3=mysqli_query($con,"SELECT (SELECT t2.slug FROM categories as t2 WHERE t1.pid=t2.id) as 'slug' FROM categories as t1 WHERE t1.slug='".$p3."'");
	$r3=mysqli_fetch_array($q3);
	$pcat=$r3["slug"]??"";
	// echo $pcat;
//

$q2=mysqli_query($con,"SELECT t1.*,t2.id as 'pcat',t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug' FROM products as t1 
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid)
WHERE t2.slug='".$p3."' ORDER BY position ASC");

 // $rr2=mysqli_fetch_assoc($q2);

$numrows=mysqli_num_rows($q2);
?>
<div class="other-models <?=$numrows>0?"":"d-none"?> "> 
    
		
<?php
$slugi="";
$i=0;

if($p3!=""){
	$q1=mysqli_query($con,"SELECT * FROM products WHERE id='".$pid."'");
}
$r1=mysqli_fetch_array($q1);
$WHENAM="";
$WHEMEM="";
$WHECOL="";
$WHECON="";
$WHENET="";
$WHEWSI="";
$WHECOM="";
$WHEO=" AND main='1'";
if($conditions!=""){
	$WHECON=" AND conditions='".$conditions."'";
	$WHEO="";
}
if($memory!=""){
	$WHEMEM=" AND memory='".$memory."'";
	$WHEO="";
}

if($color!=""){
	$WHECOL=" AND color='".$color."'";
	$WHEO="";
}
if($name!=""){
	$WHENAM=" AND nameen='".$name."'";
	$WHEO="";
}
if($network!=""){
	$WHENET=" AND network='".$network."'";
	$WHEO="";
}
if($watchsize!=""){
	$WHEWSI=" AND watchsize='".$watchsize."'";
	$WHEO="";
}
if($processor!=""){
	$WHEPRO=" AND processor='".$processor."'";
	$WHEO="";
}
if($ram!=""){
	$WHERAM=" AND ram='".$ram."'";
	$WHEO="";
}
if($frequency!=""){
	$WHEFRE=" AND frequency='".$frequency."'";
	$WHEO="";
}
if($complect!=""){
	$WHECOM=" AND complect='".$complect."'";
	$WHEO="";
}
$WHERE=" $WHEO $WHECOL $WHEMEM $WHECON $WHENAM $WHENET $WHEWSI $WHEPRO $WHERAM $WHEFRE $WHECOM ";

 
$q20=mysqli_query($con,"SELECT * FROM options WHERE pid='".$pid."' $WHERE LIMIT 1");
// echo "SELECT * FROM options WHERE pid='".$pid."' $WHERE LIMIT 1";


$r20=mysqli_fetch_array($q20);
$p=$r20;
$memory=$memory==""?$p["memory"]:$memory;
$conditions=$conditions==""?$p["conditions"]:$conditions;
$color=$color==""?$p["color"]:$color;
$network=$network==""?$p["network"]:$network;
$watchsize=$watchsize==""?$p["watchsize"]:$watchsize;
$processor=$processor==""?$p["processor"]:$processor;
$ram=$ram==""?$p["ram"]:$ram;
$frequency=$frequency==""?$p["frequency"]:$frequency;
$complect=$complect==""?$p["complect"]:$complect;
mysqli_query($con,"UPDATE products SET views=views+1 WHERE  id='".$r1["id"]."'");
$i=0;
$qc2=mysqli_query($con,"SELECT t1.pid,t1.nameen,t1.slug,(SELECT slug FROM categories as t2 WHERE t2.id=t1.pid) as 'momslug' FROM categories as t1 WHERE t1.slug='".$p3."'");
$rc2=mysqli_fetch_array($qc2);
if($rc2["pid"]=="7"){
?>
<div class="container">
	<div class="row">
		<div class="col-10 mb-5 mt-3 mx-auto border-top border-bottom CIRCLEBOX">
			<div class="row py-4 justify-content-center">
<?php
$q2=mysqli_query($con,"SELECT id FROM categories WHERE id='7'");
$r2=mysqli_fetch_array($q2);
$q17=mysqli_query($con,"SELECT * FROM categories WHERE pid='".$r2["id"]."'");
while($r17=mysqli_fetch_array($q17)){
?>
	<a class="text-center mb-5" style="width:180px" href="<?=$L?>/products/accessories/<?=$r17["slug"]?>">
		<div class="CIRCLE">
			<img style="width:89px;" src="<?=$r17["img"]?>"/>
		</div>
		<div class="TEXTI text-center mt-2">
			<?=$r17["name".$lang]?>
		</div>
	</a>
<?php	
}
?>
			</div>
		</div>
		<div class="w-100 bg-white SEEMORE"><span class="CP SEMO">მეტის ნახვა</span></div>
	</div>
</div>
<?php	
}elseif($pcat=="service"){
?>
<div class="col-sm-12 mt-4 other-models text-center ">
<ul class="px-3">	
<?php
$q3=mysqli_query($con,"SELECT pid FROM categories WHERE slug='".$p3."'");
$r3=mysqli_fetch_array($q3);
$q2=mysqli_query($con,"SELECT * FROM categories WHERE pid='".$r3["pid"]."'");
while($r2=mysqli_fetch_array($q2)){
	if($slugi==""){
		$slugi=$r2["slug"];
	}
	$i++;
	if(($p4==""&&$i==1)||($r2["slug"])==$p4){
		$pid=$r2["id"];
	}
?>					
			<li class="<?=($p3==""&&$i==1)||($r2["slug"])==$p4?"active":""?>">
				<a href="<?=$L?>/products/service/<?=$r2["slug"]?>" class="<?=($p4==""&&$i==1)||($r2["slug"])==$p4?"font-weight-bold":""?>">
					<i class="icon iphonexs" style="background-image: url('<?=$r2["img"]?>');"></i><p><?=$r2["name".$lang]?> </p>
				</a>
				<p class="other-models-p"><?=$r2["smalltexten"]?></p>
			</li>
<?php
}
?>
</ul></div>
<?php	
}else{
	?>
<ul class="px-3">	
	<?php
while($r2=mysqli_fetch_array($q2)){
	if($slugi==""){
		$slugi=$r2["slug"];
	}
	$i++;
	if(($p4==""&&$i==1)||($r2["slug"])==$p4){
		$pid=$r2["id"];
	}
?>					
			<li class="<?=($p3==""&&$i==1)||($r2["slug"])==$p4?"active":""?>">
				<a href="<?=$L?>/product/<?=$r111["subcatslug"]?>/<?=$r2["slug"]?>" class="<?=($p4==""&&$i==1)||($r2["slug"])==$p4?"font-weight-bold":""?>">
					<i class="icon iphonexs" style="background-image: url('<?=$r2["img"]?>');"></i><p><?=$r2["titlege"]?> </p>
				</a>
				<p class="other-models-p"><?=$r2["smalltexten"]?></p>
			</li>
<?php
}
	?>
</ul>	
	<?php
}	

$q5=mysqli_query($con,"SELECT * FROM productimgs WHERE productid='".$pid."' AND main='1'");
$r5=mysqli_fetch_array($q5);
$img=$r20["img"];
$p=$r20;
?>					

		
    
</div>
		</div>
	</div>
</div>
<div class="container mt-3">
	<div class="row">
		<div class="col-sm-6">
		<small class="col-sm-12">
			<a class="GRAY" href="/">მთავარი</a>
			<i aria-hidden="true" class="fa fa-angle-right GRAY"></i>
			<a class="GRAY" href="<?=$L?>/products">პროდუქცია</a>
			<i aria-hidden="true" class="fa fa-angle-right GRAY <?=$r1["cat"]==""?"d-none":""?>"></i>
			<a class="GRAY" href="<?=$L?>/products/<?=$r1["catslug"]?>"><?=$r1["cat"]?></a>
			<i aria-hidden="true" class="fa fa-angle-right GRAY"></i>
			<a class="GRAY" href="<?=$L?>/products/<?=$r1["subcatslug"]?>"><?=$p3?></a>
			<i aria-hidden="true" class="fa fa-angle-right GRAY"></i>
			<a class="GRAY" href="<?=$L?>/product/<?=$r1["id"]?>"><?=$r1["titlege"]?></a>
		</small>
			<div class=" w-100" href="<?=$img?>" data-title="<?=$r1["nameen"]?> - ფასი: <?=number_format($r1["price"])?> ₾" ><img style="width:61px" class="GIM BGIM w-100" src="<?=$img?>" alt="image-1" /></div>
			<div class="mt-3">
<?php
$q4=mysqli_query($con,"SELECT * FROM productimgs WHERE productid='".$pid."'");
// echo "SELECT * FROM productimgs WHERE productid='".$pid."'";
while($r4=mysqli_fetch_array($q4)){
?>
			<a class="example-image-link w-100 CP" onclick="$('.BGIM').attr('src',$(this).attr('thref'))" thref="<?=$r4["img"]??""?>" data-title="<?=$r1["nameen"]?>" data-lightbox="example-1"><img style="width:61px" class="GIM w-25" src="<?=$r4["img"]??""?>" alt="image-1" /></a>
<?php
}
$q4=mysqli_query($con,"SELECT * FROM optionimgs WHERE optionid='".$r20["id"]."'");
while($r4=mysqli_fetch_array($q4)){
?>
			<a class="example-image-link w-100 CP" onclick="$('.BGIM').attr('src',$(this).attr('thref'))" thref="<?=$r4["img"]?>" data-title="<?=$r1["nameen"]?>" data-lightbox="example-1"><img style="width:61px" class="GIM w-25" src="<?=$r4["img"]?>" alt="image-1" /></a>
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
					<small class="" d="<?=$r1["id"]?>">Item: <?=$r1["CODE"]?></small>
				</div>	
				
				<div class="col-sm-12">
					<div class="price-product">
						<h2 class="new-price my-4 PRI" d="<?=$r1["id"]?>">
							<?=number_format($p["price"])?>₾
							<span class="old-price <?=$p["pricecard"]!="0"?"":"d-none"?>">
								<small><?=number_format($p["pricecard"])?>₾</small>
							</span>
						</h2>			
					</div>
				</div>

<?php
	$q11=mysqli_query($con,"SELECT * FROM options WHERE pid='".$pid."' group by nameen ORDER BY nameen ASC");
	if(mysqli_num_rows($q11)>0){
?>
				<div class="col-sm-12 mb-3">
					<div class="row">
<?php
		while($r11=mysqli_fetch_array($q11)){
?>
						<div class="col-sm-4 col-6 px-1">
							<a instock="<?=$r11["quantity"]?>" class="<?=$r11["quantity"]==0?"":""?> btn w-100 btn-<?=$r11["nameen"]==$name||$r11["nameen"]==$r20["nameen"]?"outline-primary text-dark":"outline-secondary text-dark"?> " href="<?=$L?>/product/<?=$r111["subcatslug"]?>/<?=$p4!=""?$p4."/":""?>?processor=<?=urlencode($processor)?>&ram=<?=$ram?>&frequency=<?=urlencode($frequency)?>&network=<?=urlencode($network)?>&complect=<?=urlencode($complect)?>&watchsize=<?=$watchsize?>&name=<?=$r11["nameen"]?>&memory=<?=$memory?>&color=<?=$color?>&conditions=<?=urlencode($conditions)?>"><?=$r11["nameen"]?></a>				
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
$q6=mysqli_query($con,"SELECT DISTINCT(conditions) FROM options WHERE pid='".$pid."' AND conditions<>'' ORDER BY conditions DESC");
if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 border-bottom pb-2">
					<div class="row ">
						<div class="col-sm-12 px-0 ">
							<label>მდგომარეობა</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){

?>
	
							<a instock="<?=$r6["quantity"]?>" style="" href="<?=$L?>/product/<?=$p3?>/<?=$pslug?>?processor=<?=urlencode($processor)?>&ram=<?=$ram?>&frequency=<?=urlencode($frequency)?>&network=<?=urlencode($network)?>&watchsize=<?=$watchsize?>&name=<?=$name?>&conditions=<?=urlencode($r6["conditions"])?>" class=" btn btn-<?=$r6["conditions"]==$conditions?"outline-primary":"outline-secondary"?> text-dark CP mr-2" style="font-memory:12px"><?=$r6["conditions"]?></a>				
				
<?php
}
?>						


					</div>
				</div>
<?php
}
?>
<?php
$q6=mysqli_query($con,"SELECT memory,quantity FROM options WHERE pid='".$pid."' AND memory<>'' GROUP BY memory order by id ASC ");
if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 border-bottom pb-2">
					<div class="row ">
						<div class="col-sm-12 px-0">
							<label>მეხსიერება</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){
?>
					
							<a instock="<?=$r6["quantity"]?>" class=" btn mr-2 btn-<?=$r6["memory"]==$memory?"outline-primary":"outline-secondary"?> text-dark" href="<?=$L?>/product/<?=$p3?>/<?=$p4?><?=$p7!=""?"/".$p7:""?>?processor=<?=urlencode($processor)?>&ram=<?=$ram?>&frequency=<?=urlencode($frequency)?>&network=<?=urlencode($network)?>&name=<?=$name?>&watchsize=<?=$watchsize?>&memory=<?=$r6["memory"]?>&color=<?=$color?>&complect=<?=urlencode($complect)?>&conditions=<?=urlencode($conditions)?>"><?=$r6["memory"]?></a>				
					
<?php
}
?>

					</div>
				</div>
<?php
}
?>
<?php
$q6=mysqli_query($con,"SELECT watchsize,quantity FROM options WHERE pid='".$pid."' AND watchsize<>'' GROUP by watchsize ");
if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 border-bottom pb-2">
					<div class="row ">
						<div class="col-sm-12 px-0 ">
							<label>ზომა</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){
?>
					
							<a instock="<?=$r6["quantity"]?>" class="<?=$r6["quantity"]==0?"":""?> btn mr-2 btn-<?=$r6["watchsize"]==$watchsize?"outline-primary":"outline-secondary"?> text-dark" href="<?=$L?>/product/<?=$p3?>/<?=$p4?><?=$p7!=""?"/".$p7:""?>?processor=<?=urlencode($processor)?>&ram=<?=$ram?>&frequency=<?=urlencode($frequency)?>&network=<?=urlencode($network)?>&name=<?=$name?>&watchsize=<?=$r6["watchsize"]?>&color=<?=$color?>&complect=<?=urlencode($complect)?>&conditions=<?=urlencode($conditions)?>"><?=$r6["watchsize"]?></a>				
					
<?php
}
?>

					</div>
				</div>
<?php
}
?>
<?php
$q6=mysqli_query($con,"SELECT network,quantity FROM options WHERE pid='".$pid."' AND network<>'' GROUP BY network ORDER BY network ASC");
if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 border-bottom pb-2 ">
					<div class="row ">
						<div class="col-sm-12 px-0 ">
							<label>Connectivity</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){

?>
	
							<a instock="<?=$r6["quantity"]?>" style="" href="<?=$L?>/product/<?=$p3?>/<?=$pslug?>?processor=<?=urlencode($processor)?>&ram=<?=$ram?>&frequency=<?=urlencode($frequency)?>&network=<?=urlencode($r6["network"])?>&name=<?=$name?>&memory=<?=$memory?>&color=<?=$color?>&conditions=<?=urlencode($conditions)?>" class="<?=$r6["quantity"]==0?"":""?> btn btn-<?=$r6["network"]==$network?"outline-primary":"outline-secondary"?> text-dark CP mr-2" style="font-memory:12px"><?=$r6["network"]?></a>				
				
<?php
}
?>						


					</div>
				</div>
<?php
}
?>
<?php
$q6=mysqli_query($con,"SELECT processor,quantity FROM options WHERE pid='".$pid."' AND processor<>'' GROUP BY processor ORDER BY processor ASC");
if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 border-bottom pb-2">
					<div class="row ">
						<div class="col-sm-12 px-0 ">
							<label>Processor</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){
?>
	
							<a instock="<?=$r6["quantity"]?>" style="" href="<?=$L?>/product/<?=$p3?>/<?=$pslug?>?processor=<?=urlencode($r6["processor"])?>&ram=<?=$ram?>&frequency=<?=urlencode($frequency)?>&network=<?=urlencode($r6["network"])?>&name=<?=$name?>&memory=<?=$memory?>&color=<?=$color?>&conditions=<?=urlencode($conditions)?>" class="<?=$r6["quantity"]==0?"":""?> btn btn-<?=$r6["processor"]==$processor?"outline-primary":"outline-secondary"?> text-dark CP mr-2" style="font-memory:12px"><?=$r6["processor"]?></a>				
				
<?php
}
?>						


					</div>
				</div>
<?php
}
?>
<?php
$q6=mysqli_query($con,"SELECT ram,quantity FROM options WHERE pid='".$pid."' AND ram<>'' GROUP BY ram ORDER BY ram ASC");
if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 border-bottom pb-2 ">
					<div class="row ">
						<div class="col-sm-12 px-0 ">
							<label>Ram</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){

?>
	
							<a instock="<?=$r6["quantity"]?>" style="" href="<?=$L?>/product/<?=$p3?>/<?=$pslug?>?processor=<?=urlencode($processor)?>&ram=<?=$r6["ram"]?>&frequency=<?=urlencode($frequency)?>&network=<?=urlencode($r6["network"])?>&name=<?=$name?>&memory=<?=$memory?>&color=<?=$color?>&conditions=<?=urlencode($conditions)?>" class="<?=$r6["quantity"]==0?"":""?> btn btn-<?=$r6["ram"]==$ram?"outline-primary":"outline-secondary"?> text-dark CP mr-2" style="font-memory:12px"><?=$r6["ram"]?></a>				
				
<?php
}
?>						


					</div>
				</div>
<?php
}
?>
<?php
$q6=mysqli_query($con,"SELECT frequency,quantity FROM options WHERE pid='".$pid."' AND frequency<>'' GROUP BY frequency ORDER BY frequency ASC");
if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 border-bottom pb-2 d-none">
					<div class="row ">
						<div class="col-sm-12 px-0 ">
							<label>Frequency</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){

?>
	
							<a instock="<?=$r6["quantity"]?>" style="" href="<?=$L?>/product/<?=$p3?>/<?=$pslug?>?processor=<?=urlencode($processor)?>&ram=<?=$ram?>&frequency=<?=urlencode($r6["frequency"])?>&network=<?=urlencode($r6["network"])?>&name=<?=$name?>&memory=<?=$memory?>&color=<?=$color?>&conditions=<?=urlencode($conditions)?>" class="<?=$r6["quantity"]==0?"":""?> btn btn-<?=$r6["frequency"]==$frequency?"outline-primary":"outline-secondary"?> text-dark CP mr-2" style="font-memory:12px"><?=$r6["frequency"]?></a>				
				
<?php
}
?>						


					</div>
				</div>
<?php
}
?>
<?php
$q6=mysqli_query($con,"SELECT complect,quantity FROM options WHERE pid='".$pid."' AND complect<>'' GROUP by complect ORDER BY id ASC ");
if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 border-bottom pb-2">
					<div class="row ">
						<div class="col-sm-12 px-0 ">
							<label>Complect</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){
?>
	
							<a instock="<?=$r6["quantity"]?>" style="" href="<?=$L?>/product/<?=$p3?>/<?=$pslug?>?processor=<?=urlencode($processor)?>&ram=<?=$ram?>&frequency=<?=urlencode($r6["frequency"])?>&complect=<?=$r6["complect"]?>&network=<?=urlencode($network)?>&name=<?=$name?>&memory=<?=$memory?>&color=<?=$color?>&conditions=<?=urlencode($conditions)?>" class="<?=$r6["quantity"]==0?"":""?> btn btn-<?=$r6["complect"]==$complect?"outline-primary":"outline-secondary"?> text-dark CP mr-2 mb-2" style="font-memory:12px"><?=$r6["complect"]?></a>				
				
<?php
}
?>						


					</div>
				</div>
<?php
}
?>

<?php
$q6=mysqli_query($con,"SELECT color,quantity FROM options WHERE pid='".$pid."' AND color<>'' GROUP by color ");

if(mysqli_num_rows($q6)>0){
?>
				<div class="col-sm-12 border-bottom pb-2">
					<div class="row ">
						<div class="col-sm-12 px-0 ">
							<label>ფერი</label>					
						</div>
<?php
while($r6=mysqli_fetch_array($q6)){
?>
						<div class="col-sm-1 col-1 mr-2">
							<a  instock="<?=$r6["quantity"]?>" class=" btn ROUND <?=$r6["color"]==$color?"COLORACT":""?> <?=$r6["color"]?> border-white border text-white rounded-circle CP <?=$r6["color"]?>" style="height:30px;width:30px;box-shadow: 0px 0px 9px #0009;border-width: 3px!important;" href="<?=$L?>/product/<?=$p3?>/<?=$p4?>/<?=$p7!=""?$p7:""?>?processor=<?=$processor?>&ram=<?=$ram?>&frequency=<?=$frequency?>&network=<?=urlencode($network)?>&watchsize=<?=$watchsize?>&name=<?=$name?>&memory=<?=$memory?>&color=<?=$r6["color"]?>&complect=<?=urlencode($complect)?>&conditions=<?=urlencode($conditions)?>"></a>				
						</div>
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
					<!-- <span class="badge badge-<?=$p["quantity"]>0?"success":"warning"?>"><?=$p["quantity"]>0?"მარაგშია":"არ არის მარაგში " ?></span> -->

					<?php 
					if ($p["quantity"] >= 2) {
						$status_color = "success";
						$status ="მარაგშია";
					} else if ($p["quantity"] == 1) {
						$status_color = "warning";
						$status ="ბოლო ცალია";
					} else if ($p["quantity"] == 0) {
						$status_color = "danger";
						$status ="არ არის მარაგში";
					} else {
						$status_color = "info";
						$status ="მხოლოდ რეზერვაციით";
					}
					?> 

					<span class="badge badge-<?=$status_color?>"><?=$status?></span>


				</div>
				<div class="col-sm-12 mt-4">
					<div class="row">
						<div class="col-sm-3 col-5 px-0 quantity-product js-call-quantity">
							<span class="btn-num-product-down col-sm-1 MINU"><i aria-hidden="true" class="entypo-icon-minus-2"></i></span>

							<input class="input-field RAO col-6 mb-2 h-100 form-control" type="number" value="1">

							<span class="btn-num-product-up col-sm-1 PLIU2"><i aria-hidden="true" class="entypo-icon-plus-2"></i></span>
						</div>

						<button d="<?=$r1["id"]?>" oid="<?=$r20["id"]?>" thumb="<?=str_replace("uploads","thumbs",$img)?>" class="col-sm-7 btn-success btn ADDCART ">
							კალათაში დამატება
						</button>
					</div>
				</div>
				<div class="col-sm-12 mt-4">
					<div class="fb-share-button text-light"  data-href="https://iland.ge/<?=$L?>/product/<?=$r1["id"]?>" data-layout="button_count" data-memory="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://iland.ge/<?=$L?>/product/<?=$r1["id"]?>" class="fb-xfbml-parse-ignore">Share</a></div>	
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
კატეგორია:  <a href="/<?=$L?>/products/<?=$rc2["momslug"]?>/<?=$rc2["slug"]?>"><span class="GRAY"><?=$rc2["nameen"]?></span></a>
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
$q1=mysqli_query($con,"SELECT t1.*,
 (SELECT img FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS optionimg,
 (SELECT id FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS oid,
 (SELECT price FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS oprice,
 (SELECT pricecard FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS pricecard,
t2.id as 'pcat',t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug' FROM products as t1
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid)
 WHERE FIND_IN_SET('".$r1["category"]."',t1.category) ORDER BY t1.id DESC LIMIT 16");
while($r1=mysqli_fetch_array($q1)){
	
	if($r1["optionimg"]!=""){
		$img=$r1["optionimg"];
	}else{
		$img="/admin/uploads/products/".str_replace(" ","-",substr($r1["nameen"],0,6)).".jpg";
		if(!file_exists(getcwd().$img)){
			$img="/admin/img/noimage.png";
		}	
	}

?>
		<div href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r1["slug"]?>" class="col-md-6 col-lg-4 col-xl-3">
			<div class="nameen mb-3">
				<div class="row p-3">
				
								<a href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r1["slug"]?>" class="col-sm-12 IMG" style="background:url('<?=$img?>');" ></a>
								<a href="/<?=$L?>/product/<?=$r1["id"]?>/<?=$r1["slug"]?>/<?=$r1["id"]?>" class="col-sm-12  TIT MH70 FS14" d="<?=$r1["id"]?>"><?=$r1["titlege"]?></a>
								<div class="col-sm-12 PRI" d="<?=$r1["id"]?>">										<?=number_format($r1["oprice"])?>₾
										<span class="old-price <?=$r1["pricecard"]!="0"?"":"d-none"?>">
											<small><?=number_format($r1["pricecard"])?>₾</small>
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
								<div thumb="<?=str_replace("uploads","thumbs",$img)?>" oid="<?=$r1["oid"]?>" d="<?=$r1["id"]?>" n="1" class="col-sm-12 btn btn-outline-dark mt-2 text-center CP CARTBUT ADDCART">კალათაში დამატება</div>
				</div>
			</div>
		</div>
<?php
}
?>

	</div>	
</div>