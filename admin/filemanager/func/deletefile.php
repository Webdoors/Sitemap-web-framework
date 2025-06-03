<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
	$file="../".$_POST["file"];
	if (is_dir($file)) {
		rmdir($file);
	}else{
		unlink($file);		
	}

	echo 1;
?>