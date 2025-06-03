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
	$url = 'http://'.$finaip.':'.$finaport.'/api/operation/getPriceTypes';
	$ch = curl_init();
	 // $post = ["prods"=> $ark,"price"=> 3];	
	// curl_setopt($ch, CURLOPT_POST, 1);
	 // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
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
	   // var_dump($result);
	   	curl_close ($ch);
	$url = 'http://'.$finaip.':'.$finaport.'/api/operation/getProductPrices';
	$ch = curl_init();
	// $ark=[];
	// $q1=mysqli_query($con,"SELECT finaid FROM finacodeid WHERE  mid=0 ");
	// while($r1=mysqli_fetch_array($q1)){
		// array_push($ark,$r1["finaid"]);
	// }

	 // $post = ["prods"=> $ark,"price"=> 3];	
	// curl_setopt($ch, CURLOPT_POST, 1);
	 // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
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
	  // echo "<pre>";
	  // var_dump($result);

	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}else{
		 $arr=json_decode($result, true)["prices"];
		 $i=0;
		foreach($arr as $ar){		
		$i++;
				$q1=mysqli_query($con,"SELECT id FROM finaprices WHERE product_id='".$ar["product_id"]."' AND mid=0 ");
					$r1=[];
					if($q1!=false){
						$r1=mysqli_fetch_all($q1,MYSQLI_ASSOC);						
					}
						// if(count($r1)>0){
							
							// mysqli_query($con,"UPDATE finaprices SET price='".$ar["price"]."',price_id='".$ar["price_id"]."' WHERE product_id='".$ar["product_id"]."' AND mid=0 ");

						// }else{
							// mysqli_query($con,"INSERT INTO finaprices SET price='".$ar["price"]."',price_id='".$ar["price_id"]."',product_id='".$ar["product_id"]."' ");						
						// }			
if($ar["price_id"]=="3"){
	mysqli_query($con,"UPDATE products SET sacalo='".$ar["price"]."' WHERE finaid='".$ar["product_id"]."' AND base='1' AND mid=0 ");
}		
if($ar["price_id"]=="4"){
	mysqli_query($con,"UPDATE products SET mcire='".$ar["price"]."' WHERE finaid='".$ar["product_id"]."' AND base='1' AND mid=0 ");
}		
if($ar["price_id"]=="5"){
	mysqli_query($con,"UPDATE products SET sabitumo='".$ar["price"]."' WHERE finaid='".$ar["product_id"]."' AND base='1' AND mid=0 ");
}		
if($ar["price_id"]=="7"){
	mysqli_query($con,"UPDATE products SET sadistribucio='".$ar["price"]."' WHERE finaid='".$ar["product_id"]."' AND base='1' AND mid=0 ");
}						
															
		}
	}

	curl_close ($ch);

?>


<div class="container">
<h1>განახლდა</h1>
<h2>...</h2>
</div>
<script>setTimeout(function(){location.href="/admin/?page=fina";},1500);</script>
