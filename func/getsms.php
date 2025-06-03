<?php
$tel=mysqli_real_escape_string($con,$_POST["a"]);
$rand=rand(1111,9999);
$T=time();
		// $url = 'http://bi.msg.ge/sendsms.php?username=proteller&password=8yfiygw37tr&client_id=594&service_id=2087&to=+'.$telcode.$tel.'&utf=1&text='.$code;
		// $url = 'http://bi.msg.ge/sendsms.php?username=chvenebi&password=pqmx62lawGw77&client_id=640&service_id=2162&to=+995599339099&text=aqacarekams';
		$url = 'http://bi.msg.ge/sendsms.php?username=iphone&password=yrUJ0sSf2l&client_id=784&service_id=2410&to=+995'.$tel.'&text='.$rand;
mysqli_query($con,"INSERT INTO sms SET tel='".$tel."',date='".$T."',code='".$rand."' "); 
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