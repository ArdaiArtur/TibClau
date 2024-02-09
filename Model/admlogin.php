<?php

class admlogin
{
    
    private $con;
    
    public function __construct($db)
    {
        $this->con=$db;
    }

    public function onetimeusercreate()
    {
        $query = "SELECT * FROM admins WHERE username = :username";
        $stmt = $this->con->prepare($query);
        $nume='artur';
        $stmt->bindParam(':username', $nume);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $password='';
        $insertQuery = "INSERT INTO admins ( username, email,password_hash, first_name, last_name) VALUES ( :username, :email,:password_hash, :first_name, :last_name)";
        $insertStmt = $this->con->prepare($insertQuery);
        $newnume='';
        $em='';
        $insertStmt->bindParam(':username', $newnume);
        $hpas=password_hash($password, PASSWORD_DEFAULT);
        $insertStmt->bindParam(':email', $em);
        $insertStmt->bindParam(':password_hash', $hpas);
        $insertStmt->bindParam(':first_name', $user["first_name"]);
        $insertStmt->bindParam(':last_name', $user["last_name"]);
        $insertStmt->execute();

    }

    public function logget($username, $password)
    {
        
        $sanitizedInput = $this->sanitization($username, $password);

        // Check if the input is valid
        if ($sanitizedInput) {
            // Extract sanitized username and password from the result
            $sanitizedUsername = $sanitizedInput['username'];
            $sanitizedPassword = $sanitizedInput['password'];
        } else {
            // Return false if input is not valid
            return false;
        }

        // Prepare and execute a query to fetch the user with the given username
        $query = "SELECT * FROM admins WHERE username = :username";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':username', $sanitizedUsername);
        $stmt->execute();
    
        // Check if the user exists
        if ($stmt->rowCount() == 1) {
            // Fetch the user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Verify the password
            if (password_verify($sanitizedPassword, $user['password_hash'])) {
                // Password is correct, return the user data
                return $user;
            } else {
                // Password is incorrect
                return false;
            }
        } else {
            // User not found
            return false;
        }
    }
    
    public function logstart($username, $password)
    {
        $existsvalid=$this->logget($username, $password);

        if ($existsvalid) {
            // Login successful, set session variables and redirect to home page
            $_SESSION["adm_id"] = $existsvalid["id"];
            $_SESSION["adm_username"] = $existsvalid["username"];
            $_SESSION["adm_email"] = $existsvalid["email"];
            $_SESSION["adm_first_name"] = $existsvalid["first_name"];
            $_SESSION["adm_last_name"] = $existsvalid["last_name"];
            header("location: ../index.php?route=home");
        } else {
            // Login failed, redirect to login page with error message
            header("location: admlogadm.php?error=WrongCredentials");
            exit();
        }
    }

    public function sanitization($username, $password)
     {
         // Trim whitespace from username and password
         $username = trim($username);
         $password = trim($password);
 
         // Validate username and password format
         if (empty($username) || empty($password)) {
             // Username or password is empty
             return false;
         }
 
         // Validate username format using filter_var with FILTER_VALIDATE_REGEXP
         if (!filter_var($username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9]+$/")))) {
             // Invalid username format
             return false;
         }
 
         // Validate password strength using mb_strlen to handle multibyte characters
         if (mb_strlen($password, 'UTF-8') < 8) {
             // Password is too short
             return false;
         }
 
         // Apply additional sanitization using filter_var with FILTER_SANITIZE_SPECIAL_CHARS
         $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
         $password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
 
         // If all checks pass, return sanitized username and password
         return [
             'username' => $username,
             'password' => $password
         ];
     }

}




?>