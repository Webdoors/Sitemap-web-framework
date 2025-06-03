<?php
if(isset($_SESSION['GuserID'])){
	$lang=mysqli_real_escape_string($con,$_POST["lang"]);	
	$ind=mysqli_real_escape_string($con,$_POST["ind"]);

	require_once("../../lang/main.php");

 unset($W[$ind]);

 file_put_contents("../../lang/main.php", '<?php $W= ' . var_export($W, true)."; \n\r ?>");
 
 $languages=mysqli_query($con,"SELECT * FROM languages");
	
	while($rlang=mysqli_fetch_assoc($languages))
	{
 	require_once("../../lang/".$rlang['shortname'].".php");
		unset($W[$ind]);
file_put_contents("../../lang/".$rlang['shortname'].".php",'<?php $W= ' . var_export($W, true)."; \n\r ?>");
	}
 
// var_dump($w);
} 
?>
