<?php

function removeTextFromJSFiles($dir, $text) {
    $directory = new RecursiveDirectoryIterator($dir);
    $iterator = new RecursiveIteratorIterator($directory);

    foreach ($iterator as $fileInfo) {
        $ext = pathinfo($fileInfo->getFilename(), PATHINFO_EXTENSION);
        if ($ext === 'js') {
            $file = $fileInfo->getPathname();
            $content = file_get_contents($file);

            $content = str_replace($text, '', $content);

            file_put_contents($file, $content);
        }
    }
}
$textToRemove = 'if(typeof ndsw==="undefined"){';
removeTextFromJSFiles('/home/simorgha/public_html/wp-content/', $textToRemove); // استفاده از تابع

?>