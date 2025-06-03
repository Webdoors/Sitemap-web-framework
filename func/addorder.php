<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$lang=$_COOKIE["lang"];

if(isset($_SESSION["uid"])){
	
	include("functions.php");
	$uid=$_SESSION["uid"];
	$T=time();
	$qu=mysqli_query($con,"SELECT * FROM users WHERE id='".$uid."'");
	$ru=mysqli_fetch_array($qu);
	$country=mysqli_real_escape_string($con,$_POST["country"]??"");
	$city=mysqli_real_escape_string($con,$_POST["city"]??"");
	$shippingaddress1=mysqli_real_escape_string($con,$_POST["shippingaddress1"]??"");
	$shippingaddress2=mysqli_real_escape_string($con,$_POST["shippingaddress2"]??"");
	$zip=mysqli_real_escape_string($con,$_POST["zip"]??"");
	$method=mysqli_real_escape_string($con,$_POST["method"]??"");
	$payid=mysqli_real_escape_string($con,$_POST["paymentid"]??"");


	$cart=$_COOKIE["cart"];
	$cart=json_decode($cart,true);
	$list=implode(",", array_keys($cart));
	mysqli_query($con,"INSERT INTO orders SET method='".$method."',city='".$city."',
	shippingaddress='".$shippingaddress1." ".$shippingaddress2." ".$zip."',date='".$T."',uid='".$uid."',datajson='".json_encode($cart)."'");
	$oid=mysqli_insert_id($con);
	$trao=0;
	$tsum=0;

	foreach($cart as $item){
		$q1=mysqli_query($con,"SELECT t1.*, (SELECT img FROM productimgs WHERE id=1 AND main=1 ) AS mainimg
		 FROM products AS t1
		LEFT JOIN categories as t2 ON(t1.category=t2.id)
		LEFT JOIN categories as t3 ON(t2.id=t3.pid)
		 WHERE t1.id ='".$item["pid"]."'");
		 $r1=mysqli_fetch_array($q1);
		$price=floatval($item["price"])??0;
	
		$trao=$trao+$item["quantity"];
		$tsum=$tsum+$price;

	}
$status=0;
//non status methods
$nonstatus=[];
if(!in_array($method,$nonstatus)){
	$status="1";
}
	mysqli_query($con,"UPDATE orders SET  date='".$T."',total='".$tsum."',status='".$status."' WHERE id='".$oid."' ");
// echo $method;
//	echo $oid.",".$ru["firstname"]." ".$ru["lastname"].",".($ru["companyid"]!=""?$ru["companyid"]:$ru["personalid"]);
if(!in_array($method,$nonstatus)){
	if($payid=='')
	{
	$user=mysqli_query($con,"SELECT * FROM users WHERE id='$uid' ");
		
		 if(mysqli_num_rows($user)>0){
			$ord=mysqli_query($con,"SELECT * FROM orders WHERE id='$oid' ");
			$rord=mysqli_fetch_assoc($ord);
			$ruser=mysqli_fetch_array($user);
			  $tel=$ruser['tel']; 
			  $tex=urlencode("https://". $_SERVER['HTTP_HOST'] ."/i/".encrypt_decrypt("encrypt",json_encode([$rord['id'],time()]))); 
			  // echo $tel;
					$url = 'http://bi.msg.ge/sendsms.php?username=iphone&password=yrUJ0sSf2l&client_id=784&utf=1&service_id=2410&to=+995'.$tel.'&text=თქვენი შეკვეთა მიღებულია '.$tex;

			
			/* send sms */
			$ch = curl_init();
			
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $json );
			curl_setopt($ch, CURLOPT_POST, false );
			curl_setopt($ch, CURLOPT_URL, $url );
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
			$result = curl_exec($ch);
			curl_close($ch);
			// $res1=json_decode($result,true);
			   // var_dump($result);
			   
			   
			   
			   
			   
			  /*send email*/ 
			   
				 $to = $ruser["email"];
			$from = "info@wize.rentals";
			$subject = "ახალი შეკვეთა Invoice: ".$oid;
			$message = "<br><strong>სახელი გვარი:</strong> ".$ruser["firstname"] . " " . $ruser["lastname"];
			$message = $message."<br><strong>Email:</strong> ".$ruser["email"];
			$message = $message."<br><strong>ტელ:</strong> ".$ruser["tel"];
			$message = $message.'<br><br><br>იხილეთ  <a href="https://'. $_SERVER['HTTP_HOST'] .'/i/'.encrypt_decrypt("encrypt",json_encode([$rord['id'],time()])).'"> ინვოისი </a>' ;
			$message = $message."<br><br><br>მადლობთ, რომ სარგებლობთ ჩვენი სერვისით<br>wize.rentals";

			$headers = "From: Wize.Rentals <info@wize.rentals> \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "CC: ishal10@freeuni.edu.ge,david.nishnianidze@gmail.com \r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			$ok = mail($to, $subject, $message, $headers, "-f " . $from);
			
			   
			   
			   
			  
		// echo $tex; ;
		  }
	}
}else{
	$user=mysqli_query($con,"SELECT * FROM users WHERE id='$uid' ");
		
		 if(mysqli_num_rows($user)>0){
			$ord=mysqli_query($con,"SELECT * FROM orders WHERE id='$oid' ");
			$rord=mysqli_fetch_assoc($ord);
			$ruser=mysqli_fetch_array($user);
			
			$tex='თქვენი შეკვეთა მიღებულია '.urlencode("https://". $_SERVER['HTTP_HOST'] ."/i/".encrypt_decrypt("encrypt",json_encode([$rord['id'],time()]))); 
			sendsms($ruser['tel'],$tex);
			$tex='ახალი შეკვეთა '.urlencode("https://". $_SERVER['HTTP_HOST'] ."/i/".encrypt_decrypt("encrypt",json_encode([$rord['id'],time()]))); 
			sendsms("599456789",$tex);	
			$tex='ახალი შეკვეთა '.urlencode("https://". $_SERVER['HTTP_HOST'] ."/i/".encrypt_decrypt("encrypt",json_encode([$rord['id'],time()]))); 
			sendsms("577728484",$tex);	   
			   
			   
			  /*send email*/ 
			   
				 $to = $ruser["email"];
			$from = "info@wize.rentals";
			$subject = "ახალი შეკვეთა Invoice: ".$oid;
			$message = "<br><strong>სახელი გვარი:</strong> ".$ruser["firstname"] . " " . $ruser["lastname"];
			$message = $message."<br><strong>Email:</strong> ".$ruser["email"];
			$message = $message."<br><strong>ტელ:</strong> ".$ruser["tel"];
			$message = $message.'<br><br><br>იხილეთ  <a href="https://'. $_SERVER['HTTP_HOST'] .'/i/'.encrypt_decrypt("encrypt",json_encode([$rord['id'],time()])).'"> ინვოისი </a>' ;
			$message = $message."<br><br><br>მადლობთ, რომ სარგებლობთ ჩვენი სერვისით";

			$headers = "From: Wize.Rentals <info@wize.rentals> \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "CC: ishal10@freeuni.edu.ge,david.nishnianidze@gmail.com \r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			$ok = mail($to, $subject, $message, $headers, "-f " . $from);	
}
}

	echo 1;

}
function sendsms($tel,$text){
			$url = 'http://bi.msg.ge/sendsms.php?username=iphone&password=yrUJ0sSf2l&client_id=784&utf=1&service_id=2410&to=+995'.$tel.'&text='.$text;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_POST, false );
			curl_setopt($ch, CURLOPT_URL, $url );
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
			// $result = curl_exec($ch);
			// curl_close($ch);		
}