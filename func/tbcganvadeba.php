<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
$cart=json_decode($_COOKIE["cart"],1);
	$method=mysqli_real_escape_string($con,$_POST["method"]??"");
// var_dump($pros);
$tprice=0;
$products="";
	foreach($cart as $item){
	$q1=mysqli_query($con,"SELECT t1.*,
	 (SELECT img FROM options WHERE id='".$item["option"]."'  LIMIT 1) AS optionimg,
	 (SELECT price FROM options WHERE id='".$item["option"]."'  LIMIT 1) AS oprice,
	 (SELECT pricecard FROM options WHERE id='".$item["option"]."'  LIMIT 1) AS pricecard
	FROM products as t1

	WHERE t1.id ='".$item["pid"]."'");

	$r1=mysqli_fetch_array($q1);
	$price=($method=="4"?$r1["oprice"]:($r1["pricecard"]!="0"?$r1["pricecard"]:$r1["oprice"]));
	$products.= '  {
  "name": "'.$r1["nameen"].'",
  "price": '.($price).',
  "quantity": '.$item["quantity"].'
},';
$tprice+=$price;
}
$products=substr($products,0,-1);


// var_dump($products);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.tbcbank.ge/oauth/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'grant_type=client_credentials&scope=online_installments',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic *******'
  ),
));

$response = curl_exec($curl);
// var_dump($response);
curl_close($curl);
$token=json_decode($response,true);
$token=$token["access_token"];

$curl = curl_init();
$header=[];
  // CURLOPT_URL => 'https://api.tbcbank.ge/v1/online-installments/applications',
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.tbcbank.ge/v1/online-installments/applications',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HEADER=>1,
  CURLOPT_POSTFIELDS =>'{
  "merchantKey": "*******",
  "priceTotal": '.$tprice.',
  "campaignId":	"529",
  "invoiceId": "'.rand(11111,99999).'",
  "products": [
		'.$products.'
  ]
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$token,
    'Content-Type: application/json'
  ),
));
curl_setopt($curl, CURLOPT_HEADERFUNCTION,
  function($curl, $header) use (&$headers)
  {
    $len = strlen($header);
    $header = explode(':', $header, 2);
    if (count($header) < 2) // ignore invalid headers
      return $len;

    $headers[strtolower(trim($header[0]))][] = trim($header[1]);

    return $len;
  }
);
$response = curl_exec($curl);

curl_close($curl);
  // echo "<pre>";
  // var_dump($products);

  // $response=$response;
 // var_dump($headers);
 // var_dump($response);
 echo $headers["location"][0];
$sessionid=explode("sessionId=",$headers["location"][0]);
$sessionid=end($sessionid);
// var_dump($sessionid);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.tbcbank.ge/v1/online-installments/applications/'.$sessionid.'/confirm',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "merchantKey": "*******"
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$token,
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

// curl_close($curl);
// var_dump($response);
// $curl = curl_init();

// curl_setopt_array($curl, array(
  // CURLOPT_URL => 'https://test-api.tbcbank.ge/v1/online-installments/applications/'.$sessionid.'/cancel',
  // CURLOPT_RETURNTRANSFER => true,
  // CURLOPT_ENCODING => '',
  // CURLOPT_MAXREDIRS => 10,
  // CURLOPT_TIMEOUT => 0,
  // CURLOPT_FOLLOWLOCATION => true,
  // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  // CURLOPT_CUSTOMREQUEST => 'POST',
  // CURLOPT_POSTFIELDS =>'{
  // "merchantKey": "405281216-5da67d86-a181-4158-97c1-de83cbba9598"
// }',
  // CURLOPT_HTTPHEADER => array(
    // 'Authorization: Bearer '.$token,
    // 'Content-Type: application/json'
  // ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// var_dump($response);