<?php

$new_content = $_POST["plugins"];
$file_path = '../../view/inc/plugins.php';
    // Write the data to the file, overwriting its contents
file_put_contents($file_path, $new_content);