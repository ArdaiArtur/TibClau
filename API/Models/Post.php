<?php

class Psot{
 private $conn;
 private $table='main_post';

public $id;
public $category_id;
public $category_name;
public $title;
public $body;
public $auth;
public $created_at;
public $expire;
public $img_url;

public function __construct($db)
{
    $this->conn=$db;
}

public function read()
{
    $query='SELECT 
    c.name as category_name,
    p.id,p.category_id,
    p.title,
    p.body,
    p.author,
    p.created_at,
    p.expire,
    p.img_url
    FROM
    '.$this->table.' p
    LEFT JOIN
    categories c ON p.category_id=c.id
    ORDER BY
    p.created_at DESC
    ';

    $statment=$this->conn->prepare($query);
    $statment->execute();

    return $statment;
}

public function read_single()
{

    $query='SELECT 
    c.name as category_name,
    p.id,p.category_id,
    p.title,
    p.body,
    p.author,
    p.created_at,
    p.expire,
    p.img_url
    FROM
    '.$this->table.' p
    LEFT JOIN
    categories c ON p.category_id=c.id
    WHERE 
    p.id=?
    LIMIT 1
    ';

    $statment=$this->conn->prepare($query);
    
    $statment->bindParam(1,$this->id);
    
    $statment->execute();

    $row=$statment->fetch(PDO::FETCH_ASSOC);
    
    $this->title=$row['title'];
    $this->body=$row['body'];
    $this->auth=$row['author'];
    $this->category_id=$row['category_id'];
    $this->category_name=$row['category_name'];
    $this->expire=$row['expire'];
    $this->img_url=$row['img_url'];

    
}
public function create()
{

    $query='INSERT INTO '.$this->table .'
    SET
    title=:title,
    body=:body,
    author=:auth,
    category_id=:category_id,
    expire=:expire,
    img_url=:img_url
    ';
    $statment=$this->conn->prepare($query);
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->body=htmlspecialchars(strip_tags($this->body));  
    $this->auth=htmlspecialchars(strip_tags($this->auth));
    $this->category_id=htmlspecialchars(strip_tags($this->category_id));
    $this->expire=htmlspecialchars(strip_tags($this->expire));
    $this->img_url=htmlspecialchars(strip_tags($this->img_url));

    $statment->bindParam(':title',$this->title);
    $statment->bindParam(':body',$this->body);
    $statment->bindParam(':auth',$this->auth);
    $statment->bindParam(':category_id',$this->category_id);
    $statment->bindParam(':expire',$this->expire);
    $statment->bindParam(':img_url',$this->img_url);
    if($statment->execute())
    {
        return true;
    }
    printf("Error: %s.\n", $statment->error);

    return false;


}

public function update()
{

    $query='UPDATE '.$this->table .'
    SET
    title=:title,
    body=:body,
    author=:auth,
    category_id=:category_id,
    expire=:expire,
    img_url=:img_url
    WHERE
        id=:id
    ';
    $statment=$this->conn->prepare($query);
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->body=htmlspecialchars(strip_tags($this->body));  
    $this->auth=htmlspecialchars(strip_tags($this->auth));
    $this->category_id=htmlspecialchars(strip_tags($this->category_id));
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->expire=htmlspecialchars(strip_tags($this->expire));
    $this->img_url=htmlspecialchars(strip_tags($this->img_url));

    $statment->bindParam(':title',$this->title);
    $statment->bindParam(':body',$this->body);
    $statment->bindParam(':auth',$this->auth);
    $statment->bindParam(':category_id',$this->category_id);
    $statment->bindParam(':id',$this->id);
    $statment->bindParam(':expire',$this->expire);
    $statment->bindParam(':img_url',$this->img_url);
    if($statment->execute())
    {
        return true;
    }
    printf("Error: %s.\n", $statment->error);

    return false;


}


public function delete()
{

    $query='DELETE FROM '.$this->table .' WHERE id=:id
    ';

    $statment=$this->conn->prepare($query);
    
    $this->id=htmlspecialchars(strip_tags($this->id));


   
    $statment->bindParam('id',$this->id);

    if($statment->execute())
    {
        return true;
    }
    printf("Error: %s.\n", $statment->error);

    return false;


}










}
?>