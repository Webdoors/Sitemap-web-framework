<?php
if($_SESSION['GuserID']!=""){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	mysqli_query($con,"UPDATE basket SET status='".$b."' WHERE u_group='".$a."'");
	mysqli_query($con,"UPDATE orders SET status='".$b."' WHERE invoice='".$a."'");
	if($b=="6"){
		$q1=mysqli_query($con,"SELECT * FROM orders WHERE invoice='".$a."'");
		// var_dump($q1);
		$r1=mysqli_fetch_array($q1);

		$q2=mysqli_query($con,"SELECT * FROM id WHERE id='".$r1["uid"]."'");
		$r2=mysqli_fetch_array($q2);
		$invoice=$a;
		$to = $r2["email"].",aidgroup2016@gmail.com";
		$from = "noreplay@supta.ge";
		$subject = "შეკვეთის გაუქმება, Invoice: ".$invoice;
		$message = '<br>იხილეთ ინვოისი: <a href="http://www.supta.ge/cp/external.php?cat=EXPORTorders&id='.$invoice.'">გადმოწერა</a>';
		$message = "<br><strong>სახელი გვარი:</strong> ".$r2["name"]." ".$r2["lastname"];
		$message = $message."<br><strong>Email:</strong> ".$r2["email"];
		$message = $message."<br><strong>ტელ:</strong> ".$r2["mobile_phone"];

		$headers = "From: Supta.ge <noreplay@supta.ge> \r\n"; 
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "CC: ishal10@freeuni.edu.ge\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		$ok = mail($to, $subject, $message, $headers, "-f " . $from);
		
		$url = 'http://212.72.155.180:2375/api/sendmsg.php?username=9mVN8u993tPo06K&password=M5Bi17ObaN1ll_9XMnJl&utf=1&num=995'.$r2["mobile_phone"].'&msg=თქვენი შეკვეთა supta.ge-ზე გაუქმებულია. მადლობა თანამშრომლობისთვის';
        $response = file_get_contents($url);
	}
	if($b=="4"){
		$q1=mysqli_query($con,"SELECT t2.*,(SELECT t3.name FROM id as t3 WHERE t2.uid=t3.id) as 'name',(SELECT t3.lastname FROM id as t3 WHERE t2.uid=t3.id) as 'lastname' FROM orderproducts as t2 WHERE t2.u_group='".$a."'");
		while($v=mysqli_fetch_array($q1)){
		$q2=mysqli_query($con,"SELECT volume,inbatch FROM products WHERE id='".$v["good_id"]."'");
		$r2=mysqli_fetch_array($q2);
			// // $date_u=$v["u_group"];
			 mysqli_query($con," UPDATE products SET volume = volume-".($v['quantity']*$r2['inbatch'])." WHERE id=\"".$v['good_id']."\" ");
			// echo " UPDATE goods SET volume = volume-".($v['quantity']*$r2['inbatch'])." WHERE id=\"".$v['good_id']."\" ";
			$q3= mysqli_query($con,"SELECT * FROM products WHERE  id=\"".$v['good_id']."\" ");
			$r3=mysqli_fetch_array($q3);
			if($r3["volume"]<1){
				mysqli_query($con,"insert into notifications SET text='პროდუქტის რაოდენობა განულდა Item: <a href=".'"'."https://supta.ge/admin/?page=product&id=".$v['good_id'].'"'.">".$v['good_id']."</a> User: <a href=".'"'."?page=user&uid=".$v["uid"].'"'.">".$v["name"]." ".$v["lastname"]."</a> ',date='".time()."',uid='".$_SESSION['GuserID']."' ");			
			}		
		}


	}
	//echo "UPDATE pages SET ".$c."='".$a."' WHERE id='".$b."'";
	echo 1;
}
?>
