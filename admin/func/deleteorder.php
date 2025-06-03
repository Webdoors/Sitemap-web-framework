<?php
session_start();
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	
	
	$ord=mysqli_query($con, "SELECT * FROM orders WHERE id='$b' ");
	$rord=mysqli_fetch_assoc($ord);
	
	$spec=mysqli_query($con, "SELECT * FROM special WHERE ITEM='".$rord['itemname'] ."' ");
	$rspec=mysqli_fetch_assoc($spec);
	
	$T=time();
	if($rord['status']==7||$rord['status']==10||$rord['status']==5||$rord['status']==4)
		{
	$prodct=mysqli_query($con, "SELECT * FROM qbystore WHERE storeid='". $rord['place'] ."' AND itemid='". $rspec['id'] ."' ");
	$rprdc=mysqli_fetch_assoc($prodct);
	
	
		
			$shqst=$rprdc['quantity']+1;
			
			mysqli_query($con, "UPDATE qbystore SET quantity='$shqst' WHERE id='". $rprdc['id'] ."' AND storeid='". $rord['place'] ."' ");
			$pprice=mysqli_query($con, "SELECT *  FROM  productprices WHERE name='". $rord['itemname'] ."' AND price='".$rord['takeprice']."' AND sold  > 0  ORDER BY id DESC LIMIT 1");
			$rprice=mysqli_fetch_assoc($pprice);
		   
			mysqli_query($con, "UPDATE  productprices SET sold='". --$rprice['sold'] . "' WHERE id='". $rprice['id'] ."'   ");
			
		
	}
	
	
	mysqli_query($con, "INSERT INTO journal SET date='$T',  itemid='".$rspec['id']."', storeid='" . $rord['place'] ."', opertype='10',uid='".$_SESSION['GuserID']."',orderid='".$b."'");
	mysqli_query($con,"DELETE FROM `$a` WHERE id='$b'");
	
	echo 1;
}
?>