<?php 
  
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization,X-Rquested-With');

  include_once '../../Config/Database.php';
  include_once '../../Models/Image.php';

  $database = new Database();
  $db = $database->connect();

  $image=new Image($db);
  $data=json_decode(file_get_contents("php://input"));
  $image->post_id=$data->post_id;
  $image->image_url=$data->image_url;
  if($image->create())
  {
    echo json_encode( array('message'=>'Post Created'));
  }
  else
  {
    echo json_encode(array('message'=>'error post not created'));
  }
  
  


?>