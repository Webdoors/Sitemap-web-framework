<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$pid=mysqli_real_escape_string($con,$p4??"");

$q1=mysqli_query($con,"SELECT t1.*,t2.mobile_phone FROM orders as t1 LEFT JOIN id as t2 ON(t1.uid=t2.id) WHERE t2.mobile_phone='".$p4."' ORDER BY t1.id DESC LIMIT 1 ");
$r1=mysqli_fetch_all($q1,MYSQLI_ASSOC);
if(mysqli_num_rows($q1)>0){
$arr=["order"=>$r1];	
}else{
$arr=["status"=>"nothing found"];	
}
// var_dump($r1);

$arr=json_encode($arr, JSON_UNESCAPED_UNICODE);
echo $arr;

