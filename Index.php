<?php
session_start();

require_once 'autoload.php'; // Autoload classes
require_once 'Controller/UserController.php';
$routes = require_once 'config/routes.php'; // Load routing configuration

$route = isset($_GET['route']) ? $_GET['route'] : '';
$router = new Router($routes);
$controller = new UserController($router);
$controller->handleRequest($route);
?>
