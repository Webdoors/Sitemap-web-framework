<?php

	 // file_put_contents("/home/admin/domains/pitstopmoto.ge/cron/finalog.txt","Finacharacteristics Start ".date("d.m.Y H:i:s",time())." ",FILE_APPEND);

	$url = 'http://176.221.209.79:8089/api/authentication/authenticate';
	$ch = curl_init();
	$post = [
		'login' => 'webapi',
		'password' => 'webpass4intelectro',
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
	$url = 'http://176.221.209.79:8089/api/operation/getProductAdditionalFields';
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
	$url = 'http://176.221.209.79:8089/api/operation/getProducts';
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

	// echo "<pre>";	
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}else{
		 $arr=json_decode($result, true);
		 // var_dump($arr);
		 $arr=$arr["products"];
		foreach($arr as $ar){
			// if($ar["id"]=="3584"){
				$cats=[];
				foreach($ar["add_fields"] as $fi){
					if($fi["value"]!=""){	
						if($fi["field"]=="usr_column_504"){
							$q1=mysqli_query($con,"SELECT id FROM brands WHERE nameen='".$fi["value"]."' ");
							$r1=mysqli_fetch_array($q1);
							if(mysqli_num_rows($q1)<1){
								if($fi["value"]!=""){
									mysqli_query($con,"INSERT INTO brands SET nameen='".$fi["value"]."',namege='".$fi["value"]."',nameru='".$fi["value"]."' ");
									$brandid=mysqli_insert_id($con);														
									mysqli_query($con,"UPDATE products SET brand='".$brandid."' WHERE finaid='".$ar["id"]."'  ");							
								}
							}else{
								$brandid=$r1["id"];							
								mysqli_query($con,"UPDATE products SET brand='".$brandid."' WHERE finaid='".$ar["id"]."'  ");
							}							
						}						
					 }else{
	
					 }					
				}				
		// }
		}
	}

	curl_close ($ch);
	function geotoeng(string $word){
		$alpha = array("ა"=>'a',"ბ"=>'b','c',"დ"=>'d',"ე"=>'e',"ფ"=>'f',"გ"=>'g',"ჰ"=>'h',"ი"=>'i','j',"კ"=>'k',"ლ"=>'l',"მ"=>'m',"ნ"=>'n',"ო"=>'o',"პ"=>'p',"ქ"=>'q',"რ"=>'r',"ს"=>'s',"თ"=>'t',"უ"=>'u',"ვ"=>'v','w','x',"ყ"=>'y',"ზ"=>'z',"ჟ"=>"zh","ტ"=>"t","ხ"=>"kh","შ"=>"sh","ღ"=>"gh","ჯ"=>"j","ძ"=>"dz","წ"=>"ts","ჭ"=>"ch","ჩ"=>"ch","a"=>"a","b"=>"b","c"=>"c","d"=>"d","e"=>"e","f"=>"f","g"=>"g","h"=>"h","i"=>"i","j"=>"j","k"=>"k","l"=>"l","m"=>"m","n"=>"n","o"=>"o","p"=>"p","q"=>"q","r"=>"r","s"=>"s","t"=>"t","u"=>"u","v"=>"v","w"=>"w","x"=>"x","y"=>"y","z"=>"z","-"=>"-","0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9");
		$word=str_replace(" ","-",$word);
		$word = preg_split('//u', $word);
		foreach($word as $key=>$value){
			if(array_key_exists($value,$alpha)){
				$newF[$key]=$alpha[$value];
			}
		}
		$newW=implode("",$newF);
		return $newW;	
	}
?>
<div class="container">
<h1>განახლდა</h1>
<h2>...</h2>
</div>
<script>setTimeout(function(){location.href="/admin/?page=fina";},1000);</script>