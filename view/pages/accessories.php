<div class="container">
	<div class="row">

		<div class="col-10 mx-auto">
			<h1 class="w-100 mt-5 pt-5 text-center">
				აქსესუარები
			</h1>		
		</div>
		<div class="col-10 mb-5 mt-3 mx-auto border-top border-bottom CIRCLEBOX">
			<div class="row py-4 justify-content-center">
<?php
$q2=mysqli_query($con,"SELECT id FROM categories WHERE slug='".$p2."'");
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
	
	
	
	
	
	    <div class="row" >
						
						   <?php
						   
						   
$product=mysqli_query($con, "SELECT t1.*,t2.name".$lang." as 'subcat',t2.slug as 'subcatslug',t3.name".$lang." as 'cat',t3.slug as 'catslug',
 (SELECT img FROM productimgs WHERE productid=t1.id AND main=1 ) AS mainimg,
 (SELECT img FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS optionimg,
 (SELECT price FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS oprice,
 (SELECT pricecard FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS pricecard,
  (SELECT slug FROM productgroups as t2 WHERE t1.groupid=id) as 'gslug'  FROM products AS t1
LEFT JOIN categories as t2 ON(t1.category=t2.id)
LEFT JOIN categories as t3 ON(t2.id=t3.pid) WHERE t2.nameen = 'Accessories' OR t2.pid = (SELECT id FROM categories  WHERE nameen='Accessories')
ORDER BY RAND()  LIMIT 12");
							  while($r1=mysqli_fetch_assoc($product) )
								  
							  
							   {
?>
<?php
/* if(trim($rowproduct['brand'])=='ALTA')
	{
		$rowproduct['brand']='CHQARA';
	}
	*/

	
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
			$img="/admin/img/noimage.png";
		}	
		}
	}
?>
		<div href=/<?=$L?>"/product/<?=$r1["id"]?>" class="col-md-6 col-lg-4 col-xl-3">
			<div class="ITEM mb-3">
				<div class="row p-3">
				  
								<a href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r1["gslug"]==""?$r1["slug"]:$r1["gslug"] ?>/<?=$r1["id"]?>" class="col-sm-12 IMG" style="background:url('<?=$img?>');" ></a>
								<a href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r1["gslug"]==""?$r1["slug"]:$r1["gslug"] ?>" class="col-sm-12  TITL MH70 FS13" d="<?=$r1["id"]?>"><?=$r1["titlege"]?></a>
								
								<?php
				      if($r1["oprice"]>0)
					  {
						  
				          ?>	
								<div class="col-sm-12 PRI FS30" d="<?=$r1["id"]?>"><?=number_format($r1["oprice"]??0)?>₾							<span class="old-price">
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
									<div class="col-sm-7 col-7 pr-0">
								

									</div>
									<div class="col-sm-5 col-5 pl-0 text-right">
										<i aria-hidden="true" class="fa fa-eye animated heartBeat"></i><span class="FS12 ml-1"><?=$r1["views"]?></span>
										
										<span><?=$r1["likes"]??""?></span>
									</div>

									</div>							
								</div>
								<div thumb="<?=str_replace("uploads","thumbs",$img)?>" d="<?=$r1["id"]?>" n="1" class="col-sm-12 mt-2 text-center CP CARTBUT ADDCART">კალათაში დამატება</div>
				</div>
			</div>
		</div>     
   
<?php
								   
							   }

						   ?>
	
</div>
</div>
