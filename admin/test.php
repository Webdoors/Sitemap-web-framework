<?php
ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
	$con = mysqli_connect("localhost","suptaxnn_db","3YF3Ezg6","suptaxnn_newsupta");
// date_default_timezone_set("Asia/Tbilisi");
mysqli_set_charset($con,"utf8");
	file_put_contents("log.txt",date("d.m.Y H:i")."  \r\n ",FILE_APPEND);
	// $a=mysqli_real_escape_string($con,$_POST["a"]);
	$q2=mysqli_query($con,"SELECT * FROM ipay WHERE  status=0 AND checked=0 AND order_id<>'' AND id='3940'");
	while($r2=mysqli_fetch_array($q2)){

	$a=$r2["date"];
	$order_id=$r2["order_id"];
	$_user_id=$r2["uid"];
	$uid=$r2["uid"];
	$method=2;
	if($r2['status']==9)
	{
		$method=7;
	}
			
/*			$curl = curl_init();
		curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://ipay.ge/opay/api/v1/oauth2/token",
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
				"Authorization: Basic ".base64_encode("2541:451342484ecca4b702c4a0894c70873c"),
			  ),
			));
			// echo base64_encode("2541:451342484ecca4b702c4a0894c70873c");
			$response = curl_exec($curl);

			curl_close($curl);
			 // echo $response;

			$jwt=json_decode($response,true);
			$jwt=$jwt["access_token"];

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://ipay.ge/opay/api/v1/checkout/payment/".$order_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_POST=>0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json",
				"Authorization: Bearer ".$jwt
			  ),
			));

			 $response = curl_exec($curl);
// echo $response;
			curl_close($curl);

			$response=json_decode($response,true);*/
			
			
	$client_id = '2541';
$client_secret = '451342484ecca4b702c4a0894c70873c';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, 'https://oauth2.bog.ge/auth/realms/bog/protocol/openid-connect/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

// Basic Authentication
curl_setopt($ch, CURLOPT_USERPWD, $client_id . ':' . $client_secret);

// Headers
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Data
$data = array('grant_type' => 'client_credentials');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

// Execute cURL session and get the response
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Print the response
$token=json_decode($response,1)["access_token"];
// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, 'https://api.bog.ge/payments/v1/receipt/' . $order_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_USERPWD, $client_id . ':' . $client_secret);
// Headers
$headers = array();
$headers[] = 'Accept-Language: ka';
$headers[] = 'Authorization: Bearer ' . $token;
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute cURL session and get the response
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Print the response
  // echo $response;
$response=json_decode($response,1);
$status=$response["order_status"]["key"];
	
			
			
			
			if($status=="completed"){
				$q5 = mysqli_query($con," SELECT * FROM id WHERE id=\"".$_user_id."\"  ");
				$Zuser = mysqli_fetch_array($q5);	


				file_get_contents("https://supta.ge/fbpurchase.php?amount=".$r2["amount"]);
				mysqli_query($con,"UPDATE basket SET status='3',payed='1',method='".$method."' WHERE u_group='".$a."'");
				mysqli_query($con,"UPDATE ipay SET invoice='".$a."',status='3',checked='1' WHERE date='".$a."' AND uid='".$_user_id."'");

				mysqli_query($con,"INSERT INTO orders SET status='3',payed='1',amount='".$r2["amount"]."',method='".$method."',invoice='".$a."',date='".$a."', promocode='".$r1['promocode']."',  
				promoprice='".$r1['promoprice']."', usepromo='".$r1['usepromo']."', uid='".$_user_id."',shippingaddress='".mysqli_real_escape_string($con,$r2["shippingaddress"])."',paydate='".time()."' ");
				$oid=mysqli_insert_id($con);				
                	$prm=mysqli_query($con," SELECT * FROM promocodes WHERE name='".$r1['promocode']."' AND active=1 AND usnambers=0 AND disabled=0 ");
                  if(mysqli_num_rows($prm)>0)
				  {	
                    $rprm=mysqli_fetch_assoc($prm);			  
				
				$usnambers=1;
				mysqli_query($con,"UPDATE  promocodes SET usnambers='$usnambers'  
				WHERE name='".$r1['promocode']."' ");
				mysqli_query($con,"INSERT INTO  usepromo SET  date='".time()."', uid='$_user_id', 
				pid='".$rprm['id']."' ");
				  echo 1;
				  }
				else
				{
					echo 2;
				}
				$pros=json_decode($r2["items"],1);
				// var_dump($pros);
				foreach($pros as $pro){
					$q1=mysqli_query($con,"SELECT inbatch FROM products WHERE id='".$pro["product_id"]."'");
					$r1=mysqli_fetch_array($q1);
					mysqli_query($con,"INSERT INTO orderproducts SET comment='".$pro["comment"]."',orderid='".$oid."',u_group='".$r2["date"]."',good_id='".$pro["product_id"]."',price='".$pro["unit_price"]."',quantity='".$pro["quantity"]."',uid='".$uid."'");
					
				}


				$olink="https://supta.ge/i/".$oid;
				
				$tel="599582255";
				// $tel2="595852454";
				$tel3="599471116";	
				$tel3="599471116";	
							$tel7="591022296";
				$tel4=$Zuser["mobile_phone"];	
				$url = 'http://bi.msg.ge/sendsms.php?username=suftage&password=VhR6EajtfynGB&client_id=631&service_id=2146&utf=1&to=+995'.$tel.'&text='.urlencode("გადახდა Ipay: ".date("d.m.Y H:i",$a)." თანხა ".$r2["amount"]." ID: ".($Zuser["company_id"]?$Zuser["company_id"]:$Zuser["personal_id"])." ".($Zuser["company_name"]?$Zuser["company_name"]:$Zuser["name"]." ".$Zuser["lastname"])." ".$olink);		
				gosms($url);
				// $url = 'http://bi.msg.ge/sendsms.php?username=suftage&password=VhR6EajtfynGB&client_id=631&service_id=2146&utf=1&to=+995'.$tel2.'&text='.urlencode("გადახდა Ipay: ".date("d.m.Y H:i",$a)." თანხა ".$r2["amount"]." ID: ".($Zuser["company_id"]?$Zuser["company_id"]:$Zuser["personal_id"])." ".($Zuser["company_name"]?$Zuser["company_name"]:$Zuser["name"]." ".$Zuser["lastname"])." ".$olink);		
				// gosms($url);
				$url = 'http://bi.msg.ge/sendsms.php?username=suftage&password=VhR6EajtfynGB&client_id=631&service_id=2146&utf=1&to=+995'.$tel3.'&text='.urlencode("გადახდა Ipay: ".date("d.m.Y H:i",$a)." თანხა ".$r2["amount"]." ID: ".($Zuser["company_id"]?$Zuser["company_id"]:$Zuser["personal_id"])." ".($Zuser["company_name"]?$Zuser["company_name"]:$Zuser["name"]." ".$Zuser["lastname"])." ".$olink);		
				gosms($url);
				$url = 'http://bi.msg.ge/sendsms.php?username=suftage&password=VhR6EajtfynGB&client_id=631&service_id=2146&utf=1&to=+995'.$tel4.'&text='.urlencode("გადახდა Ipay: ".date("d.m.Y H:i",$a)." თანხა ".$r2["amount"]." ID: ".($Zuser["company_id"]?$Zuser["company_id"]:$Zuser["personal_id"])." ".($Zuser["company_name"]?$Zuser["company_name"]:$Zuser["name"]." ".$Zuser["lastname"])." ".$olink);		
				gosms($url);
				$url = 'http://bi.msg.ge/sendsms.php?username=suftage&password=VhR6EajtfynGB&client_id=631&service_id=2146&utf=1&to=+995'.$tel7.'&text='.urlencode("გადახდა Ipay: ".date("d.m.Y H:i",$a)." თანხა ".$r2["amount"]." ID: ".($Zuser["company_id"]?$Zuser["company_id"]:$Zuser["personal_id"])." ".($Zuser["company_name"]?$Zuser["company_name"]:$Zuser["name"]." ".$Zuser["lastname"])." ".$olink);		
				gosms($url);

$text="გადახდა Ipay: ".date("d.m.Y H:i",$a)." თანხა ".$r2["amount"]." ID: ".($Zuser["company_id"]?$Zuser["company_id"]:$Zuser["personal_id"])." ".($Zuser["company_name"]?$Zuser["company_name"]:$Zuser["name"]." ".$Zuser["lastname"])."<br>ინვოისი N".$a."<br>გადმოსაწერად გადადით ბმულზე - <a href='https://supta.ge/func/invoice.php?id=".$oid."'>Download</a>";	
$to = "aidgroup2016@gmail.com";
$from = "platform@supta.ge";
$subject = "IPAY გადახდა";
$message = "<br> ".$text;
$headers = "From: Supta.ge <platform@supta.ge> \r\n"; 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "CC: ishal10@freeuni.edu.ge\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$ok = mail($to, $subject, $message, $headers, "-f " . $from);			
					
			}elseif($response["status"]=="error"){
				mysqli_query($con,"UPDATE ipay SET checked='1' WHERE date='".$a."' AND uid='".$r2["uid"]."'");		
			}elseif($response["status"]=="null"){
				mysqli_query($con,"UPDATE ipay SET checked='1' WHERE date='".$a."' AND uid='".$r2["uid"]."'");		
			}else{
				
			}
		
	}
	function gosms($url){			
		$ch = curl_init();

		// curl_setopt($ch, CURLOPT_POSTFIELDS, $json );
		curl_setopt($ch, CURLOPT_POST, false );
		curl_setopt($ch, CURLOPT_URL, $url );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json', 
			'Content-Length: ' . strlen($json))
		);
		$result = curl_exec($ch);
		curl_close($ch);			
	}
	mysqli_close($con);

?>