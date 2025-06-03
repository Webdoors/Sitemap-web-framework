<?php


function listDirectories($dir, $level = 0) {
	global $target; 
    // Create a new DirectoryIterator object
    $iterator = new DirectoryIterator($dir);
    echo "<ul level='$level' style='".($level>0?"display:none":"")."' >";
    // echo "<ul level='$level' style='".($level!=0?"display:none":"")."'>";

    foreach ($iterator as $fileinfo) {
        // Check if the current item is a directory, excluding '.' and '..'
        if ($fileinfo->isDir() && !$fileinfo->isDot()) {
            // Print the directory path within list tags
            echo "<li><input type='radio' folder='".$dir."/".$fileinfo->getFilename()."' name='folder'/><a style='font-size:12px;color:#000;'><img src='img/ico/folder.png' style='width:20px'/>" . htmlspecialchars($fileinfo->getFilename()) . "</a><span class='OPENER CP'>+</span></li>";

            // Recursively list directories
            listDirectories($fileinfo->getPathname(), $level + 1);
        }
    }
    
    echo "</ul>";
}
// echo $uploaddir;
// Replace 'your_directory_path' with the path of your directory
listDirectories("../".$uploaddir);

?>