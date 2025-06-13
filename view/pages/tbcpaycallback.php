<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
 $pid=$_REQUEST["PaymentId"];
$uid=$_SESSION["uid"];

	//echo "<br/ br/> <br/> <br/ br/> <br/> <br/ br/> <br/> <br/ br/> <br/>"; // SELECT * FROM tbcpay WHERE payid='".$pid."' <br/>";
	 // var_dump($_REQUEST);
$q1=mysqli_query($con,"SELECT t1.* FROM tbcpay AS t1 WHERE  t1.payid IN (SELECT payid FROM orders WHERE payid=t1.payid AND status=1 AND uid='$uid') ORDER BY t1.id DESC LIMIT 1 ");


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
	  CURLOPT_POSTFIELDS => 'client_Id=*******&client_secret=*******',
	  CURLOPT_HTTPHEADER => array(
		'Content-Type: application/x-www-form-urlencoded',
		'apikey: *******'
	  ),
	));

	$response1 = curl_exec($curl);
	 $response1=json_decode($response1,true);
	$token=$response1["access_token"];
	//echo $token;
	curl_close($curl);
	
	
	while($r1=mysqli_fetch_array($q1))
{

	$pid=$r1["payid"];
    // echo $pid .'---';
	// echo 'https://api.tbcbank.ge/v1/tpay/payments/'.$pid ."---";
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.tbcbank.ge/v1/tpay/payments/'.$pid ."",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Content-Type: application/x-www-form-urlencoded',
			'apikey: *******',
			'Authorization: Bearer '.$token
		  ),
		));

		$response3 = curl_exec($curl);

		 // print_r($response3);
		// curl_close($curl);
		 //echo $response3 . '--'.$token;
		$response3=json_decode($response3,1);
		mysqli_query($con,"UPDATE tbcpay SET paystatus='".$response3["status"]."' WHERE payid='".$pid."'");
		 

}

$q2=mysqli_query($con,"SELECT * FROM tbcpay WHERE payid='".$pid."'  AND paystatus='WaitingConfirm'");
while($r2=mysqli_fetch_array($q2)){
	
	$pid=$r2["payid"];
	$curl = curl_init();
    
	curl_setopt_array($curl, array(
	CURLOPT_URL =>  'https://api.tbcbank.ge/v1/tpay/payments/'.$pid.'/completion',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS =>'{
	"amount":"'.$r2["amount"].'"}',
	CURLOPT_HTTPHEADER => array(
	'Content-Type: application/json',
	'apikey: *******',
	'Authorization: Bearer '.$token
	),
	));

	$response = curl_exec($curl);
	$response=json_decode($response,1);
     
	curl_close($curl);
	//echo "<br/> <br/><br/><br/> <br/><br/>";
		//print_r($response);
	// echo "<br><br><br><br><br><br>".$pid."ika".$response;
	if($response["status"]=="Succeeded"){
		
			// echo $pid;
		$status=2;
		$T=time();
		mysqli_query($con,"UPDATE tbcpay SET paystatus='".$response["status"]."' WHERE payid='".$pid."'");
		mysqli_query($con,"UPDATE orders SET status='$status' ,  date='$T' WHERE payid='$pid'  ");
		$ord=mysqli_query($con,"SELECT * FROM orders WHERE payid='$pid' ");
		$rord=mysqli_fetch_assoc($ord);
		$user=mysqli_query($con,"SELECT * FROM users WHERE id='$uid' ");
		$ruser=mysqli_fetch_array($user);
		  $tel=$ruser['tel']; 
		  $tex=urlencode("https://". $_SERVER['HTTP_HOST'] ."/i?invoice=". (date("YmdHi",$rord["date"]).$rord['uid']) ."&id=".$rord['id']); 
		 // echo $tel;
		  $url = 'http://bi.msg.ge/sendsms.php?username=iphone&password=*******&client_id=784&utf=1&service_id=2410&to=+995'.$tel.'&text=თქვენი შეკვეთა მიღებულია '.$tex;
				$url = 'http://bi.msg.ge/sendsms.php?username=iphone&password=*******&client_id=784&utf=1&service_id=2410&to=+995'.$tel.'&text=თქვენი შეკვეთა მიღებულია '.$tex;
		   $tel="599456789";
				$url = 'http://bi.msg.ge/sendsms.php?username=iphone&password=*******&client_id=784&utf=1&service_id=2410&to=+995'.$tel.'&text=თქვენი შეკვეთა მიღებულია '.$tex;
		   $tel="577728482";
			$url = 'http://bi.msg.ge/sendsms.php?username=iphone&password=*******&client_id=784&utf=1&service_id=2410&to=+995'.$tel.'&text=თქვენი შეკვეთა მიღებულია '.$tex;
		  
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
		   var_dump($result);
		   
		   
		   
		   
		   
		  /*send email*/ 
		   $oid=$rord['id'];
			 $to = $ruser["email"];
		$from = "info@iland.ge";
		$subject = "ახალი შეკვეთა Invoice: ".$oid;
		$message = "<br><strong>სახელი გვარი:</strong> ".$ruser["firstname"] . " " . $ruser["lastname"];
		$message = $message."<br><strong>Email:</strong> ".$ruser["email"];
		$message = $message."<br><strong>ტელ:</strong> ".$ruser["tel"];
		$message = $message."<br><br><br>იხილეთ  <a href='".urldecode($tex)."'> ინვოისი </a>" ;
		$message = $message."<br><br><br>მადლობთ, რომ სარგებლობთ ჩვენი სერვისით";

		$headers = "From: iland.ge <info@iland.ge> \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "CC: ishal10@freeuni.edu.ge , aka999aka@yahoo.com, ilandge@yahoo.com \r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		$ok = mail($to, $subject, $message, $headers, "-f " . $from);
		
		
		
	}	
}
?>
<div class="container mt-5 pt-5">
<h1 class="my-5 text-center">თქვენი შეკვეთა მიღებულია</h1>
</div>
<script>setTimeout(function(){location.href=$("body").attr("lang")+"/profile";},3000);</script>