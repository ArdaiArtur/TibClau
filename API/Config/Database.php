<?php

class Database{
private $host='localhost';
private $db_name='proiectweb';
private $username='root';
private $passwordEmpty='';
private $conn;


public function connect()
{
 $this->conn=null;
 try
 {
    $this->conn=new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,
    $this->username,$this->passwordEmpty);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }  
 catch(PDOException $e)
 {
    echo'connection error : '.$e->getMessage();
 } 
 return $this->conn;
}




}
?>
