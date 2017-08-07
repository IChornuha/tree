<?php
spl_autoload_register(function ($class) {
    $filename = BASE_PATH. '/' . str_replace('\\', '/', $class) . '.php';
    include($filename);
});
