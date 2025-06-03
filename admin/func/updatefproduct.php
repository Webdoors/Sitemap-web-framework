<?php
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]??"");
	$b=mysqli_real_escape_string($con,$_POST["b"]??"");
	$c=mysqli_real_escape_string($con,$_POST["c"]??"");
	$q1=mysqli_query($con,"SELECT * FROM fproduct WHERE pid='$c' AND flid='$a'");
	// echo "SELECT * FROM fproduct WHERE pid='$c' AND flid='$a'";
	if(mysqli_num_rows($q1)>0){
		mysqli_query($con,"UPDATE fproduct SET val='".$b."' WHERE flid='$a' AND pid='".$c."' ");		
	}else{
		mysqli_query($con,"INSERT INTO fproduct SET val='".$b."',flid='$a',pid='".$c."' ");		
		// echo "INSERT INTO fproduct SET val='".$b."',flid='$a',pid='".$c."' ";		
	}
	$q2=mysqli_query($con,"SELECT flid FROM fproduct WHERE pid='$c' AND val=1");
	$i=0;
	$fls="";
	while($r2=mysqli_fetch_array($q2)){
		$i++;
		$co="";
		if($i>1){
			$co=",";
		}
		$fls=$fls.$co.$r2["flid"];
	}
    // mysqli_query($con,"UPDATE products SET filters='".$fls."' WHERE id='$c'");
	echo 1;
}
?>