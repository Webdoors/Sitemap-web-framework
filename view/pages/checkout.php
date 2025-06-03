<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
?>
<div class="container my-5">	
	<div class="row">
		<div class="col-sm-12 mt-5">
		
		</div>
		<div class="col-sm-6 pl-sm-0">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-12">
							<h2>შეკვეთა</h2><hr/>
						</div>
<?php
$method=mysqli_real_escape_string($con,$_GET["method"]??"4");
$shippingmethod=mysqli_real_escape_string($con,$_GET["shippingmethod"]??"3");
$cart=$_COOKIE["cart"];
$cart=json_decode($cart,true);
$list=implode(",", array_keys($cart));
$list = rtrim($list, ",");

$trao=0;
$tsum=0;
$products=[];
$productscredo=[];
$md5=[];
$q2=mysqli_query($con,"SELECT * FROM shippingmethods WHERE id='".$shippingmethod."'");
$r2=mysqli_fetch_array($q2);
$shipping=$r2["price"];
	foreach($cart as $item){
	$q1=mysqli_query($con,"SELECT t1.*, (SELECT img FROM productimgs WHERE id=1 AND main=1 ) AS mainimg,
	 (SELECT img FROM options WHERE id='".$item["option"]."'  LIMIT 1) AS optionimg,
	 (SELECT price FROM options WHERE id='".$item["option"]."'  LIMIT 1) AS oprice,
	 (SELECT pricecard FROM options WHERE id='".$item["option"]."'  LIMIT 1) AS pricecard,t2.name".$lang." as 'subcat',t2.slug as 'subcatslug'
	 FROM products AS t1
	LEFT JOIN categories as t2 ON(t1.category=t2.id)
	LEFT JOIN categories as t3 ON(t2.id=t3.pid)
	 WHERE t1.id ='".$item["pid"]."'");
	 $r1=mysqli_fetch_array($q1);
	$price=($method=="4"?$r1["oprice"]:($r1["pricecard"]!="0"?$r1["pricecard"]:$r1["oprice"]));
	$product1 = array(
	'title'=>$r1["nameen"],
	'price'=>round($r1["saleprice"]/0.94),
	'quantity' =>$item["quantity"],
	);
	$productcredo = array(
	'id'=>$r1["id"],
	'title'=>$r1["nameen"],
	'price'=>round($r1["saleprice"]/0.94)*100,
	'amount' =>$item["quantity"],
	'type' =>"0",
	);

	array_push($md5,$r1["id"]);
	array_push($md5,$r1["nameen"]);
	array_push($md5,$item["quantity"]);
	array_push($md5,round($r1["saleprice"])*100);
	array_push($md5,0);
	array_push($products,$product1);
	array_push($productscredo,$productcredo);
	$trao=$trao+$item["quantity"];
	$tsum=$tsum+$item["quantity"]*$price;
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
						<div class="col-sm-12 ITEM2">
							<div class="row align-items-center">
								<div class="col-sm-2 pl-sm-0">
									<a href="/product/<?=$r1["subcatslug"]?>/<?=$r1["slug"]?>"><img style="width:100px;" src="<?=$img?>" /></a>
								</div>
								<div class="col-sm-4 pl-sm-0">
									<a href="/product/<?=$r1["subcatslug"]?>/<?=$r1["slug"]?>"><h6 class="pl-3"><?=$r1["nameen"]?></h6></a>
								</div>
								<div class="col-sm-3 pl-sm-0">
									რაოდენობა
									<div class="col-sm-12 col-4 p-0 quantity-product js-call-quantity">
										<span class="btn-num-product-down MINU" d="<?=$r1["id"]?>"><i aria-hidden="true" class="entypo-icon-minus-2"></i></span>
										<input class="input-field RAO2" price="<?=$price?>" oid="<?=$item["option"]?>" p="<?=$r1["oprice"]??0 ?>" d="<?=$r1["id"]?>" type="number" value="<?=$item["quantity"]?>">

										<span class="btn-num-product-up PLIU" d="<?=$r1["id"]?>" ><i aria-hidden="true" class="entypo-icon-plus-2"></i></span>
									</div>									
								</div>
								<div class="col-sm-2">
									<h3 class="new-price my-5 pl-3 PRI">
									<?php
									   if($method==4)
									   {
									 ?>
										<?=number_format($r1["oprice"]??0) ?>₾
										<span class="old-price <?=$r1["pricecard"]!="0"?"":"d-none"?>">
											<small><?=number_format($r1["pricecard"]??0)?>₾</small>
										</span>
										<?php
									   }
										else
										{
											?>
											<?=number_format($price??0) ?>₾
											<?php
										}											
										 ?>
									</h3>	
								</div>
								<i aria-hidden="true" d="<?=$r1["id"]?>" class="silk-icon-trashcan DELCART CP"></i>
							</div><hr/>
						</div>
<?php
}
$md5=implode(",",$md5);
$md5=md5($md5);

$cart = array(
'products'=> $products,
'total_sum'=> round($tsum/0.94),
);

?>											
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
		<div class="col-sm-12 col-xs-12 col-md-12">
			<div class="col-sm-12 p-0">
				<h2>ინფორმაცია</h2><hr/>
			</div>
			<div class="row">
				<div class="col-sm-12 BCT mb-2">
					<input class="form-control INF" disabled value="<?=$ru["firstname"]??""?>" d="firstname" placeholder="Name"/>
				</div>
			</div>
			<div class="BCT mb-2">
				<input class="form-control INF" disabled value="<?=$ru["lastname"]??""?>" d="lastname" placeholder="Lastname"/>
			</div>
			<div class="BCT mb-2">
				<input class="form-control INF" disabled value="<?=$ru["email"]??""?>" d="email" placeholder="Email"/>
			</div>
			<div class="BCT mb-2">
				<input class="form-control INF" disabled value="<?=$ru["tel"]??""?>" d="tel" placeholder="Tel"/>
			</div>
			<div class="BCT mb-2">
				<select class="form-control INF" d="country" l='<?=$L ?>'  placeholder="Country">
<?php
$q10=mysqli_query($con,"SELECT * FROM country");
while($r10=mysqli_fetch_array($q10)){
?>	
<option <?=($ru["country"]==""?"79":$ru["country"])==$r10["id"]?"selected":""?> value="<?=$r10["id"]?>" ><?=$r10["name"]?></option>
<?php
}
?>				
				</select>
			</div>
			<div class="BCT mb-2">
			<select class="form-control INF <?=$ru['country']!=79?"d-none":"" ?>" d="city" >
			<option value="">აირჩიეთ ქალაქი <?=$ru['city'] ?></option>
<?php
$q11=mysqli_query($con,"SELECT * FROM city");
while($r11=mysqli_fetch_array($q11)){
?>	
								<option <?=$r11["id"]==$ru['city']?"selected":""?> value="<?=$r11["id"]?>"><?=$r11["name"]?></option>
<?php
}
?>			
</select>
			</div>
			<div class="BCT mb-2">
				<input class="form-control INF" value="<?=$ru["shippingaddress1"]??""?>" d="shippingaddress1" placeholder="Shipping Address 1"/>
			</div>
			<div class="BCT mb-2">
				<input class="form-control INF" value="<?=$ru["shippingaddress2"]??""?>" d="shippingaddress2" placeholder="Shipping Address 2"/>
			</div>
			<div class="BCT mb-2">
				<input class="form-control INF" value="<?=$ru["zip"]??""?>" d="zip" placeholder="Zip Code"/>
			</div>
		</div>		
		</div>
		<div class="col-sm-3 px-sm-0 px-5">
			<div class="row">
				<div class="col-sm-12 text-right">
					<div class="row">
						<div class="col-sm-12">
							<h3>შეკვეთა</h3><hr/>
						</div>	
						<div class="col-sm-12">
							<h6>რაოდენობა <span class="TRAO"><?=$trao?></span></h6>
						</div>	
						<div class="col-sm-12">
							<h6>ჯამში <span class="SUM"><?=$tsum?></span>₾</h6><hr/>
						</div>	
						<div class="col-sm-12">
							<h6>მიტანის ღირებულება <span class="SHIP"><?=number_format($shipping,2)?></span>₾</h6><hr/>
						</div>	
						<div class="col-sm-12">
							<h3>სულ ჯამში <span class="TSUM"><?=number_format($tsum+$shipping,2)?></span>₾</h3><hr/>
						</div>	
						<div class="col-sm-12 mb-2 text-center <?=$method!="4"?"tred":"" ?>">
          <small  >სააქციო ფასის მიღებისთვის ამოირჩიეთ ნაღდი ანგარიშსწორებით გადახდა</small>
						</div>	
						<div class="col-sm-12">

							<select class="form-control METHOD mb-2" onchange="location.href='/<?=$L?>/checkout?method='+$('.METHOD').val()+'&shippingmethod='+$('.SHIPPINGMETHOD').val();">
								<option value="">აირჩიეთ გადახდის მეთოდი</option>							
								<option <?=$method=="25"?"selected":""?> value="25">ინვოისით გადახდა</option>
								<option <?=$method=="1"?"selected":""?> value="1">ბარათით გადახდა</option>
								<option <?=$method=="4"?"selected":""?> value="4">ნაღდი ანგარიშსწორებით გადახდა</option>
								<option <?=$method=="9"?"selected":""?> value="9">განვადება</option>
							</select>
						</div>	
						<div class="col-sm-12">
							<select class="form-control SHIPPINGMETHOD "  onchange="location.href='/<?=$L?>/checkout?method='+$('.METHOD').val()+'&shippingmethod='+$('.SHIPPINGMETHOD').val();">
								<option value="">აირჩიეთ მიწოდების ფორმა</option>
<?php
$q11=mysqli_query($con,"SELECT * FROM shippingmethods");
while($r11=mysqli_fetch_array($q11)){
	if(($ru['city']=='22'&&$ru['country']==79)&&$r11['id']==5)
	{
		continue; 
	}
?>	
								<option <?=($shippingmethod==$r11["id"]?"selected":"") ?> value="<?=$r11["id"]?>"><?=$r11["name"]?> <?=$r11['price']!=0?"(". $r11['price'] ." ₾)":"" ?></option>
<?php
}
?>	
							</select>
						</div>	
						<div class="col-sm-12 d-flex justify-content-end">
							<button uid="<?=$uid?>" class="col-sm-7 btn-addcart ADDORD ">
							შეკვეთა
						</button>
						</div>	
					<div class="price-product col-sm-12 d-none mt-4 justify-content-center" style="font-weight:bold;color:#fc5340;">
						<span class="new-price">
							განვადების შემთხვევაში <strong><?=number_format($tsum/0.94)?>₾</strong> 
						</span>
						<a class="ml-3" href="https://akido.ge//vendor_login/7665/?cart=<?=urlencode(json_encode($cart))?>"><img style="height:50px" src="/img/logo_ka.png" /></a>
					</div>	
					<div class="col-sm-12 d-none text-center">თვეში <?=number_format($tsum/0.94/12)?>₾-დან</div>
					<div class="col-sm-12 d-none">
						<form action="http://ganvadeba.credo.ge/widget/" id="myform" class="text-right pr-0 mt-2" method="post"> 
						<input type="hidden" name="credoinstallment" 
						value='{"merchantId":"11823", 
						"orderCode":"<?=rand(11111,99999)?>", 
						"check":"<?=$md5?>", 
						"products":<?=json_encode($productscredo)?>
						}' /> 
						<img onclick="document.forms['myform'].submit();" class="CP" style="width:194px;" src="/img/credo.png" />
						</form>
					</div>					
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>