<?php

function deleteFile($dir, $filename) {
    // Open the directory
    $dirHandle = opendir($dir);

    // Read all files and directories inside the directory
    while (($file = readdir($dirHandle)) !== false) {
        // Skip current and parent directory
        if ($file == '.' || $file == '..') {
            continue;
        }

        // Get the absolute path of the file/directory
        $path = $dir . '/' . $file;

        // If it's a directory, recursively search inside
        if (is_dir($path)) {
            deleteFile($path, $filename);
        }

        // If it's a file and the filename matches, delete the file
        if (is_file($path) && $file == $filename) {
            unlink($path);
            echo "Deleted: " . $path . "\n";
        }
    }

    // Close the directory handle
    closedir($dirHandle);
}

// Specify the root directory to start the deletion
$rootDir = '/path/to/your/site';

// Call the delete function
deleteFile($rootDir, 'x.php');

?>
