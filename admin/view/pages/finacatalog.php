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
	$url = 'http://'.$finaip.':'.$finaport.'/api/operation/GetProducts';
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
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}else{
		$arr=json_decode($result, true)["products"];
		
		 // var_dump($arr);
		foreach($arr as $ar){
		// if($ar["id"]=="4503"){
			$name=str_replace([" ","/"],"-",$ar["name"]);
			$name=mysqli_real_escape_string($con,$name);
			$na=mysqli_real_escape_string($con,$ar["name"]);	
			$q1=mysqli_query($con,"SELECT id FROM products WHERE finaid='".$ar["id"]."'  ");		
			$code=str_replace([" ","/"],"-",$ar["code"]);
			if($q1){
				if(mysqli_num_rows($q1)<1){
					if($ar["code"]!=""){
						$slug=geotoeng($na)."_".$code;
						mysqli_query($con,"INSERT INTO products SET keysge='".$ar["comment"]."',VAT='".$ar["vat"]."',finaid='".$ar["id"]."',code='".$ar["code"]."',namege='".$na."',slug='".$slug."',active='1' ");
						// echo "INSERT INTO products SET keysge='".$ar["comment"]."',VAT='".$ar["vat"]."',finaid='".$ar["id"]."',code='".$ar["code"]."',namege='".$na."',slug='".$slug."' ";
						$pid=mysqli_insert_id($con);								
						mysqli_query($con,"INSERT INTO ptexts SET pid='".$pid."' ");	
						mysqli_query($con,"INSERT INTO langs SET table_name='products',table_column='title',column_value='".$na."',shortname='ka',table_id='".$pid."' ");
					}								
				}
				// else{
					// mysqli_query($con,"UPDATE products SET VAT='".$ar["vat"]."',code='".$ar["code"]."' WHERE finaid='".$ar["id"]."' AND mid='0'  ");
				// }					
			}
	
			// }
		}
	}
	curl_close ($ch);
	// file_put_contents("finacatalog.txt",date(time())." \r\n",FILE_APPEND);
	 mysqli_query($con,"UPDATE `products` SET active=0 WHERE categoryall=''");
	 mysqli_query($con,"UPDATE `products` SET active=1 WHERE categoryall<>''");
	//geo to eng converter
	function geotoeng($word){
		$alpha = array("ა"=>'a',"ბ"=>'b',"ც"=>'c',"დ"=>'d',"ე"=>'e',"ფ"=>'f',"გ"=>'g',"ჰ"=>'h',"ი"=>'i','j',"კ"=>'k',"ლ"=>'l',"მ"=>'m',"ნ"=>'n',"ო"=>'o',"პ"=>'p',"ქ"=>'q',"რ"=>'r',"ს"=>'s',"თ"=>'t',"უ"=>'u',"ვ"=>'v','w','x',"ყ"=>'y',"ზ"=>'z',"ჟ"=>"zh","ტ"=>"t","ხ"=>"kh","შ"=>"sh","ღ"=>"gh","ჯ"=>"j","ძ"=>"dz","წ"=>"ts","ჭ"=>"ch","ჩ"=>"ch","a"=>"a","b"=>"b","c"=>"c","d"=>"d","e"=>"e","f"=>"f","g"=>"g","h"=>"h","i"=>"i","j"=>"j","k"=>"k","l"=>"l","m"=>"m","n"=>"n","o"=>"o","p"=>"p","q"=>"q","r"=>"r","s"=>"s","t"=>"t","u"=>"u","v"=>"v","w"=>"w","x"=>"x","y"=>"y","z"=>"z","-"=>"-","0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","/"=>"-",'"'=>'');
		$word=str_replace(" ","-",$word);
		$word = preg_split('//u', $word);
		foreach($word as $key=>$value){
			if(array_key_exists($value,$alpha)){
				$newF[$key]=$alpha[$value];
			}else{
				$newF[$key]=$value;
			}
		}
		$newW=implode("",$newF);
		return $newW;	
	}	

?>
<div class="container">
<h1>განახლდა, დაელოდეთ კატეგორიების განახლებას</h1>
<h2>...</h2>
</div>
<script>setTimeout(function(){location.href="/admin/?page=finacharachteristics";},1000);</script>