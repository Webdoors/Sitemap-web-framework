<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
$ACP=1;
$p=$_REQUEST["page"]??"";
if($p>0){
	$ACP=$p;
} 
$PA=24;
$fr=($ACP-1)*$PA;
$FROM=mysqli_real_escape_string($con,$_GET["from"]??"");
$TO=mysqli_real_escape_string($con,$_GET["to"]??"");
$KEY=mysqli_real_escape_string($con,$_GET["key"]??"");
$arr=explode(" ",$KEY);
$sort=str_replace("-"," ",mysqli_real_escape_string($con,$_GET["sort"]??""));
if(strpos($sort,"price")>=0){
	$sort1=explode(" ",$sort);
	$sort=" cast((SELECT price FROM options WHERE pid=t1.id AND main=1 LIMIT 1) as unsigned) ".$sort1[1];
}
$url=mysqli_real_escape_string($con,"https://$_SERVER[HTTP_HOST]/$L/products");
if($sort==""){
	$sort="t1.id DESC";
}
// if(count($arr)>0){
	// $SARR=" OR (";
	// $i=0;
	// foreach($arr as $ar){
		// $i++;
		// $SARR.=" ITEM LIKE '%".$ar."%' OR titlege LIKE '%".$ar."%' OR FIND_IN_SET('".$ar."',keywords)";
		// if($i<count($arr)){
			// $SARR.=" OR";
		// }
	// }
	// $SARR.=") ";	
// }

if($FROM!=""){
	$WFR=" AND t1.id IN (SELECT pid FROM options WHERE price >=$FROM AND price<=$TO)";
}
if($TO!=""){
	//$WTO=" AND t1.price<=$TO";
	$WTO="";
}
if($KEY!=""){
	$WKE=" AND (t1.nameen LIKE '%".$KEY."%' ".$SARR." )";
}
?>
<div class="container-fluid my-3 mt-5">
	<div class="row mt-5">
		<div class="col-sm-12 text-center">
