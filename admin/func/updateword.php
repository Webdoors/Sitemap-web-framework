<?php

if(isset($_SESSION['GuserID'])){
	$word=mysqli_real_escape_string($con,$_POST["word"]);
	$lang=mysqli_real_escape_string($con,$_POST["lang"]);
	$value=mysqli_real_escape_string($con,$_POST["value"]);
	require_once("../../lang/".$lang.".php");
	$W[$word]=$value;
file_put_contents("../../lang/".$lang.".php",'<?php $W= ' . var_export($W, true)."; \n\r ?>");

echo 1;
}
?>
 