<?php
require_once 'clens.php';
    class questionForm extends clens
    {
        private $con;
        public function __construct($db)
        {
            $this->con=$db;
        }
        
        public function inTable($name, $email, $subject, $message)
        {

            $name = $this->sanitization($name);
            $email = $this->emailsanitization($email);
            $subject = $this->sanitization($subject);
            $message = $this->sanitization($message);
            

            // Prepare and bind the SQL statement
            $query = "INSERT INTO questions (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
            $stmt = $this->con->prepare($query);

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);

            // Execute the statement
            if ($stmt->execute()) {
                return true; // Return true if insertion is successful
            } else {
                return false; // Return false if there's an error
            }
        }

    }



?>