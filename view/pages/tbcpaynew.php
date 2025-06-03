<?php

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
  CURLOPT_POSTFIELDS => 'client_Id=7000534&client_secret=I69NVWdBWWq9bJGJ',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'apikey: ecYSFMK8ptvd4PtnHKEH0W1SVg4cn35J'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
	$response=json_decode($response,1);
	$token=$response["access_token"];

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
        "total": 1,
        "subTotal": 0,
        "tax": 0,
        "shipping": 0
    },
    "returnurl":"https://iland.ge/ka/tbcpaycallback",
    "methods" : [5],
    "installmentProducts":
    [
       {"Name":"t1","Price":100,"Quantity":1},
       {"Name":"t1","Price":50,"Quantity":1},
       {"Name":"t1","Price":50,"Quantity":1}
    ],
    "callbackUrl":"https://iland.ge/ka/tbcpaycallback", 
    "preAuth":true,
    "language":"KA",
    "merchantPaymentId": "P123123"
}
',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'apikey: ecYSFMK8ptvd4PtnHKEH0W1SVg4cn35J',
    'Authorization: Bearer '.$token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
