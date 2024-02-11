<?php 
  
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../Config/Database.php';
  include_once '../../Models/Post.php';

  
  $database = new Database();
  $db = $database->connect();

 
  $post = new Psot($db);

  
  $post->id = isset($_GET['id']) ? $_GET['id'] : die();

 
  $post->read_single();

  
  $post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->auth,
    'category_id' => $post->category_id,
    'expire'=>$post->expire,
    'category_name' => $post->category_name
    
  );

 
  print_r(json_encode($post_arr));

?>
