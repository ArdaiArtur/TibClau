<?php
    require_once '../config/Databasecon.php';
    require_once '../Model/admlogin.php';
    ini_set('session.gc_maxlifetime', 3000);
    session_set_cookie_params(3000);
    session_start();
    if(isset($_POST["submit"])){
  
        $username=$_POST["uid"];
        $pwd=$_POST["pwd"];

    

    if (empty($username) || empty($pwd)) {
        header("Location: admlogadm.php?error=EmptyInput");
        exit();
    }
      $con=new Databasecon();
      $log=new admlogin($con->connect());
      
      $log->logstart($username,$pwd);
      
    }
    else{
        header("admlogadm.php");
    exit();
}
?>