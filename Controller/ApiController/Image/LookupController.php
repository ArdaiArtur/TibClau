<?php

// Specify the post ID for which you want to retrieve images
$postId = isset($_GET['post_id']) ? $_GET['post_id'] : '';

// Construct the API endpoint URL with the post ID as a parameter
$url = "https://localhost/TibClau/API/api/image/read.php?post_id=" . $postId;

// Make a cURL request to the image API endpoint
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
]);

$response = curl_exec($curl);
$err = curl_error($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} elseif ($httpCode != 200) {
    echo "HTTP Error: " . $httpCode;
} else {
    // echo $response;
}

// Decode the API response
$data = json_decode($response, true);

// Check if the response contains image data
if (isset($data['data'])) {
    $images = $data['data']; // Access the image data array
    // Now you can iterate over the $images array to display or process each image
} else {
    // Handle the case where no images are found for the specified post
    echo "No images found for post ID: " . $postId;
}

?>