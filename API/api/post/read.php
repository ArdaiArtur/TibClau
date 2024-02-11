<?php


header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../../Config/Database.php';
include_once '../../Models/Post.php';

$database =new Database();
$db=$database->connect();

$post=new Psot($db);

$resul=$post->read();
$num=$post->read()->rowCount();

if($num>0)
{
    $posts_arr=array();
    $posts_arr['data']=array();

    while($row=$resul->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
        $post_item=array(
            'id'=>$id,
            'title'=>$title,
            'body'=>html_entity_decode($body),
            'author'=>$author,
            'category_id'=>$category_id,
            'expire'=>$post->expire,
            'category_name'=>$category_name
            


        );

        array_push($posts_arr['data'],$post_item);
        
    }
    echo json_encode($posts_arr);
}
else
{
    echo json_encode(array('message' => 'No Post Found'));


}

?>
