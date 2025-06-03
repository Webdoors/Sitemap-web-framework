<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// require_once("/home/admin/domains/iland.ge/public_html/db_open.php");

	// //echo "<br/ br/> <br/> <br/ br/> <br/> <br/ br/> <br/> <br/ br/> <br/>"; // SELECT * FROM tbcpay WHERE payid='".$pid."' <br/>";
	 // // var_dump($_REQUEST);
// $q1=mysqli_query($con,"SELECT t1.* FROM tbcpay AS t1 WHERE t1.paystatus!='Succeeded' AND t1.paystatus!='Failed' AND t1.paystatus!='Expired' AND t1.paystatus!='405' AND t1.payid IN (SELECT payid FROM orders WHERE payid=t1.payid AND status=1) ORDER BY t1.id DESC ");
// //echo "SELECT t1.* FROM tbcpay AS t1 WHERE t1.paystatus!='Succeeded' AND t1.paystatus!='Failed' AND t1.paystatus!='Expired' AND t1.payid IN (SELECT payid FROM orders WHERE payid=t1.payid AND status=1) ORDER BY t1.id DESC LIMIT 1"

	
	
	
	// while($r1=mysqli_fetch_array($q1))
// {
	 

	// $pid=$r1["payid"];
	// echo $pid ."---";
	// $curl = curl_init();


	// curl_setopt_array($curl, array(
	  // CURLOPT_URL => 'https://api.tbcbank.ge/v1/tpay/access-token',
	  // CURLOPT_RETURNTRANSFER => true,
	  // CURLOPT_ENCODING => '',
	  // CURLOPT_MAXREDIRS => 10,
	  // CURLOPT_TIMEOUT => 0,
	  // CURLOPT_FOLLOWLOCATION => true,
	  // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  // CURLOPT_CUSTOMREQUEST => 'POST',
	  // CURLOPT_POSTFIELDS => 'client_Id=7000534&client_secret=I69NVWdBWWq9bJGJ',
	  // CURLOPT_HTTPHEADER => array(
		// 'Content-Type: application/x-www-form-urlencoded',
		// 'apikey: ecYSFMK8ptvd4PtnHKEH0W1SVg4cn35J'
	  // ),
	// ));

	// $response1 = curl_exec($curl);
	 // $response1=json_decode($response1,true);
	// $token=$response1["access_token"];
	// //echo $token;
	// curl_close($curl);
	
	
	
	
    // // echo $pid .'---';
	// // echo 'https://api.tbcbank.ge/v1/tpay/payments/'.$pid ."---";
		// $curl = curl_init();
		
		// curl_setopt_array($curl, array(
		  // CURLOPT_URL => 'https://api.tbcbank.ge/v1/tpay/payments/'.$pid ."",
		  // CURLOPT_RETURNTRANSFER => true,
		  // CURLOPT_ENCODING => '',
		  // CURLOPT_MAXREDIRS => 10,
		  // CURLOPT_TIMEOUT => 0,
		  // CURLOPT_FOLLOWLOCATION => true,
		  // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  // CURLOPT_CUSTOMREQUEST => 'GET',
		  // CURLOPT_HTTPHEADER => array(
			// 'Content-Type: application/x-www-form-urlencoded',
			// 'apikey: ecYSFMK8ptvd4PtnHKEH0W1SVg4cn35J',
			// 'Authorization: Bearer '.$token
		  // ),
		// ));

		// $response3 = curl_exec($curl);

		 // // print_r($response3);
		// // curl_close($curl);
		 // //echo $response3 . '--'.$token;
		// $response3=json_decode($response3,1);
		// mysqli_query($con,"UPDATE tbcpay SET paystatus='".$response3["status"]."' WHERE payid='".$pid."'");
		 

	// if($r1['paystatus']=='WaitingConfirm')
	// {
