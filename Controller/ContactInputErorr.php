<?php
 class ContactInputErorr
{
    public function __construct()
    {
        
    }

    public function lenghtvalid($str,$len) {
        return strlen($str)<=$len;
    }
    public function validName($name){
        $len=20;
        return $this->lenghtvalid($name,$len);
    }

    public function validEmail($email) {
        $len = 30; // Adjust as needed
        return $this->lenghtvalid($email, $len) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function validSubject($subject) {
        $len = 30; // Adjust as needed
        return $this->lenghtvalid($subject, $len);
    }

    public function validMessage($message) {
        $len = 256; // Adjust as needed
        return $this->lenghtvalid($message, $len);
    }

    function validateFormInputs($name, $email, $subject, $message,) {
        $errorMsg = "";
    
        // Validate name
        if (!$this->validName($name)) {
            $errorMsg = "Name";
        }
        // Validate email
        elseif (!$this->validEmail($email)) {
            $errorMsg = "Email";
        }
        // Validate subject
        elseif (!$this->validSubject($subject)) {
            $errorMsg = "Subject";
        }
        // Validate message
        elseif (!$this->validMessage($message)) {
            $errorMsg = "Message";
        }
    
        return $errorMsg;
    }

}



?>