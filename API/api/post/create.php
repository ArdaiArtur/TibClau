<?php 
  
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization,X-Rquested-With');

  include_once '../../Config/Database.php';
  include_once '../../Models/Post.php';

  
  $database = new Database();
  $db = $database->connect();

 
  $post = new Psot($db);
  $data=json_decode(file_get_contents("php://input"));
  $post->title=$data->title;  
  $post->body=$data->body;  
  $post->auth=$data->auth;
  $post->category_id=$data->category_id;
  if($post->create())
  {
    echo json_encode( array('message'=>'Post Created'));
  }
  else
  {
    echo json_encode(array('message'=>'error post not created'));
  }
  
  $post->title=$data->title;


  ?>