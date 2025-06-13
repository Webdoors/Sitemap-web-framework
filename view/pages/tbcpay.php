<?php
    // ini_set('display_errors', 1);
 // ini_set('display_startup_errors', 1);
 // error_reporting(E_ALL);
$ip=$_SERVER['REMOTE_ADDR'];
$T=time();


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.tbcbank.ge/v1/tpay/payments",
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
    "apikey: *******",
    "Authorization: Bearer ".base64_encode("7000534:*******"),
  ),
));
// echo base64_encode("2541:451342484ecca4b702c4a0894c70873c");
$response = curl_exec($curl);

curl_close($curl);

//$jwt=json_decode($response,true);
//$jwt=$jwt["access_token"];
var_dump($response);

// $curl = curl_init();

// curl_setopt_array($curl, array(
  // CURLOPT_URL => "https://api.tbcbank.ge/v1/tpay/payments",
  // CURLOPT_RETURNTRANSFER => true,
  // CURLOPT_ENCODING => "",
  // CURLOPT_MAXREDIRS => 10,
  // CURLOPT_TIMEOUT => 0,
  // CURLOPT_FOLLOWLOCATION => true,
  // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  // CURLOPT_CUSTOMREQUEST => "POST",
  // CURLOPT_POSTFIELDS =>"{\r\n  \"intent\": \"CAPTURE\",\r\n  \"redirect_url\" : \"https://ilands.ge/ka/successpaybog\",\r\n  \"shop_order_id\" : \"".$T."\",\r\n  \"card_transaction_id\" : \"\",\r\n  \"locale\" : \"en-US\",\r\n  \"purchase_units\": [\r\n    {\r\n      \"amount\": {\r\n        \"currency_code\": \"GEL\",\r\n        \"value\": \"".10."\"\r\n      },\r\n      \"industry_type\" : \"ECOMMERCE\"\r\n    }\r\n  ],\r\n  \"items\": [\r\n\t{\"amount\":\"".$sul."\", \"description\": \"OrderId:".$T."\", \"product_id\": ".$T."}\r\n\r\n  ]\r\n}",
  // CURLOPT_HTTPHEADER => array(
    // "Content-Type: application/json",
    // "Authorization: Bearer ".$jwt
  // ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// $response=json_decode($response,true);

?>
<div class="container">
	<label>Wait...</label>
</div>
<br>
<br>	
<script type="text/javascript" language="javascript">
function redirect() {
	document.returnform.submit();
}
</script>
<form name="returnform" action="https://ecommerce.ufc.ge/ecomm2/ClientHandler" method="POST">
<input type="hidden" name="trans_id" value="<?=$trid?>">


<!-- To support javascript unaware/disabled browsers -->
<noscript>
<center>Please click the submit button below.<br>
<input type="submit" name="submit" value="Submit"></center>
</noscript>
</form>