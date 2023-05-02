<?php

spl_autoload_register(function (string $classNamespace) {
    
    $filePath = str_replace('Alura\\Bank', 'src', $classNamespace);
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $filePath);
    $filePath .= '.php';    

    if (file_exists($filePath)) {
        require_once $filePath;
    } 
    
    else {
        echo "The file $filePath does not exist";
    }
});
