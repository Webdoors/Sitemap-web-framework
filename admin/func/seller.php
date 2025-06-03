<?php

if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	$d=mysqli_real_escape_string($con,$_POST["d"]);
	$e=mysqli_real_escape_string($con,$_POST["e"]);
	$f=mysqli_real_escape_string($con,$_POST["f"]);
	$g=mysqli_real_escape_string($con,$_POST["g"]);
	$h=mysqli_real_escape_string($con,$_POST["h"]);
	$i=mysqli_real_escape_string($con,$_POST["i"]);
	$T=time();
	$uid=$_SESSION['GuserID'];	
	$q3=mysqli_query($con,"SELECT * FROM productbase WHERE  barcode ='".$g."'  LIMIT 1");
	$r3=mysqli_fetch_array($q3);
	$qq=mysqli_query($con, "SELECT * FROM special WHERE BARCODE='". $g ."' ");
	$rqq=mysqli_fetch_assoc($qq);
	$prodct=mysqli_query($con, "SELECT quantity FROM qbystore WHERE storeid='". $d ."' AND itemid='". $rqq["id"]."' " );
	$rprdct=mysqli_fetch_assoc($prodct);
	if($rprdct['quantity']>0)
	{

		$e=$e*floatval($c);
		if($h=="1"){
			$e=$i;
		}
		mysqli_query($con,"INSERT INTO orders SET income='კი',sale='".$h."',saleprice='".$i."',date='".date("d.m.Y",$T)."',status='7',
		itemname='".$r3["name"]."',supplier='".$r3["brand"]."',
		takeprice='".$f."',price='".$e."', barcode='".$g."',
		profit='".round((($e-$f)/1.18),2)."',method='".$a."',
		owner='".$b."',
		place='".$d."',comment='',
		uid='".$uid."',udate='".$T."'");
		  $pprice=mysqli_query($con, "SELECT *  FROM  productprices WHERE name='". $r3['name'] ."' AND sold < quantity AND quantity > 0 LIMIT 1");
			       $rprice=mysqli_fetch_assoc($pprice);
		           if($rprice['sold']<$rprice['quantity'])
			         {
			           mysqli_query($con, "UPDATE  productprices SET sold='". ++$rprice['sold'] . "' WHERE id='". $rprice['id'] ."' ");
			               
					 }
		
		$oid=mysqli_insert_id($con);	
		mysqli_query($con,"INSERT INTO journal SET date='".$T."',opertype='7', itemid='".$rqq['id']."', storeid='". $d."', uid='".$_SESSION['GuserID']."',orderid='".$oid."'");
		$shqst=$rprdct['quantity']-1;
		mysqli_query($con, "UPDATE  qbystore SET quantity='$shqst' WHERE storeid='". $d ."' AND itemid='". $rqq['id'] ."' ");
		$q3=mysqli_query($con,"SELECT * FROM status WHERE id='".$a[1]."'");
		$r3=mysqli_fetch_array($q3);
	
		mysqli_query($con,"INSERT INTO journal SET com='status: ".$r3['name']." \n\r OLD - status: | '".$r4["name"]."'',date='".$T."',opertype='2',uid='".$_SESSION['GuserID']."',orderid='".$oid."'");
	    echo 1;
	}	else{
		echo "error";
	}
}
?>