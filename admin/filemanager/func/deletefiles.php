<?php
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return false;
    }
    if (!is_dir($dir)) {
        return unlink($dir);
    }
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }
    return rmdir($dir);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $files = explode(",", $_POST['files']);

    foreach ($files as $file) {
        $file = "../" . trim($file); // Adjust the path and trim any extra whitespace

        // Ensure the file or folder exists
        if (file_exists($file)) {
            if (is_dir($file)) {
                // If it's a directory, delete it recursively
                if (deleteDirectory($file)) {
                    echo "Deleted directory $file successfully.<br>";
                } else {
                    echo "Failed to delete directory $file.<br>";
                }
            } else {
                // If it's a file, delete it
                if (unlink($file)) {
                    echo "Deleted file $file successfully.<br>";
                } else {
                    echo "Failed to delete file $file.<br>";
                }
            }
        } else {
            echo "Source $file does not exist.<br>";
        }
    }
}
?>