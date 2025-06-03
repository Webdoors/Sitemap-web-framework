<?php
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]??"");
	// mysqli_query($con,"INSERT INTO languages SET $b='$c'");
	// echo mysqli_insert_id($con);
	$q10=mysqli_query($con,"SELECT * FROM languages WHERE id='".$a."'");
	$r10=mysqli_fetch_array($q10);
	$n=$r10["shortname"];
	if($n!=""){
		$q1=mysqli_query($con,"SHOW TABLES");
		while($r1=mysqli_fetch_array($q1)){
			$q2=mysqli_query($con,"SHOW COLUMNS FROM ".$r1[0]." ");
			while($r2=mysqli_fetch_array($q2)){
				if(strpos($r2["Field"],"_".$n)!==false){
					 mysqli_query($con,"ALTER TABLE ".$r1[0]." DROP COLUMN ".$r2["Field"].";");
				}
			}
		}		
		 mysqli_query($con,"DELETE FROM languages WHERE id='".$a."'");		
	}
	echo 1;

}
?>