<?php
if($p3=="accessories"){
?>
<div class="container-fluid">
	<div class="row">

		<div class="col-10 mx-auto">
		
		</div>
		<div class="col-9 mb-5 mt-3 mx-auto border-top border-bottom CIRCLEBOX">
			<div class="row py-4 justify-content-center">
<?php
$q2=mysqli_query($con,"SELECT id FROM categories WHERE slug='".$p3."'");
$r2=mysqli_fetch_array($q2);
$q1=mysqli_query($con,"SELECT * FROM categories WHERE pid='".$r2["id"]."'");
while($r1=mysqli_fetch_array($q1)){
?>
	<a class="text-center mb-5" style="width:180px" href="<?=$L?>/products/accessories/<?=$r1["slug"]?>">
		<div class="CIRCLE">
			<img style="width:89px;" src="<?=$r1["img"]?>"/>
		</div>
		<div class="TEXTI text-center mt-2">
			<?=$r1["name".$lang]?>
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
}
?>
		</div>


	<?php
	if($p3=="service"){
?>	
<div class="col-sm-12 mt-4 other-models text-center ">
<ul class="px-3">	
<?php
$q3=mysqli_query($con,"SELECT id FROM categories WHERE slug='".$p3."'");
$r3=mysqli_fetch_array($q3);
$q2=mysqli_query($con,"SELECT * FROM categories WHERE pid='".$r3["id"]."'");
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
	}

	?>
		
		
		<div class="col-sm-12 text-center ">
			<h2>პროდუქცია</h2>
		</div>
		<div class="col-sm-3">
			<div class="BOX px-4">
			<div class="col-12 px-0 py-2 CP" onclick="$('.FILTBOX').toggle();$(this).find('.fa').toggleClass('fa-angle-down').toggleClass('fa-angle-up');">
			ფილტრი <i class="fa fa-angle-down" ></i>
			</div>
			<div class="FILTBOX  border-top" style="display:none">
			<div class="d-none">
<?php
if($p4!=""){
	$q1=mysqli_query($con,"SELECT * FROM categories WHERE slug='".$p4."' AND active='1' ");
	$r1=mysqli_fetch_array($q1);
	$mcatid=$r1["id"];
	$WCA=" AND  FIND_IN_SET(".$mcatid.",category) ";
}
 elseif($p3!=""){
	$q1=mysqli_query($con,"SELECT * FROM categories WHERE slug='".$p3."' AND active='1' ");
	$r1=mysqli_fetch_array($q1);
	$mcatid=$r1["id"];
	$WCA=" AND  (FIND_IN_SET(".$mcatid.",category) OR category IN (SELECT id FROM categories WHERE pid='".$mcatid."')) ";
}
//else
// if($p4!=""){
	// $q1=mysqli_query($con,"SELECT * FROM categories WHERE slug='".$p4."' AND active='1' ");
	// $r1=mysqli_fetch_array($q1);
	// $mcatid=$r1["id"];
	// $WCA=" AND  (FIND_IN_SET(".$mcatid.",category) OR 
	// category IN (SELECT id FROM categories WHERE pid='".$mcatid."') OR 
	// category IN (SELECT id FROM categories WHERE pid IN (SELECT id FROM categories WHERE pid='".$mcatid."')) OR 
	// category IN (SELECT id FROM categories WHERE pid IN (SELECT id FROM categories WHERE pid IN (SELECT id FROM categories WHERE pid='".$mcatid."')))	
	// )";
// }else{
	// $mcatid="0";
	
// }
 $WHERE="WHERE t1.id>0  $WCA $WFR $WTO $WKE ";
?>
<h4><?=$mcat?></h4>
<?php
$q2=mysqli_query($con,"SELECT * FROM categories WHERE (pid='0' OR pid='') AND active='1' ORDER BY position ASC ");
while($r2=mysqli_fetch_array($q2)){
?>
<div class="LEV1"><a class="CATES <?=$r2["slug"]==$p2?"ACT":""?> w-100" href="<?=$L?>/products/<?=$r2["slug"]?>"><?=$r2["name".$lang]?></a>
<?php
	$q3=mysqli_query($con,"SELECT * FROM categories WHERE FIND_IN_SET('".$r2["id"]."',pid) ORDER BY position ASC ");
	while($r3=mysqli_fetch_array($q3)){
?>
	<div class="LEV2"><a class="CATES <?=$r3["slug"]==$p3?"ACT":""?> w-75" href="<?=$L?>/products/<?=$r2["slug"]?>/<?=$r3["slug"]?>"><?=$r3["name".$lang]?></a>
<?php
	$q4=mysqli_query($con,"SELECT * FROM categories WHERE FIND_IN_SET('".$r3["id"]."',pid) ORDER BY position ASC ");
?>
<i class="fa fa-angle-down CP DOWN <?=mysqli_num_rows($q4)<2?"d-none":"IB"?>" d="3"></i>
<?php
	while($r4=mysqli_fetch_array($q4)){
?>
	<div class="LEV3 pl-3 w-100"><a class="CATES <?=$r4["slug"]==$p4?"ACT":""?> w-75" href="<?=$L?>/products/<?=$r2["slug"]?>/<?=$r3["slug"]?>/<?=$r4["slug"]?>"><?=$r4["name".$lang]?></a>
<?php
	$q5=mysqli_query($con,"SELECT * FROM categories WHERE   FIND_IN_SET('".$r4["id"]."',pid) ORDER BY position ASC ");
?>
<i class="fa fa-angle-down CP DOWN <?=mysqli_num_rows($q5)<1?"d-none":"IB"?>" d="4"></i>
<?php
	while($r5=mysqli_fetch_array($q5)){
?>
	<div class="LEV4 w-100 pl-3"><a class="CATES <?=$r5["slug"]==$p5?"ACT":""?> w-75" href="<?=$L?>/products/<?=$r2["slug"]?>/<?=$r3["slug"]?>/<?=$r4["slug"]?>/<?=$r5["slug"]?>"><?=$r5["name".$lang]?></a>

	</div>
<?php	
	}
?>
	</div>
<?php	
	}
?>
	</div>
<?php	
	}
?>
</div>
<?php	
}
?>
</div>
<div class="col-sm-12 mt-3">
	<div class="row">
		<div class="col-sm-6 p-0 pr-sm-1">
			<input class="form-control FROM NUM" placeholder="ფასი-დან" value="<?=$FROM?>"/>
		</div>
		<div class="col-sm-6 pl-sm-1 p-0 mt-3 mt-sm-0">
			<input class="form-control TO NUM" placeholder="-მდე" value="<?=$TO?>"/>
		</div>
		<div class="col-sm-12 p-0 mt-3">
			<input class="form-control KEY" placeholder="საძიებო სიტყვა" value="<?=$KEY?>"/>
		</div>
		<div class="col-sm-12 p-0 mt-3">
			<div class="BUT FILTER" url="<?=$url?>">ფილტრი</div>
		</div>
		<div class="col-sm-12 p-0 mt-3">
			<div class="BUT CLEAN bg-light c-black" url="<?=$url?>" >გასუფთავება</div>
		</div>
	</div>
</div>
</div>
			</div>
		</div>
		<div class="col-sm-9">
			<div class="row">
				<div class="col-sm-12 my-1">
					<div class="row">
						<div class="col-md-10">
						
						</div>
						<div class="col-md-2">

								<select class="form-control SRB" d="<?=$url?>" key='<?=$KEY ?>'>
									<option <?=$sort=="id DESC"?"selected":""?> value="id-DESC">ახალი</option>
									<option <?=$sort1[0]." ".$sort1[1]=="price ASC"?"selected":""?> value="price-ASC">ფასის &uarr;</option>
									<option <?=$sort1[0]." ".$sort1[1]=="price DESC"?"selected":""?> value="price-DESC">ფასის &darr;	</option>
								</select>
							<!--<div class="col-md-12 FL8 IB CP">
							</div>		-->
						</div>
					</div>
				</div>
<div class="d-none">
<?php
echo "SELECT t1.*,t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug',
 (SELECT img FROM productimgs WHERE productid=t1.id AND main=1 LIMIT 1) AS mainimg,
 (SELECT img FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS optionimg,
 (SELECT price FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS oprice,
 (SELECT pricecard FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS pricecard,
  (SELECT slug FROM productgroups as t2 WHERE t1.groupid=id) as 'gslug'  FROM products AS t1
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid)
 $WHERE ORDER BY $sort LIMIT $PA OFFSET ".$fr."";
?>
</div>
<?php
$q1=mysqli_query($con,"SELECT t1.*,t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug',
 (SELECT img FROM productimgs WHERE productid=t1.id AND main=1 LIMIT 1) AS mainimg,
 (SELECT img FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS optionimg,
 (SELECT price FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS oprice,
 (SELECT pricecard FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS pricecard,
  (SELECT slug FROM productgroups as t2 WHERE t1.groupid=id) as 'gslug'  FROM products AS t1
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid)
 $WHERE ORDER BY $sort LIMIT $PA OFFSET ".$fr."");

// echo "SELECT t1.*  FROM options AS t1 $WHERE ORDER BY $sort LIMIT $PA OFFSET ".$fr."";





while($r1=mysqli_fetch_array($q1)){
	

	if($r1["optionimg"]!=""){
		$img=$r1["optionimg"];
	}else{
		if($r1["img"]!='')
		{
		$img=$r1["img"];
		}
		else
		{
			$img="/admin/uploads/products/".str_replace(" ","-",substr($r1["ITEM"],0,6)).".jpg";
		if(!file_exists(getcwd().$img)){
			$img="/admin/img/noimg.png";
		}	
		}
	}

?>
		<div href="<?=$L?>/product/<?=$r1["id"]?>" class="col-md-6 col-lg-4 col-xl-3">
			<div class="ITEM mb-3">
				<div class="row p-3">
				
								<a href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r1["gslug"]==""?$r1["slug"]:$r1["gslug"] ?>/<?=$r1["id"]?>" class="col-sm-12 IMG" style="background:url('<?=$img?>');" ></a>
								<a href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r1["gslug"]==""?$r1["slug"]:$r1["gslug"] ?>" class="col-sm-12  TITL MH70 FS14" d="<?=$r1["id"]?>"><?=$r1["titlege"]?> <small class="d-block">Item: <?=$r1["CODE"]?></small></a>

<?php
				      if($r1["oprice"]>0)
					  {
						  
				          ?>	
								<div class="col-sm-12 PRI FS30" d="<?=$r1["id"]?>"><?=number_format($r1["oprice"]??0)?>₾						
								<span class="old-price <?=$r1["pricecard"]!="0"?"":"d-none"?>">
								<small><?=number_format($r1["pricecard"]??0)?>₾</small>
								</span></div>
					  <?php
					  }
					  else
					  { 
				   if($r1["pricecard"]>0)
					  {
				    ?>
				  <div class="col-sm-12 PRI FS30" d="<?=$r1["id"]?>"><?=number_format($r1["pricecard"]*$rcnv['value']??0)?>              ₾		
				  </div>
				  <?php
					  }
					  else
					  {
						  ?>
						  <div class="col-sm-12 PRI FS30" d="<?=$r1["id"]?>"><?=number_format($r1["saleprice"]??0)?>              ₾		
						  </div>
						  <?php
					  }
					  }
                     ?>		
								<div class="col-sm-12 ">
<div class="row">
									<div class="col-sm-7 pr-0">
										<div class="star-product">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-full"></i>
										</div>

									</div>
									<div class="col-sm-5 pl-0 text-right">
										<i aria-hidden="true" class="fa fa-eye animated heartBeat"></i><span class="FS12"><?=$r1["views"]?></span>
										<i class="icomoon-icon-heart-6 animated heartBeat"></i>
										<span><?=$r1["likes"]?></span>
									</div>

									</div>							
								</div>
								<div class="col-sm-12 "><hr/></div>
								<div thumb="<?=str_replace("uploads","thumbs",$img)?>" d="<?=$r1["id"]?>" n="1" class="col-sm-12 text-center CP ADDCART">კალათაში დამატება</div>
				</div>
			</div>
		</div>
<?php
}
?>
<div class="col-sm-12 my-3">
<?php
$URI=explode("?",$_SERVER['REQUEST_URI']);
$URI=$URI[0];
$q3=mysqli_query($con,"SELECT t1.id FROM products AS t1 $WHERE");
$tot=ceil(mysqli_num_rows($q3)/$PA);
if($tot>0){
?>
	<ul class="col-md-12 pagination justify-content-center LIS P">
		<li class="last"><a href="<?=$URI?>?page=<?=($ACP-1)?>&from=<?=$FROM?>&to=<?=$TO?>&key=<?=$KEY?>">პირველი</a></li>
		<li class="next"><a href="<?=$URI?>?page=1&from=<?=$FROM?>&to=<?=$TO?>&key=<?=$KEY?>"><i class="fa fa-angle-left"></i></a></li>
<?php
for($i=1;$i<=$tot;$i++){
?>
		<li>
			<a href="<?=$URI?>?page=<?=$i?>&from=<?=$FROM?>&to=<?=$TO?>&key=<?=$KEY?>" class="PG <?=($ACP==$i?"ACP":"")?> AMI"><?=$i?></a>
		</li>
<?php
}
?>		<li class="next"><a href="<?=$URI?>?page=<?=($ACP+1)?>&from=<?=$FROM?>&to=<?=$TO?>&key=<?=$KEY?>"><i class="fa fa-angle-right"></i></a></li>
		<li class="last"><a href="<?=$URI?>?page=<?=$tot?>&from=<?=$FROM?>&to=<?=$TO?>&key=<?=$KEY?>">ბოლო</a></li>
	</ul>
<?php	
}else{
?>
<h4>არ მოიძებნა</h4>
<?php
}
?>


</div>
			</div>
		</div>		
	</div>
</div>

<script>
if($(window).width()>991){
	$(".FILTBOX").toggle();
}
</script>