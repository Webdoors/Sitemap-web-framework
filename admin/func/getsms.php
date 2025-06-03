<?php
$tel=mysqli_real_escape_string($con,$_POST["a"]);
$rand=rand(1111,9999);
$T=time();
echo $_SERVER['REMOTE_ADDR'];
if(!isset($_POST['c']))
{
		// $url = 'http://bi.msg.ge/sendsms.php?username=proteller&password=8yfiygw37tr&client_id=594&service_id=2087&to=+'.$telcode.$tel.'&utf=1&text='.$code;
		// $url = 'http://bi.msg.ge/sendsms.php?username=chvenebi&password=pqmx62lawGw77&client_id=640&service_id=2162&to=+995599339099&text=aqacarekams';
		$url = 'http://212.72.155.180:2375/api/sendmsg.php?username=9mVN8u993tPo06K&password=M5Bi17ObaN1ll_9XMnJl&utf=1&num=995'.$tel.'&msg='.$rand;
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
}
else
{
	include("functions.php");
	$user=mysqli_real_escape_string($con,$_POST['a']);
	$pass=mysqli_real_escape_string($con,$_POST['b']);
		$pass=encrypt_decrypt("encrypt",$pass);
	$q1=mysqli_query($con,"SELECT * FROM admins WHERE user='$user' AND pass='$pass'");

	
	$r1=mysqli_fetch_array($q1);
      if(mysqli_num_rows($q1)>0){
		  $tel=$r1['tel'];
		 
		  echo $tel;
		  		$url = 'http://212.72.155.180:2375/api/sendmsg.php?username=9mVN8u993tPo06K&password=M5Bi17ObaN1ll_9XMnJl&utf=1&num=995'.$tel.'&msg='.$rand;
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
		  
	
	  }
}	
		   
		 ?>  