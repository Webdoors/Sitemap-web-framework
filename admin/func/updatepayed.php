<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if($_SESSION['GuserID']!=""){
	$a=mysqli_real_escape_string($con,$_POST["a"]??"");
	$b=mysqli_real_escape_string($con,$_POST["b"]??"");
	mysqli_query($con,"UPDATE basket SET payed='".$b."' WHERE u_group='".$a."'");
	$T=time();
	mysqli_query($con,"UPDATE orders SET payed='".$b."' WHERE invoice='".$a."'");
	//echo "UPDATE pages SET ".$c."='".$a."' WHERE id='".$b."'";
	if($b=="1"){
		$q1=mysqli_query($con,"SELECT * FROM orders WHERE invoice='".$a."' LIMIT 1 ");
		$r1=mysqli_fetch_array($q1);
		if($r1["status"]!=4){
			mysqli_query($con,"UPDATE orders SET paydate='".$T."',payed='".$b."' WHERE invoice='".$a."'");			
		}
	// $q11=mysqli_query($con,"SELECT * FROM orderproducts WHERE orderid='".$r1["id"]."' ");


	// while($r11=mysqli_fetch_array($q11)){
		// $q2=mysqli_query($con,"SELECT inbatch FROM products WHERE id='".$r11["good_id")."'");
		// $r2=mysqli_fetch_array($q2);
		// mysqli_query($con,"UPDATE products SET volume=volume-".$r11["quantity"]*$r2["inbatch"]." WHERE id='".$r11["good_id"]."' ");
	// }

		$q2=mysqli_query($con,"SELECT * FROM id WHERE id='".$r1["uid"]."' LIMIT 1 ");
		$Zuser=mysqli_fetch_array($q2);	
		$tel6=$Zuser["mobile_phone"];
		$url = 'http://212.72.155.180:2375/api/sendmsg.php?username=9mVN8u993tPo06K&password=M5Bi17ObaN1ll_9XMnJl&utf=1&num=995'.$Zuser["mobile_phone"].'&msg='.urlencode("თქვენი შეკვეთა supta.ge-ზე გადახდილია. მადლობა თანამშრომლობისთვის");
		gosms($url);		
	}
	 echo $url;
}
function gosms($url){				
	file_get_contents($url);	
}
?>
