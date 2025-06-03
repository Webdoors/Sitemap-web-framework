<?php
	$qf=mysqli_query($con,"SELECT * FROM contactus WHERE id='1'");
	$rf=mysqli_fetch_array($qf);
	$finaip=$rf["finaip"];
	$finaport=$rf["finaport"];
	$finauser=$rf["finauser"];
	$finapass=$rf["finapass"];	
	$url = 'http://'.$finaip.':'.$finaport.'/api/authentication/authenticate';
	$ch = curl_init();
	$post = [
		'login' => $finauser,
		'password' => $finapass,
	];
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_URL,$url); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Accept: application/json',
	));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
	curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
	$result = curl_exec($ch);
	$result10=json_decode($result,true);
	curl_close ($ch);
	$url = 'http://'.$finaip.':'.$finaport.'/api/operation/getProductsRestByStore/2';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Accept: application/json',
		'Authorization: Bearer '.$result10["token"]
	));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
	curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
	$result = curl_exec($ch);	
	// $url = 'http://176.221.209.79:8089/api/operation/GetProductsRest';
	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_URL,$url); 
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		// 'Content-Type: application/json',
		// 'Accept: application/json',
		// 'Authorization: Bearer '.$result10["token"]
	// ));
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
	// curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
	// $result = curl_exec($ch);	
	// var_dump($result);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}else{
		// $arr=json_decode($result, true)["rest"];
		$arr=json_decode($result, true)["store_rest"];
		foreach($arr as $ar){
				mysqli_query($con,"update products SET instock='".$ar["rest"]."'  WHERE finaid='".$ar["id"]."'");			
		}	
	}
	curl_close ($ch);
?>
<div class="container">
<h1>განახლდა</h1>
<h2>...</h2>
</div>
<script>setTimeout(function(){location.href="/admin/?page=fina";},1500);</script>