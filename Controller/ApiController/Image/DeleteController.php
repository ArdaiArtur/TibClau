<?php
$url="https://localhost/PHP%20REST%20API%20tutorial/api/post/delete.php";
$post_id =isset($_GET['id']) ? $_GET['id'] : 0;
 if($post_id!=0){
$data = array('id' => $post_id);
$json_data = json_encode($data);
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json_data)
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Send the request and get the response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Print the response
    var_dump($response);
}

// Close the cURL resource
curl_close($ch);
 }
?>