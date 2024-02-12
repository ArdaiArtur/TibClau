<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include_once '../../Config/Database.php';
include_once '../../Models/Image.php';

// Instantiate the database connection
$database = new Database();
$db = $database->connect();

// Instantiate the Image object
$image = new Image($db);

// Parse incoming JSON data
$data = json_decode(file_get_contents("php://input"));

// Check if the required fields are present in the JSON data
if (!empty($data->post_id) && !empty($data->image_url)) {
    // Set properties of the Image object
    $image->post_id = $data->post_id;
    $image->image_url = $data->image_url;

    // Attempt to update the image record
    if ($image->update()) {
        echo json_encode(array('message' => 'Image updated successfully'));
    } else {
        echo json_encode(array('message' => 'Failed to update image'));
    }
} else {
    // Return an error message if required fields are missing
    echo json_encode(array('message' => 'Missing required fields'));
}