// $q2=mysqli_query($con,"SELECT * FROM tbcpay WHERE payid='".$pid."' ");
// while($r2=mysqli_fetch_array($q2)){
     // echo 1;
	// $pid=$r2["payid"];
	// $curl = curl_init();
    	// echo $pid;
	// curl_setopt_array($curl, array(
	// CURLOPT_URL =>  'https://api.tbcbank.ge/v1/tpay/payments/'.$pid.'/completion',
	// CURLOPT_RETURNTRANSFER => true,
	// CURLOPT_ENCODING => '',
	// CURLOPT_MAXREDIRS => 10,
	// CURLOPT_TIMEOUT => 0,
	// CURLOPT_FOLLOWLOCATION => true,
	// CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// CURLOPT_CUSTOMREQUEST => 'POST',
	// CURLOPT_POSTFIELDS =>'{
	// "amount":"'.$r2["amount"].'"}',
	// CURLOPT_HTTPHEADER => array(
	// 'Content-Type: application/json',
	// 'apikey: ecYSFMK8ptvd4PtnHKEH0W1SVg4cn35J',
	// 'Authorization: Bearer '.$token
	// ),
	// ));

	// $response = curl_exec($curl);
	// $response=json_decode($response,1);
     
	// curl_close($curl);
	// //echo "<br/> <br/><br/><br/> <br/><br/>";
		// //print_r($response);
	// // echo "<br><br><br><br><br><br>".$pid."ika".$response;
	// if($response["status"]=="Succeeded"){
		
		
		// $status=2;
		// $T=time();
		// mysqli_query($con,"UPDATE tbcpay SET paystatus='".$response["status"]."' WHERE payid='".$pid."'");
		// mysqli_query($con,"UPDATE orders SET status='$status' ,  date='$T' WHERE payid='$pid'  ");
		// $ord=mysqli_query($con,"SELECT * FROM orders WHERE payid='$pid' ");
		// $rord=mysqli_fetch_assoc($ord);
		// $uid=$rord['uid'];
		// $user=mysqli_query($con,"SELECT * FROM users WHERE id='$uid' ");
		// $ruser=mysqli_fetch_array($user);
		  // $tel=$ruser['tel']; 
		  // $tex=urlencode("https://". $_SERVER['HTTP_HOST'] ."/i?invoice=". (date("YmdHi",$rord["date"]).$rord['uid']) ."&id=".$rord['id']); 
		 // // echo $tel;
		  // $url = 'http://bi.msg.ge/sendsms.php?username=iphone&password=yrUJ0sSf2l&client_id=784&utf=1&service_id=2410&to=+995'.$tel.'&text=თქვენი შეკვეთა მიღებულია '.$tex;
				// $url = 'http://bi.msg.ge/sendsms.php?username=iphone&password=yrUJ0sSf2l&client_id=784&utf=1&service_id=2410&to=+995'.$tel.'&text=თქვენი შეკვეთა მიღებულია '.$tex;
		   // $tel="599456789";
				// $url = 'http://bi.msg.ge/sendsms.php?username=iphone&password=yrUJ0sSf2l&client_id=784&utf=1&service_id=2410&to=+995'.$tel.'&text=თქვენი შეკვეთა მიღებულია '.$tex;
		   // $tel="577728482";
			// $url = 'http://bi.msg.ge/sendsms.php?username=iphone&password=yrUJ0sSf2l&client_id=784&utf=1&service_id=2410&to=+995'.$tel.'&text=თქვენი შეკვეთა მიღებულია '.$tex;
		  
		  // /* send sms */
		// $ch = curl_init();
		
		// // curl_setopt($ch, CURLOPT_POSTFIELDS, $json );
		// curl_setopt($ch, CURLOPT_POST, false );
		// curl_setopt($ch, CURLOPT_URL, $url );
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
		// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
		// $result = curl_exec($ch);
		// curl_close($ch);
		// // $res1=json_decode($result,true);
		   // var_dump($result);
		   
		   
		   
		   
		   
		  // /*send email*/ 
		   // $oid=$rord['id'];
			 // $to = $ruser["email"];
		// $from = "info@iland.ge";
		// $subject = "ახალი შეკვეთა Invoice: ".$oid;
		// $message = "<br><strong>სახელი გვარი:</strong> ".$ruser["firstname"] . " " . $ruser["lastname"];
		// $message = $message."<br><strong>Email:</strong> ".$ruser["email"];
		// $message = $message."<br><strong>ტელ:</strong> ".$ruser["tel"];
		// $message = $message."<br><br><br>იხილეთ  <a href='".urldecode($tex)."'> ინვოისი </a>" ;
		// $message = $message."<br><br><br>მადლობთ, რომ სარგებლობთ ჩვენი სერვისით";

		// $headers = "From: iland.ge <info@iland.ge> \r\n";
		// $headers .= "MIME-Version: 1.0\r\n";
		// $headers .= "CC: ishal10@freeuni.edu.ge , aka999aka@yahoo.com, ilandge@yahoo.com \r\n";
		// $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		// $ok = mail($to, $subject, $message, $headers, "-f " . $from);
		
		
	// }
// }	}
// }

// require_once("/home/admin/domains/iland.ge/public_html/db_close.php");
?>
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
  CURLOPT_POSTFIELDS => 'client_Id=7000117&client_secret=e381c9',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'apikey: RZDaTT2A2DzN2ZeCZXbTamFg2pZB1qLD'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
	$response=json_decode($response,1);
	// var_dump($response);
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
    "returnurl":"https://geparts.ge/ka/tbcpaycallback",
    "methods" : [5],
    "installmentProducts":
    [
       {"Name":"t1","Price":100,"Quantity":1},
       {"Name":"t1","Price":50,"Quantity":1},
       {"Name":"t1","Price":50,"Quantity":1}
    ],
    "callbackUrl":"https://geparts.ge/ka/tbcpaycallback", 
    "preAuth":false,
    "language":"KA",
    "merchantPaymentId": "P1231233"
}
',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'apikey: RZDaTT2A2DzN2ZeCZXbTamFg2pZB1qLD',
    'Authorization: Bearer '.$token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
var_dump($response);
$r=json_decode($response,1);
var_dump($r["links"][1]["uri"]);
