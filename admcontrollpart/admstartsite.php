<?php
session_start();
if(isset($_POST["submit"])){
  
    $username=$_POST["uid"];
    $pwd=$_POST["pwd"];

    require_once '../config/Databasecon.php';
    require_once '../Model/admlogin.php';

    if (empty($username) || empty($pwd)) {
        header("Location: admlogadm.php?error=EmptyInput");
        exit();
    }
      $con=new Databasecon();
      $log=new admlogin($con);
      $log->logstart($username,$pwd);
      
}
else{
    header("admlogadm.php");
    exit();
}
?>