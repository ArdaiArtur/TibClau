<?php
session_start();

require_once 'autoload.php'; // Autoload classes
require_once 'Controller/UserController.php';
$routes = require_once 'config/routes.php'; // Load routing configuration

// Check if the request is for a static file
$uri = $_SERVER['REQUEST_URI'];
$staticFileExtensions = ['.jpg', '.jpeg', '.png', '.gif', '.css', '.js']; // Add more file extensions as needed
$isStaticFile = false;
foreach ($staticFileExtensions as $extension) {
    if (substr($uri, -strlen($extension)) === $extension) {
        $isStaticFile = true;
        break;
    }
}

// If it's not a static file, proceed with routing
if (!$isStaticFile) {
    $route = isset($_GET['route']) ? $_GET['route'] : '';
    $router = new Router($routes);
    $controller = new UserController($router);
    $controller->handleRequest($route);
} else {
    // Serve the static file directly (let the web server handle it)
    return false;
}
?>
