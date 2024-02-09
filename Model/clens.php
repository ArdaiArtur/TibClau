<?php

    class clens
    {
        public function emailsanitization($email)
        {
            $email = trim($email);

            if (empty($email)) {
                // Email is empty
                return false;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Invalid email format
                return false;
            }

            // Sanitize email (optional)
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            // Return sanitized email
            return $email;
        }

        public function sanitization($value)
     {
         // Trim whitespace from username and password
         $value = trim($value);
         
 
         // Validate value$value and password format
         if (empty($value)) {
             // value$value or password is empty
             return false;
         }
 
         // Validate value$value format using filter_var with FILTER_VALIDATE_REGEXP
         if (!filter_var($value, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9]+$/")))) {
             // Invalid value$value format
             return false;
         }
 
        
        
 
         // Apply additional sanitization using filter_var with FILTER_SANITIZE_SPECIAL_CHARS
         $value = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
         
 
         // If all checks pass, return sanitized value$value and password
         return  $value;
             
        
     }
        

    }


?>