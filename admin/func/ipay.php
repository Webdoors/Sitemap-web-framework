<?php

$order_id=$_POST["order_id"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://ipay.ge/opay/api/v1/oauth2/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "grant_type=client_credentials",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/x-www-form-urlencoded",
    "Authorization: Basic ".base64_encode("2541:451342484ecca4b702c4a0894c70873c"),
  ),
));
// echo base64_encode("2541:451342484ecca4b702c4a0894c70873c");
$response = curl_exec($curl);

curl_close($curl);
// echo $response;

$jwt=json_decode($response,true);
$jwt=$jwt["access_token"];
// var_dump($jwt);

// $curl = curl_init();

// curl_setopt_array($curl, array(
  // CURLOPT_URL => "https://ipay.ge/opay/api/v1/checkout/orders",
  // CURLOPT_RETURNTRANSFER => true,
  // CURLOPT_ENCODING => "",
  // CURLOPT_MAXREDIRS => 10,
  // CURLOPT_TIMEOUT => 0,
  // CURLOPT_FOLLOWLOCATION => true,
  // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  // CURLOPT_CUSTOMREQUEST => "POST",
  // CURLOPT_POSTFIELDS =>"{\r\n  \"intent\": \"CAPTURE\",\r\n  \"redirect_url\" : \"https://supta.ge/ka/successpay\",\r\n  \"shop_order_id\" : \"".rand(9999,99999)."\",\r\n  \"card_transaction_id\" : \"\",\r\n  \"locale\" : \"en-US\",\r\n  \"purchase_units\": [\r\n    {\r\n      \"amount\": {\r\n        \"currency_code\": \"GEL\",\r\n        \"value\": \"01.00\"\r\n      },\r\n      \"industry_type\" : \"ECOMMERCE\"\r\n    }\r\n  ],\r\n  \"items\": [\r\n\t{\"amount\":\"1.10\", \"description\": \"desc\", \"product_id\": 23112}\r\n\r\n  ]\r\n}",
  // CURLOPT_HTTPHEADER => array(
    // "Content-Type: application/json",
    // "Authorization: Bearer ".$jwt
  // ),
// ));

// $response = curl_exec($curl);
// var_dump($response);
// curl_close($curl);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://ipay.ge/opay/api/v1/checkout/payment/".$order_id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_POST=>0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer ".$jwt
  ),
));

 $response = curl_exec($curl);

curl_close($curl);

$response=json_decode($response,true);


/////new
// Your token and order ID
// Your OAuth2 credentials
$client_id = '2541';
$client_secret = '451342484ecca4b702c4a0894c70873c';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, 'https://oauth2.bog.ge/auth/realms/bog/protocol/openid-connect/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

// Basic Authentication
curl_setopt($ch, CURLOPT_USERPWD, $client_id . ':' . $client_secret);

// Headers
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Data
$data = array('grant_type' => 'client_credentials');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

// Execute cURL session and get the response
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Print the response
$token=json_decode($response,1)["access_token"];
// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, 'https://api.bog.ge/payments/v1/receipt/' . $order_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_USERPWD, $client_id . ':' . $client_secret);
// Headers
$headers = array();
$headers[] = 'Accept-Language: ka';
$headers[] = 'Authorization: Bearer ' . $token;
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute cURL session and get the response
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Print the response
// echo $response;
$response=json_decode($response,1);
$status=$response["order_status"]["key"];
/////			
			


// if($response["status"]=="success"){
if($status=="completed"){
	echo "<h2 class='text-success'>გადახდა წარმატებულია</h2>";
}else{
	echo "<h2 class='text-danger'>გადახდა უარყოფილია</h2>";
}

echo "<pre>";
  var_dump($response);

