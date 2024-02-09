<?php

require_once '../config/Databasecon.php';
require_once '../Model/questionForm.php';
require_once '../Controller/ContactInputErorr.php';

if(isset($_POST["submit"])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

  

    $leng=new ContactInputErorr();
    $error=$leng->validateFormInputs($name,$email,$subject,$message);

    switch ($error) {
        case 'Name':
            header("Location: /TibClau/View/Contact.php?error=NameTooLong");
            exit();
        case 'Email':
            header("Location: /TibClau/View/Contact.php?error=EmailTooLong");
            exit();
        case 'Subject':
            header("Location: /TibClau/View/Contact.php?error=SubjectTooLong");
            exit();
        case 'Message':
            header("Location: /TibClau/View/Contact.php?error=MessageTooLong");
            exit();
        default:
            // No errors, proceed with form submission
            break;
    }


  $con=new Databasecon();
  $put=new questionForm($con->connect());
  $put->inTable($name,$email,$subject,$message); 

  header("Location: /TibClau/View/Contact.php?success=FormSubmitted");
}
else{
    header("Location: /TibClau/View/Contact.php?error=FormNotSubmitted");
exit();
}

?>