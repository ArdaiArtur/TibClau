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
        {  /* 
            $url="View\Login.php";
            header('Location: ' . $url);
            exit();*/
            include "View\Login.php";
            exit();
        }

        function registerAction()
        {  /* 
            $url="View\Register.php";
            header('Location: ' . $url);
            exit();*/
            include "View\Register.php";
            exit();
        }

        function workAction()
        {/*
            $url="View\WorkUnderProgress.php";
            header('Location: ' . $url);
            exit();*/
            include "View\WorkUnderProgress.php";
            exit();
        }

        function usAction()
        {/*
            $url="View\AboutUs.php";
            header('Location: ' . $url);
            exit();*/
            include "View\AboutUs.php";
            exit();
        }

        function toursAction()
        {/*
            $url="View\ToursAndEvents.php";
            header('Location: ' . $url);
            exit();*/
            include "View\ToursAndEvents.php";
            exit();
        }

        function archiveAction()
        {/*
            $url="View\Archive.php";
            header('Location: ' . $url);
            exit();*/
            include "View\Archive.php";
            exit();
        }

        function contactAction()
        {/*
            $url="View\Contact.php";
            header('Location: ' . $url);
            exit();*/
            include "View\Contact.php";
            exit();
        }


        function indexAction()
        {   /*
            $url="View\Home.php";
            header('Location: ' . $url);
            exit();*/
            include "View\Home.php";
            exit();
        }



}

?>
