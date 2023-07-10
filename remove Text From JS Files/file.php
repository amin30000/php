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
$textToRemove = 'متنی که باید پاک شود';
removeTextFromJSFiles('مسیری که باید پاکسازی شوداز ریشه اصلی وارد شود', $textToRemove); // استفاده از تابع

?>