<?php 
  
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization,X-Rquested-With');

  include_once '../../Config/Database.php';
  include_once '../../Models/Post.php';

  
  $database = new Database();
  $db = $database->connect();

 $data=json_decode(file_get_contents("php://input"));

  $post = new Psot($db);

  $post->id=$data->id;
  $post->title=$data->title;  
  $post->body=$data->body;  
  $post->auth=$data->auth;
  $post->category_id=$data->category_id;
  $post->expire=$data->expire;
  $post->img_url=$data->img_url;
  if($post->update())
  {
    echo json_encode( array('message'=>'Post  updated'));
  }
  else
  {
    echo json_encode(array('message'=>'error post not updated'));
  }
  
  


  ?>