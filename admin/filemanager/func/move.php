<?php
$to=$_POST["to"];
$files=explode(",",$_POST["files"]);

foreach($files as $file){
	$file = "../".trim($file); // Trim any extra whitespace
	$filename = basename($file); // Get the base name of the file
	$destination = rtrim($to, '/') . '/' . $filename; 
        if (file_exists($file)) {
            if (is_dir($file)) {
                // If it's a directory, move it recursively
                if (moveDirectory($file, $destination)) {
                    echo "Moved directory $file to $destination successfully.<br>";
                } else {
                    echo "Failed to move directory $file to $destination.<br>";
                }
            } else {
                // If it's a file, move it
                if (rename($file, $destination)) {
                    echo "Moved file $file to $destination successfully.<br>";
                } else {
                    echo "Failed to move file $file to $destination.<br>";
                }
            }
        } else {
            echo "Source $file does not exist.<br>";
        }
}

function moveDirectory($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            if (is_dir($src . '/' . $file)) {
                moveDirectory($src . '/' . $file, $dst . '/' . $file);
            } else {
                rename($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
    rmdir($src); // Remove the source directory
    return true;
}

echo 1;
?>
