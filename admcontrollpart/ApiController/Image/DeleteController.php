<?php

// API endpoint URL
$url = "https://localhost/TibClau/API/api/image/delete.php";

// Data to be sent in the request
$data = array(
    'post_id' => 1 // Specify the post ID for which you want to delete the images
);

// Initialize cURL session
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "DELETE",
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
