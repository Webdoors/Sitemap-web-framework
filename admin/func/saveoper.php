<?php
session_start();
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
	$j=mysqli_real_escape_string($con,$_POST["j"]);
	$k=mysqli_real_escape_string($con,$_POST["k"]);
	$uid=$_SESSION['GuserID'];
	if($b==2){
		$q2=mysqli_query($con,"SELECT * FROM qbystore WHERE storeid='$a' AND itemid='$e' ");
		$r2=mysqli_fetch_array($q2);	
		if($r2["quantity"]<$d){
			echo "100";
			die();
		}		
	}
	if($b==4){
		$q2=mysqli_query($con,"SELECT * FROM qbystore WHERE storeid='$a' AND itemid='$e' ");
		$r2=mysqli_fetch_array($q2);	
		if($r2["reserve"]<$d){
			echo "100";
			die();
		}		
	}
	if($b==6){
		$q2=mysqli_query($con,"SELECT * FROM qbystore WHERE storeid='$a' AND itemid='$e' ");
		$r2=mysqli_fetch_array($q2);	
		if($r2["preorder"]<$d){
			echo "100";
			die();
		}		
	}

	mysqli_query($con,"INSERT INTO journal SET storeid='$a',opertype='$b',com='$c',amount='$d',itemid='$e',uid='".$uid."',date='".time()."',name='".$h."',lastname='".$i."',tel='".$j."',address='".$k."'");
	$jid=mysqli_insert_id($con);
	if($b==1){
		mysqli_query($con,"UPDATE qbystore SET quantity=quantity+$d WHERE storeid='$a' AND itemid='$e'");
	}
	//echo "UPDATE qbystore SET quantity=quantity+$d WHERE storeid='$a' AND itemid='$e'";
	if($b==2){
		mysqli_query($con,"UPDATE qbystore SET quantity=quantity-$d WHERE storeid='$a' AND itemid='$e'");	
echo"UPDATE qbystore SET quantity=quantity-$d WHERE storeid='$a' AND itemid='$e'";		
	}
	if($b==3){
		mysqli_query($con,"UPDATE qbystore SET reserve=reserve+$d,quantity=quantity-$d WHERE storeid='$a' AND itemid='$e'");	
		$q1=mysqli_query($con,"SELECT id FROM qbystore WHERE storeid='$a' AND itemid='$e'");
		$r1=mysqli_fetch_array($q1);
		mysqli_query($con,"INSERT INTO info SET qbystoreid='".$r1["id"]."',jid='$jid',com='$c',quantity='$d',date='".time()."',name='".$h."',lastname='".$i."',tel='".$j."',address='".$k."',reserve=1");		
	}
	if($b==4){
		mysqli_query($con,"UPDATE qbystore SET reserve=reserve-$d WHERE storeid='$a' AND itemid='$e'");				
	}
	if($b==5){
		mysqli_query($con,"UPDATE qbystore SET preorder=preorder+$d,quantity=quantity-$d WHERE storeid='$a' AND itemid='$e'");		
		$q1=mysqli_query($con,"SELECT id FROM qbystore WHERE storeid='$a' AND itemid='$e'");
		$r1=mysqli_fetch_array($q1);
		mysqli_query($con,"INSERT INTO info SET qbystoreid='".$r1["id"]."',jid='$jid',com='$c',quantity='$d',date='".time()."',name='".$h."',lastname='".$i."',tel='".$j."',address='".$k."',preorder=1");			
	}
	if($b==6){
		mysqli_query($con,"UPDATE qbystore SET preorder=preorder-$d WHERE storeid='$a' AND itemid='$e'");			
	}
	echo 1;
}
?>