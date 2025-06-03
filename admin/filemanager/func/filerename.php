<?php
	$name=$_POST["name"];
	$file=$_POST["file"];
	$folders=explode("/",$_POST["file"]);var_dump($folders);
	$elem=array_pop($folders);

	$folder=implode("/",$folders);
 rename("../".$file,"../".$name);
 echo 1;
?>