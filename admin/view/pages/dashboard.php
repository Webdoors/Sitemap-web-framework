<?php
$key = mysqli_real_escape_string($con,$_GET["key"]);
$store = mysqli_real_escape_string($con,$_GET["store"]);
$brand = mysqli_real_escape_string($con,$_GET["brand"]);
if($key!=""){
	$WSE=" AND ITEM LIKE '%".$key."%' OR CODE LIKE '%".$key."%' OR	BARCODE LIKE '%".$key."%' OR	DESCRIPTION LIKE '%".$key."%' OR	COUNTRY LIKE '%".$key."%' OR	TARIC LIKE '%".$key."%' ";
}
if($store!=""){
	$WST=" AND t2.storeid='".$store."' ";
}else{
	$store="10";
}
if($brand!=""){
	$WBR=" AND t1.brand='".$brand."' ";
}
?>

<div class="col-md-12">
		<br>
	<div class="col-md-12 NOP">
		<div class="col-md-3 NOP">
			<select class="form-control STO" >
				<!--<option value="">Wishlist</option>-->
<?php
$q1=mysqli_query($con,"SELECT * FROM stores ORDER BY id DESC");
while($r1=mysqli_fetch_array($q1)){
?>
				<option <?=$store==$r1["id"]?"selected":""?> value="<?=$r1["id"]?>"><?=$r1["name"]?></option>
<?php
}
?>					
			</select>
		</div>
		<div class="col-md-3">
			<select class="form-control BRN" >
				<option value="">Choose Brand</option>
<?php
$q1=mysqli_query($con,"SELECT * FROM brands ORDER BY id DESC");
while($r1=mysqli_fetch_array($q1)){
?>
				<option <?=$brand==$r1["id"]?"selected":""?>  value="<?=$r1["name"]?>"><?=$r1["name"]?></option>
<?php
}
?>		
			</select>
		</div>
		<div class="col-md-3 NOP">
			<input class="form-control SERC" placeholder="Search">
		</div>
		<div class="col-md-1">
			<div class="btn btn-default SEA">Search</div>
		</div>
	</div>
	<br>&nbsp;
<table id="table-ajax-defer" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Count</th>														
				<th>BARCODE</th>														
				<th>ITEM</th>														
				<th>BRAND</th>														
				<th>QUANTITY</th>						
				<th>PRICE</th>			
				<th>SALES PRICE</th>			
				<th>TOTAL T.PRICE</th>						
				<th>RESERVE</th>				
				<th>PRE-ORDER</th>										
			</tr>
		</thead>
		<tbody>
		</tbody>
<?php
$SQ=0;
$SR=0;
$SP=0;
$TP=0;
$TT=0;
$TTP=0;
$q1=mysqli_query($con,"SELECT t1.* FROM special as t1 LEFT JOIN qbystore as t2 on (t2.itemid=t1.id AND t2.storeid=".$store." AND t2.quantity>0) WHERE t1.id>0 $WSE $WST $WBR");
$ca=0;
while($r1=mysqli_fetch_array($q1)){ 
$ca++;
	$q2=mysqli_query($con,"SELECT SUM(reserve) as 'res',SUM(preorder) as 'pre',SUM(quantity) as 'qnty' FROM `qbystore` WHERE itemid='".$r1["id"]."'");
	$r2=mysqli_fetch_array($q2);
	$qua=$r1["QUANTITY"];
	$SQ=$SQ+$r1["QUANTITY"];
	$SR=$SR+($r2["res"]?$r2["res"]:0);
	$SP=$SP+($r2["pre"]?$r2["pre"]:0);
	$TP=$TP+$r1["PRICE"]*$r1["QUANTITY"];
	$TT=$TT+$r1["PRICE"]*$r2["qnty"];
	$TTP=$TTP+$r1["TPRICE"]*$r1["QUANTITY"];
?>
			<tr>
				<th><?=$ca?></th>										
				<th><?=$r1["BARCODE"]?></th>										
				<th><?=$r1["ITEM"]?></th>										
				<th><?=$r1["brand"]?></th>										
				<th><a class="GQU CP D<?=$r1["id"]?>" d="<?=$r1["id"]?>" ><?=$r2["qnty"]?></a></th>						
				<th><?=round($r1["PRICE"],2)?></th>			
				<th><input class="form-control SALESP" d="<?=$r1["BARCODE"]?>" value="<?=round($r1["salesprice"],2)?>"/></th>			
				<th><?=round($r1["PRICE"]*$r2["qnty"],2)?></th>					
				<th><a class="GQU CP D<?=$r1["id"]?>" d="<?=$r1["id"]?>" ><?=$r2["res"]?$r2["res"]:0?></a></th>					
				<th><a class="GQU CP D<?=$r1["id"]?>" d="<?=$r1["id"]?>" ><?=$r2["pre"]?$r2["pre"]:0?></a></th>									
			</tr>
<?php
}
?>
		<thead>
			<tr>
				<th>Count</th>							
				<th>BARCODE</th>							
				<th>ITEM</th>							
				<th>BRAND</th>							
				<th>QUANTITY</th>						
				<th>SALES PRICE </th>			
				<th>TOTAL T.PRICE </th>			
				<th>TOTAL <?=number_format($TT,2)?></th>						
				<th>RESERVE</th>				
				<th>PRE-ORDER</th>																				
			</tr>
		</thead>
</table>
</div>
<br>&nbsp;