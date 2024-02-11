<?php

class Category{
 private $conn;
 private $table='categories';

public $id;
public $name;
public $created_at;


public function __construct($db)
{
    $this->conn=$db;
}


}

?>