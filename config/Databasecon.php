<?php

class Databasecon {
    private $host='localhost';
    private $db_name='tibclau';
    private $username='root';
    private $password='';
    private $conn;

    // Constructor to initialize connection settings
    public function __construct() {
       
    }

    // Method to establish a database connection
    public function connect() {
        $this->conn = null;
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // Log the error instead of echoing directly
            error_log('Connection error: ' . $e->getMessage());
            // Or handle the error more gracefully (e.g., redirect to an error page)
            // die('Connection error: ' . $e->getMessage());
        }
        return $this->conn;
    }
}


?>