<?php
class Router {
    private $routes;

    public function __construct($routes) {
        $this->routes = $routes;
    }

    public function dispatch($route) {
        if (isset($this->routes[$route])) {
            return $this->routes[$route];
        } else {
            return 'indexAction'; // Default action
        }
    }
}
?>
