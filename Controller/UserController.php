<?php
class UserController {
    private $router;

    public function __construct($router) {
        $this->router = $router;
    }

    public function handleRequest($route) {
        $action = $this->router->dispatch($route);
        $this->$action();
    }

   
    function loginAction()
        {  
            $url="View\Login.php";
            header('Location: ' . $url);
            exit();
            
        }

        function registerAction()
        {  
            $url="View\Register.php";
            header('Location: ' . $url);
            exit();
           
        }

        function workAction()
        {
            $url="View\WorkUnderProgress.php";
            header('Location: ' . $url);
            exit();
            
        }

        function usAction()
        {
            $url="View\AboutUs.php";
            header('Location: ' . $url);
            exit();
            
        }

        function toursAction()
        {
            $url="View\ToursAndEvents.php";
            header('Location: ' . $url);
            exit();
           
        }

        function archiveAction()
        {
            $url="View\Archive.php";
            header('Location: ' . $url);
            exit();
           
        }

        function contactAction()
        {
            $url="View\Contact.php";
            header('Location: ' . $url);
            exit();
           
        }


        function indexAction()
        {   
            $url="View\Home.php";
            header('Location: ' . $url);
            exit();
            
        }



}

?>
