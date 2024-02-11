<?php 
  
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization,X-Rquested-With');

  include_once '../../Config/Database.php';
  include_once '../../Models/Post.php';

  
  $database = new Database();
  $db = $database->connect();

 $data=json_decode(file_get_contents("php://input"));

  $post = new Psot($db);

  $post->id=$data->id;

  if($post->delete())
  {
    echo json_encode( array('message'=>'Post  deleted'));
  }
  else
  {
    echo json_encode(array('message'=>'error post fail'));
  }
 


  ?>