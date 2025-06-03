<?php
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);
	$b=mysqli_real_escape_string($con,$_POST["b"]);
	$c=mysqli_real_escape_string($con,$_POST["c"]);
	// mysqli_query($con,"INSERT INTO languages SET $b='$c'");
	// echo mysqli_insert_id($con);
	$q10=mysqli_query($con,"SELECT id FROM languages WHERE shortname='".$c."'");
	if(mysqli_num_rows($q10)<1){
		mysqli_query($con,"INSERT INTO languages SET shortname='$c'");
		copy("../../lang/main.php","../../lang/".$c.".php");
		$q1=mysqli_query($con,"SHOW TABLES");
		while($r1=mysqli_fetch_array($q1)){
			$q2=mysqli_query($con,"SHOW COLUMNS FROM ".$r1["Tables_in_suptaxnn_newsupta"]." ");
			while($r2=mysqli_fetch_array($q2)){
				if(strpos($r2["Field"],"_ka")!==false&&(strpos($r2["Type"],"text")!==false||strpos($r2["Type"],"varchar")!==false)){
					// echo "<br>".var_dump($r2);
					$newfield=str_replace("_ka","_".$c,$r2["Field"]);
					 mysqli_query($con,"ALTER TABLE ".$r1["Tables_in_suptaxnn_newsupta"]." ADD COLUMN ".$newfield." TEXT NULL;");
					// echo "ALTER TABLE ".$r1["Tables_in_suptaxnn_newsupta"]." ADD COLUMN ".$newfield." TEXT NULL;";
				}
			}
		}		
	}
	echo 1;

}
?>
