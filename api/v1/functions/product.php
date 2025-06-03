<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$pid=mysqli_real_escape_string($con,$p4??"");
$productPriceArray = json_decode($m["productprice"], true);
$productPriceList = implode(',', array_map('intval', $productPriceArray??[]));
$str="IF(t1.id IN ($productPriceList), t1.sacalo, NULL) AS 'price'";
if(count($productPriceArray??[])<1){
	$str="t1.sacalo as 'price'";
}
$q1=mysqli_query($con,"SELECT t1.id,t1.namege,t1.nameen,t1.nameru,t1.sale,t1.date,t1.active,t1.category,t1.categoryall,t1.catids,t1.brand,t1.slug,t1.style,t1.ytube,t1.code,t1.gender,t1.fls,t1.keysen,t1.keysge,t1.keysru,t1.base,t1.instock,t1.reserved,t1.groupid,t1.mid,t1.shippingmethod,t1.finaid,t1.specs,t1.sizes,t1.pos,t1.customgift,t1.360link,t1.VAT,t1.barcode,t1.slider,t1.featured,t1.charachteristics,t1.filters,".$str.",(SELECT t2.img FROM productimgs as t2 WHERE t1.id=t2.productid AND t2.main=1) as 'img',
    (SELECT GROUP_CONCAT(t2.img ORDER BY t2.id SEPARATOR ', ') 
     FROM productimgs AS t2 
     WHERE t1.id = t2.productid AND t2.main != 1) AS 'additional_imgs',
    (SELECT GROUP_CONCAT(t2.file ORDER BY t2.id SEPARATOR ', ') 
     FROM productfiles AS t2 
     WHERE t2.code = t1.code) AS 'files',
(SELECT t2.namege FROM brands as t2 WHERE t1.brand=t2.id) as 'brand',(SELECT t2.column_value FROM langs as t2 WHERE t2.table_name='products' AND t2.table_id=t1.id AND t2.table_column='title' AND t2.shortname='ka' LIMIT 1) as 'title',(SELECT t2.column_value FROM langs as t2 WHERE t2.table_name='products' AND t2.table_id=t1.id AND t2.table_column='bigtext' AND t2.shortname='ka') as 'bigtext',(SELECT t2.column_value FROM langs as t2 WHERE t2.table_name='products' AND t2.table_id=t1.id AND t2.table_column='description' AND t2.shortname='ka' LIMIT 1) as 'smalldesc' FROM products as t1 WHERE t1.id='".$pid."' or t1.code='".$pid."' ");
$r1=mysqli_fetch_all($q1,MYSQLI_ASSOC);
if(mysqli_num_rows($q1)>0){
$arr=["products"=>$r1];	
}else{
$arr=["status"=>"nothing found"];	
}
// var_dump($r1);

$arr=json_encode($arr, JSON_UNESCAPED_UNICODE);
echo $arr;

