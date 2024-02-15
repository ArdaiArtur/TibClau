<?php

// API endpoint URL
$url = "https://localhost/TibClau/API/api/image/update.php";

// Data to be sent in the request
$data = array(
    'id' => 1, // Specify the image ID you want to update
    'post_id' => 1, // Specify the post ID for which the image belongs
    'image_url' => "https://example.com/new_image.jpg" // Specify the new image URL
);

// Initialize cURL session
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "PUT",
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    )
));

// Execute cURL request
$response = curl_exec($curl);

// Check for errors
if ($response === false) {
    echo "Error: " . curl_error($curl);
} else {
    // Print response
    echo $response;
}

// Close cURL session
curl_close($curl);

?>
