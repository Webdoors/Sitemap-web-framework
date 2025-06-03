<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
	$folder=$_POST["folder"];
	$d=$_POST["d"];
$dir="../".$d."/".$folder;
echo file_exists($dir);
if (!file_exists($dir)) {
    if (mkdir($dir, 0755, true)) {
        echo "Directory '$dir' created successfully.\n";
    } else {
        echo "Failed to create directory '$dir'.\n";
    }
}
?>