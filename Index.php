<?php
// Start PHP session if needed
session_start();

// Include necessary files or libraries
require_once 'Controller\UserController.php';
//require_once 'Model/SomeModel.php';

// Define routing logic
$route = isset($_GET['route']) ? $_GET['route'] : '';
$routeurl="";
$controller = new UserController();
// Route requests to the appropriate controller
switch ($route) {
    case 'login':
        // $controller = new SomeController();
        $controller->loginAction();
        break;
    case 'register':
        //$controller = new SomeController();
        $controller->registerAction();
        break;

    case 'work':

        $controller->workAction();
        break;
    case 'us':
        // $controller = new SomeController();
        $controller->usAction();
        break;
    case 'tours':
        // $controller = new SomeController();
        $controller->toursAction();
        break;            
    case 'archive':
        // $controller = new SomeController();
        $controller->archiveAction();
        break;    
    case 'contact':
        // $controller = new SomeController();
        $controller->contactAction();
        break;    
    case 'home':
        // $controller = new SomeController();
        $controller->indexAction();
        break;    
        // Add more routes as needed
    default:
        // Handle default route (e.g., home page)
        $controller->indexAction();
        break;
}
?>