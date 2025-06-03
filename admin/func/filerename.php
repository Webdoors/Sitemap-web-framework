<?php
	$name=$_POST["name"];
	$file=$_POST["file"];
	$folders=explode("/",$file);
	var_dump($folders);
	$folders=array_pop($folders);
	$folder=implode("/",$folders);
 rename($file, $folder.$name);
 echo 1;
?>