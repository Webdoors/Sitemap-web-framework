<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$brandsArray = json_decode($m["brands"], true);
$catsArray = json_decode($m["categories"], true);
$prosArray = json_decode($m["products"], true);
$productPriceArray = json_decode($m["productprice"], true);
$brandsList = implode(',', array_map('intval', $brandsArray??[]));
$catsList = implode(',', array_map('intval', $catsArray??[]));
$prosList = implode(',', array_map('intval', $prosArray??[]));
$productPriceList = implode(',', array_map('intval', $productPriceArray??[]));
$str="IF(t1.id IN ($productPriceList), t1.sacalo, NULL) AS 'price',";
if(count($productPriceArray??[])<1){
	$str="t1.sacalo as 'price',";
}
$q1=mysqli_query($con,"SELECT t1.id,t1.code,t1.namege,
".$str."
t1.instock,t1.reserved,(SELECT t2.namege FROM brands as t2 WHERE t1.brand=t2.id) as 'brand' FROM products as t1 WHERE t1.instock>0 AND ( ".($brandsList!=""?"t1.brand IN ($brandsList)":"t1.brand!=''")." ".($catsList!=""?" AND t1.category IN ($catsList)":" AND t1.category!=''")." ".($prosList!=""?" AND  t1.id IN ($prosList)":" AND t1.id!=''")." )");
$r1=mysqli_fetch_all($q1,MYSQLI_ASSOC);
if(mysqli_num_rows($q1)>0){
$arr=["products"=>$r1];	
}else{
$arr=["status"=>"nothing found"];	
}
// var_dump($r1);

$arr=json_encode($arr, JSON_UNESCAPED_UNICODE);
echo $arr;