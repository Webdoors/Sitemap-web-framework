<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
$T=time();
$uid=$_SESSION["uid"];
	$method=mysqli_real_escape_string($con,$_POST["method"]??"");
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.tbcbank.ge/v1/tpay/access-token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'client_Id=*******&client_secret=*******',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'apikey: *******'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
	$response=json_decode($response,1);
	$token=$response["access_token"];

	$cart=$_COOKIE["cart"];
	$cart=json_decode($cart,true);
	$list=implode(",", array_keys($cart));

	$trao=0;
	$tsum=0;
	foreach($cart as $item){
		$q1=mysqli_query($con,"SELECT t1.*,
	 (SELECT img FROM options WHERE id='".$item["option"]."'  LIMIT 1) AS optionimg,
	 (SELECT price FROM options WHERE id='".$item["option"]."'  LIMIT 1) AS oprice,
	 (SELECT pricecard FROM options WHERE id='".$item["option"]."'  LIMIT 1) AS pricecard
		FROM products as t1 WHERE t1.id ='".$item["pid"]."' ");
		$r1=mysqli_fetch_array($q1);
		$price=($method=="4"?$r1["oprice"]:($r1["pricecard"]!="0"?$r1["pricecard"]:$r1["oprice"]));
		$trao=$trao+$item["quantity"];
		$tsum=$tsum+$item["quantity"]*$price;
		//$tsum=0.01;
	}
	
	$total=$tsum;
	mysqli_query($con,"INSERT INTO tbcpay SET uid='".$uid."',total='".$total."',date='".$T."'");
	$tbcpayid=mysqli_insert_id($con);
	
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.tbcbank.ge/v1/tpay/payments',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "amount": {
        "currency":"GEL",
        "total":'.$total.',
        "subTotal": 0,
        "tax": 0,
        "shipping": 0
    },
    "returnurl":"https://iland.ge/ka/tbcpaycallback",
    "methods" : [5],
    "callbackUrl":"https://iland.ge/ka/tbcpaycallback", 
    "preAuth":true,
    "language":"KA",
    "merchantPaymentId": "'.$tbcpayid.'"
}
',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'apikey: *******',
    'Authorization: Bearer '.$token
  ),
));

$response = curl_exec($curl);
$response=json_decode($response,1);
 // var_dump($response);
curl_close($curl);
$arr=["link"=>$response["links"][1]["uri"],"payid"=>$response["payId"]];
echo json_encode($arr);
	mysqli_query($con,"UPDATE tbcpay SET payid='".$response["payId"]."',recid='".$response["recId"]."',amount='".$response["amount"]."' WHERE id='".$tbcpayid."'");