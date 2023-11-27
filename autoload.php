<?php
spl_autoload_register(function ($className) {
    // Define the base directory for the "Shared" directory
    $baseDir = __DIR__ . '/Shared/';

    // Replace namespace separator with directory separator
    $className = str_replace('\\', '/', $className);

    // Define the file path
    $filePath = $baseDir . $className . '.php';

    // Check if the file exists and include it
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});
?>
