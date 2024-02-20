<?php
spl_autoload_register(function ($class_name) {
    // Convert class name to file path by replacing namespace separator with directory separator
    $file_path = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
    // Check if the file exists and include it
    if (file_exists($file_path)) {
        include $file_path;
    }
});
?>
