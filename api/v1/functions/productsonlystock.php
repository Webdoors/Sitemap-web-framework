<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$productPriceArray = json_decode($m["productprice"], true);
$productPriceList = implode(',', array_map('intval', $productPriceArray??[]));
$str="IF(t1.id IN ($productPriceList), t1.sacalo, NULL) AS 'price',";
if(count($productPriceArray??[])<1){
	$str="t1.sacalo as 'price',";
}
$q1=mysqli_query($con,"SELECT t1.id,t1.code,t1.instock,t1.reserved,".$str." FROM products as t1 WHERE t1.instock>0 ");
$r1=mysqli_fetch_all($q1,MYSQLI_ASSOC);
if(mysqli_num_rows($q1)>0){
$arr=["products"=>$r1];	
}else{
$arr=["status"=>"nothing found"];	
}
// var_dump($r1);

$arr=json_encode($arr, JSON_UNESCAPED_UNICODE);
echo $arr;