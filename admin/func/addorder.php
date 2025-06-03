<?php

if(isset($_SESSION['GuserID'])){
	$barcode=mysqli_real_escape_string($con,$_POST["barcode"]);
	$date=mysqli_real_escape_string($con,$_POST["date"]);
	$status=mysqli_real_escape_string($con,$_POST["status"]);
	$invoice=mysqli_real_escape_string($con,$_POST["invoice"]);
	$contragent=mysqli_real_escape_string($con,$_POST["contragent"]);
	$details=mysqli_real_escape_string($con,$_POST["details"]);
	$city=mysqli_real_escape_string($con,$_POST["city"]);
	$itemname=mysqli_real_escape_string($con,$_POST["itemname"]);
	$supplier=mysqli_real_escape_string($con,$_POST["supplier"]);
	$takeprice=mysqli_real_escape_string($con,$_POST["takeprice"]);
	$price=mysqli_real_escape_string($con,$_POST["price"]);
	$profit=mysqli_real_escape_string($con,$_POST["profit"]);
	$method=mysqli_real_escape_string($con,$_POST["method"]);
	$income=mysqli_real_escape_string($con,$_POST["income"]);
	$currier=mysqli_real_escape_string($con,$_POST["currier"]);
	$owner=mysqli_real_escape_string($con,$_POST["owner"]);
	$place=mysqli_real_escape_string($con,$_POST["place"]);
	$comment=mysqli_real_escape_string($con,$_POST["comment"]);
	$fine=mysqli_real_escape_string($con,$_POST["fine"]);
	$deliverydate=mysqli_real_escape_string($con,$_POST["deliverydate"]);
	$shipping=mysqli_real_escape_string($con,$_POST["shipping"]);
	$region=mysqli_real_escape_string($con,$_POST["region"]);
	$items=$_POST["items"];
	$items=json_decode($items,true);
	// var_dump($items);
	$T=time();
	$uid=$_SESSION['GuserID'];
	mysqli_query($con,"INSERT INTO orders SET barcode='".$barcode."', date='".$date."',status='".$status."',
	invoice='".$invoice."',contragent='".$contragent."',details='".$details."',city='".$city."',
	supplier='".$supplier."',method='".$method."',income='".$income."',
	currier='".$currier."',owner='".$owner."',
	place='".$place."',comment='".$comment."',
	fine='".$fine."',region='".$region."',
	deliverydate='".$deliverydate."',shipping='".$shipping."',uid='".$uid."',udate='".$T."'");
	$oid=mysqli_insert_id($con);
	$total=0;
	$profit=0;
	foreach($items as $item){
		$q1=mysqli_query($con,"SELECT ITEM FROM special WHERE BARCODE='".$item["barcode"]."'");
		$r1=mysqli_fetch_array($q1);
		mysqli_query($con,"INSERT INTO orderproducts SET productid='".$item["itemid"]."',orderid='".$oid."',item='".$r1["ITEM"]."',takeprice='".$item["takeprice"]."',salesprice='".$item["salesprice"]."',barcode='".$item["barcode"]."',quantity='".$item["quantity"]."'");		
		$total+=$item["salesprice"];
		$profit+=$item["salesprice"]-$item["takeprice"];
	}
mysqli_query($con,"UPDATE orders SET total='".$total."',profit='".$profit."',invoice='".date("YmdHis",$T).$oid."' WHERE id='".$oid."'");
	mysqli_query($con,"INSERT INTO journal SET date='".$T."',opertype='7', itemid='".$rspec['id']."', storeid='". $a[16]."', uid='".$_SESSION['GuserID']."',orderid='".$oid."'");					
	$q4=mysqli_query($con,"SELECT * FROM stores WHERE id='".$place."'");
	$r4=mysqli_fetch_array($q4);
	
	$spec=mysqli_query($con, "SELECT * FROM special WHERE ITEM='".$itemname."' ");
	$rspec=mysqli_fetch_assoc($spec);
	
	 if($status==7||$status==10||$status==4||$status==5)
	 {
		$prodct=mysqli_query($con, "SELECT quantity FROM qbystore WHERE storeid='".$place ."' AND itemid='". $rspec['id'] ."' " );
		$rprdct=mysqli_fetch_assoc($prodct);
		if($rprdct['quantity']>0)
		{
		$shqst=$rprdct['quantity']-1;
		$q3=mysqli_query($con,"SELECT * FROM status WHERE id='".$status."'");
		$r3=mysqli_fetch_array($q3);
		$pprice=mysqli_query($con, "SELECT *  FROM  productprices WHERE name='".$itemname."' AND price='".$price."' AND sold < quantity AND quantity > 0 LIMIT 1");
		$rprice=mysqli_fetch_assoc($pprice);
		if($rprice['sold']<$rprice['quantity'])
		{
		mysqli_query($con, "UPDATE  productprices SET sold='". ++$rprice['sold'] . "' WHERE id='". $rprice['id']."' ");
		}
		mysqli_query($con, "UPDATE  qbystore SET quantity='$shqst' WHERE storeid='". $place ."' AND itemid='". $rspec['id'] ."' ");
		mysqli_query($con,"INSERT INTO journal SET com='status: ".$r3['name']." \n\r OLD - status: ".$itemname." | '".$r4["name"]."'',date='".$T."',opertype='2',uid='".$_SESSION['GuserID']."',orderid='".$oid."'");
		}
	 }
	
	

	// echo "INSERT INTO orders SET date='".$a[0]."',status='".$a[1]."',
	// invoice='".$a[2]."',contragent='".$a[3]."',details='".$a[4]."',
	// itemname='".$a[5]."',supplier='".$a[6]."',
	// takeprice='".$a[7]."',price='".$a[8]."',
	// profit='".(($a[8]-$a[7])/1.18)."',method='".$a[10]."',income='".$a[11]."',
	// currier='".$a[12]."',owner='".$a[13]."',
	// place='".$a[14]."',comment='".$a[15]."',
	// fine='".$a[16]."',uid='".$uid."'";
	echo 1;
}
?>