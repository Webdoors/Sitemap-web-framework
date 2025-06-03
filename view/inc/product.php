<?php
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
		<div href=/<?=$L?>"/product/<?=$r1["id"]?>" class="">
			<div class="ITEM mb-3">
				<div class="row p-3">
				  
								<a href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r1["gslug"]==""?$r1["slug"]:$r1["gslug"] ?>/<?=$r1["id"]?>" class="col-sm-12 IMG" style="background:url('<?=$img?>');" ></a>
								<a href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r1["gslug"]==""?$r1["slug"]:$r1["gslug"] ?>" class="col-sm-12  TIT MH70 FS13" d="<?=$r1["id"]?>"><?=$r1["titlege"]?></a>
								
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
								<div thumb="<?=str_replace("uploads","thumbs",$img)?>" oid="<?=$r1["oid"]?>" d="<?=$r1["id"]?>" n="1" class="col-sm-12 mt-2 text-center CP CARTBUT ADDCART">კალათაში დამატება</div>
				</div>
			</div>
		</div> 