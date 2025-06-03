<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
?>
<div class="container my-5">	
	<div class="row">
		<div class="col-sm-12 mt-5">
		
		</div>
		<div class="col-sm-8">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-12">
							<h2>კალათა</h2><hr/>
						</div>
<?php
$lang=$L;

$method=4;
$cart=$_COOKIE["cart"]??"";
$cart=json_decode($cart,true);
$list=implode(",", array_keys($cart??[]));
$list = rtrim($list, ",");
if($list!='')
{



$trao=0;
$tsum=0;

	foreach($cart as $item){

	$q1=mysqli_query($con,"SELECT t1.*, (SELECT img FROM productimgs WHERE id=1 AND main=1 ) AS mainimg,
	 (SELECT img FROM options WHERE id='".($item["option"]??"")."'  LIMIT 1) AS optionimg,
	 (SELECT price FROM options WHERE id='".($item["option"]??"")."'  LIMIT 1) AS oprice,
	 (SELECT pricecard FROM options WHERE id='".($item["option"]??"")."'  LIMIT 1) AS 'pricecard',t2.title_".$lang." as 'subcat',t2.slug as 'subcatslug'
	 FROM products AS t1
	LEFT JOIN categories as t2 ON(t1.category=t2.id)
	LEFT JOIN categories as t3 ON(t2.id=t3.pid)
	 WHERE t1.id ='".($item["pid"]??"")."'");
	 $r1=mysqli_fetch_array($q1);
	$price=$item["price"]??0;
	$trao=$trao+(intval($item["quantity"])??0);
	$tsum=$tsum+($item["price"]??0);
	if(($r1["optionimg"]??"")!=""){
		$img=$r1["optionimg"];
	}else{
		if(($r1["img"]??"")!='')
		{
		$img=$r1["img"]??"";
		}
		else
		{
			$img="/img/d1.png";
		if(!file_exists(getcwd().$img)){
			$img="/admin/img/noimage.png";
		}	
		}
	}
?>
						<div class="col-sm-12 ITEM2">
							<div class="row align-items-center">
								<div class="col-sm-2">
									<a href="<?=$L?>/product/<?=$r1["subcatslug"]?>/<?=$r1["slug"]?>/<?=$r1["id"]?>"><img style="width:100px;" src="<?=$img?>" /></a>
								</div>
								<div class="col-sm-3">
									თარიღები
									<a href="<?=$L?>/product/<?=$r1["subcatslug"]??""?>/<?=$r1["slug"]??""?>"><h6 class="pl-3"><?=$item["dates"]??""?></h6></a>
								</div>
								<div class="col-sm-2 pl-4">
									<small class="<?=($item["option"]??"")==""?"d-none":""?>" style="font-size:9px;color:#999">კონსტრუქცია</small><div class=""><?=$item["option"]??""?></div>
								</div>
								<div class="col-sm-2 pl-4">
									რაოდენობა
									<div class="col-sm-12 col-4 p-0  js-call-quantity">
									<?=$item["quantity"]??""?> კვ.მ
										<span class="btn-num-product-down MINU d-none" d="<?=$r1["id"]?>"><i aria-hidden="true" class="entypo-icon-minus-2"></i></span>
										<input class="input-field RAO2 d-none" price="<?=$price?>" oid="<?=$item["option"]??""?>" p="<?=$r1["oprice"]??0 ?>" d="<?=$r1["id"]?>" type="number" value="<?=$item["quantity"]??""?>">

										<span class="btn-num-product-up PLIU d-none" d="<?=$r1["id"]?>" ><i aria-hidden="true" class="entypo-icon-plus-2"></i></span>
									</div>									
								</div>
								<div class="col-sm-2">
									<h3 class="new-price my-5 pl-3 PRI">
										<?=number_format($item["price"]??0)?>₾
									</h3>	
								</div>
								<div class="col-sm-1">
									<i aria-hidden="true" d="<?=$r1["id"]?>" class="fa fa-trash position-relative DELCART CP"></i>
								</div>
							</div><hr/>
						</div>
<?php
	}

}
else
{?>
კალათა ცარიელია
<?php

}

?>												
					</div>
				</div>
			</div>
		</div>
		
		<?php
		if($list!='')
       {
			
			?>
		<div class="col-sm-4 px-5">
			<div class="row">
				<div class="col-sm-12 text-right">
					<div class="row">
						<div class="col-sm-12">
							<h3>შეკვეთა</h3><hr/>
						</div>	
						<div class="col-sm-12">
							<h6>რაოდენობა <span class="TRAO"><?=$trao?></span></h6>
						</div>	
						<div class="col-sm-12 d-none">
							<h6>ჯამში <span class="SUM"><?=$tsum?></span>₾</h6>
						</div>	
						<div class="col-sm-12 d-none">
							<h6>მიტანის ღირებულება <span class="SHIP"><?=number_format(0)?></span>₾</h6><hr/>
						</div>	
						<div class="col-sm-12">
						<hr/>
							<h4>ჯამი <span class="TSUM"><?=$tsum?></span>₾</h4><hr/>
						</div>	
						<div class="col-sm-12 d-flex justify-content-end">
<input type="hidden" class="METHOD" value="10"/>
							<button uid="<?=$uid?>" class="col-sm-7 ms-0 w-100 btn-success btn btn-addcart ADDORD">
							შეკვეთა
							</button>

						</div>				
					</div>
				</div>				
			</div>
		</div>
		
<?php
	   }
?>

	</div>
</div>