<?php

	 // file_put_contents("/home/admin/domains/pitstopmoto.ge/cron/finalog.txt","Finacharacteristics Start ".date("d.m.Y H:i:s",time())." ",FILE_APPEND);
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
	$url = 'http://'.$finaip.':'.$finaport.'/api/operation/getProductAdditionalFields';
	$ch = curl_init();
	$post = [
		8,9
	];
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
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}else{
		 $arr=json_decode($result, true);
		 $arr=$arr["fields"];
		 mysqli_query($con,"DELETE FROM additionalfields WHERE id>0 ");
		foreach($arr as $ar){
			mysqli_query($con,"INSERT INTO additionalfields SET name='".$ar["name"]."',header='".$ar["header"]."'");
		}
	}
	$q2=mysqli_query($con,"SELECT name FROM additionalfields WHERE  header='ბრენდი' ");
	$r2=mysqli_fetch_array($q2);
	$url = 'http://'.$finaip.':'.$finaport.'/api/operation/getProducts';
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
	mysqli_query($con,"DELETE FROM productsmeta WHERE id>0 ");
	// echo "<pre>";	
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}else{
		 $arr=json_decode($result, true);
		 // var_dump($arr);
		 $arr=$arr["products"];
		 $cats=[];
		 $brands=[];
		foreach($arr as $ar){
				foreach($ar["add_fields"] as $fi){
					if($fi["value"]!=""){
	
						if($fi["field"]=="usr_column_504"){
							$brands[]=$fi["value"];							
						}
						if($fi["field"]=="usr_column_503"){
							$cats[]=$fi["value"];
						}
						if($fi["field"]=="usr_column_505"){
							$cats[]=$fi["value"];
						}
						if($fi["field"]=="usr_column_506"){
							$cats[]=$fi["value"];
						}
						if($fi["field"]=="usr_column_507"){
							$cats[]=$fi["value"];
						}
						
					 }						
				}				
		}
	}
	$q1=mysqli_query($con,"SELECT name,id from categories");
	while($r1=mysqli_fetch_array($q1)){
		if(!in_array($r1["name"],$cats)){
			mysqli_query($con,"DELETE from categories WHERE id='".$r1["id"]."' AND type='1'");
		}
	}
	$q1=mysqli_query($con,"SELECT nameen,id from brands");
	while($r1=mysqli_fetch_array($q1)){
		if(!in_array($r1["nameen"],$brands)){
			mysqli_query($con,"DELETE from brands WHERE id='".$r1["id"]."'");
		}
	}
	curl_close ($ch);

?>
