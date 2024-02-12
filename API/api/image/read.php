<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization,X-Requested-With');

include_once '../../Config/Database.php';
include_once '../../Models/Image.php';

$database = new Database();
$db = $database->connect();

$image = new Image($db);

// Get post ID from URL
$image->post_id = isset($_GET['post_id']) ? $_GET['post_id'] : die();

$result = $image->read($image->post_id);
$num = $result->rowCount();

if ($num > 0) {
    $image_arr = array();
    $image_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $image_item = array(
            'id' => $id,
            'post_id' => $post_id,
            'image_url' => $image_url,
            'created_at' => $created_at
        );

        array_push($image_arr['data'], $image_item);
    }

    echo json_encode($image_arr);
} else {
    echo json_encode(array('message' => 'No images found for the specified post ID.'));
}
?>
