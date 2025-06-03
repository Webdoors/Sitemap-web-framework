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

	// echo "<pre>";	
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}else{
		 $arr=json_decode($result, true);
		 // var_dump($arr);
		 $arr=$arr["products"];
		 $cates=[];
		foreach($arr as $ar){
			// if($ar["id"]=="3584"){
				$cats=[];
				$catids=[];
				foreach($ar["add_fields"] as $fi){
					if($fi["value"]!=""){	
						// if($fi["field"]=="usr_column_504"){
							// $q1=mysqli_query($con,"SELECT id FROM brands WHERE nameen='".$fi["value"]."' ");
							// $r1=mysqli_fetch_array($q1);
							// if(mysqli_num_rows($q1)<1){
								// if($fi["value"]!=""){
									// mysqli_query($con,"INSERT INTO brands SET nameen='".$fi["value"]."',namege='".$fi["value"]."',nameru='".$fi["value"]."' ");
									// $brandid=mysqli_insert_id($con);														
									// mysqli_query($con,"UPDATE products SET brand='".$brandid."' WHERE finaid='".$ar["id"]."'  ");							
								// }
							// }else{
								// $brandid=$r1["id"];							
								// mysqli_query($con,"UPDATE products SET brand='".$brandid."' WHERE finaid='".$ar["id"]."'  ");
							// }							
						// }
						if($fi["field"]=="usr_column_503"){
							$cat=$fi["value"];
							$catslug=$fi["value"]!=""?geotoeng($fi["value"]):$fi["value"];
							$q1=mysqli_query($con,"SELECT id FROM categories WHERE name='".$cat."'  ");
							$r1=mysqli_fetch_array($q1);
							if(mysqli_num_rows($q1)<1){
								if($fi["value"]!=""){
									mysqli_query($con,"INSERT INTO categories SET name='".$cat."',active='1',slug='".$catslug."',pid='0',type='1' ");
									$catid=mysqli_insert_id($con);						
									mysqli_query($con,"INSERT INTO langs SET table_name='categories',table_column='name',column_value='".$fi["value"]."',shortname='ka',table_id='".$catid."' ");									
								}
							}else{
								$catid=$r1["id"];						
							}	
							$cats[]=$cat;		
							$catids[]=$catid;	
							$cates[]=$catid;						
							$cas=implode(",",$cats);
							$casi=implode(",",$catids);
							mysqli_query($con,"UPDATE products SET catids='".$casi."',categoryall='".$cas."',category='".$catid."' WHERE finaid='".$ar["id"]."'  ");
						}
						if($fi["field"]=="usr_column_505"){
							$cat=$fi["value"];
							$catslug=$fi["value"]!=""?geotoeng($fi["value"]):$fi["value"];
							$q1=mysqli_query($con,"SELECT id FROM categories WHERE name='".$cat."' AND pid='".$catid."'  ");
							$r1=mysqli_fetch_array($q1);
							if(mysqli_num_rows($q1)<1){
								if($fi["value"]!=""){
									mysqli_query($con,"INSERT INTO categories SET name='".$cat."',active='1',slug='".$catslug."',pid='".$catid."',type='1' ");
									$catid=mysqli_insert_id($con);						
									mysqli_query($con,"INSERT INTO langs SET table_name='categories',table_column='name',column_value='".$fi["value"]."',shortname='ka',table_id='".$catid."' ");									
								}
							}else{
								$catid=$r1["id"];						
							}	
							$cats[]=$cat;		
							$catids[]=$catid;	
							$cates[]=$catid;		
							$cas=implode(",",$cats);
							$casi=implode(",",$catids);
							mysqli_query($con,"UPDATE products SET catids='".$casi."',categoryall='".$cas."',category='".$catid."' WHERE finaid='".$ar["id"]."'  ");						
						}
						if($fi["field"]=="usr_column_506"){
							$cat=$fi["value"];
							$catslug=$fi["value"]!=""?geotoeng($fi["value"]):$fi["value"];
							$q1=mysqli_query($con,"SELECT id FROM categories WHERE name='".$cat."' AND pid='".$catid."'  ");
							$r1=mysqli_fetch_array($q1);
							if(mysqli_num_rows($q1)<1){
								if($fi["value"]!=""){
									mysqli_query($con,"INSERT INTO categories SET name='".$cat."',active='1',slug='".$catslug."',pid='".$catid."',type='1' ");
									$catid=mysqli_insert_id($con);					
									mysqli_query($con,"INSERT INTO langs SET table_name='categories',table_column='name',column_value='".$fi["value"]."',shortname='ka',table_id='".$catid."' ");
								}
							}else{
								$catid=$r1["id"];						
							}	
							$cats[]=$cat;		
							$catids[]=$catid;	
							$cates[]=$catid;		
							$cas=implode(",",$cats);
							$casi=implode(",",$catids);
							mysqli_query($con,"UPDATE products SET catids='".$casi."',categoryall='".$cas."',category='".$catid."' WHERE finaid='".$ar["id"]."'  ");						
						}
						if($fi["field"]=="usr_column_507"){
							$cat=$fi["value"];
							$catslug=$fi["value"]!=""?geotoeng($fi["value"]):$fi["value"];
							$q1=mysqli_query($con,"SELECT id FROM categories WHERE name='".$cat."' AND pid='".$catid."'  ");
							$r1=mysqli_fetch_array($q1);
							if(mysqli_num_rows($q1)<1){
								if($fi["value"]!=""){
									mysqli_query($con,"INSERT INTO categories SET name='".$cat."',active='1',slug='".$catslug."',pid='".$catid."',type='1' ");
									$catid=mysqli_insert_id($con);					
									mysqli_query($con,"INSERT INTO langs SET table_name='categories',table_column='name',column_value='".$fi["value"]."',shortname='ka',table_id='".$catid."' ");						
								}
							}else{
								$catid=$r1["id"];						
							}
							$cats[]=$cat;		
							$catids[]=$catid;	
							$cates[]=$catid;			
							$cas=implode(",",$cats);
							$casi=implode(",",$catids);
							mysqli_query($con,"UPDATE products SET catids='".$casi."',categoryall='".$cas."',category='".$catid."' WHERE finaid='".$ar["id"]."'  ");
									
						}						
					 }else{
						 // mysqli_query($con,"UPDATE products SET active='0' WHERE finaid='".$ar["id"]."'  ");	
					 }					
				}				
		// }
		}
	}
	// var_dump($cates);
// mysqli_query($con,"UPDATE categories SET active='1' WHERE type='1' AND id>0  ");
	 mysqli_query($con,"UPDATE `products` SET active=0 WHERE categoryall=''");
	 mysqli_query($con,"UPDATE `products` SET active=1 WHERE categoryall<>''");
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
<h1>კატეგორიები განახლდა, გთხოვთ დაელოდოთ ბრენდების განახლებას</h1>
<h2>...</h2>
</div>
<script>setTimeout(function(){location.href="/admin/?page=finabrands";},1000);</script>