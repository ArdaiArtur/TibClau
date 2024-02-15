<?php
// Define the data to be sent to the API endpoint
$data = array(
    'post_id' => 1, // Example post ID
    'image_url' => 'https://example.com/image.jpg' // Example image URL
);

// Encode the data as JSON
$json_data = json_encode($data);

// Set the URL of the API endpoint
$url = 'https://localhost/TibClau/API/api/image/create.php';

// Initialize a cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json_data)
));

// Execute the cURL request and get the response
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

// Close the cURL session
curl_close($ch);
?>
