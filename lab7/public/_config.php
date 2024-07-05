<?php
spl_autoload_register(function($class){
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . '/../' . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

function resolve_path($path) {
    return __DIR__ . '/../' . $path;
}

$GLOBALS["vendorDir"] = resolve_path("vendor");
$GLOBALS["appDir"] = resolve_path("app");

require_once $GLOBALS["vendorDir"] . "/autoload.php";

?>