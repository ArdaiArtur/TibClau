<?php
session_start();
$title=isset($_POST['title']) ? $_POST['title'] : '';
$body=isset($_POST['body']) ? $_POST['body'] : '';
$author = isset($_SESSION["adm_username"]) ? $_SESSION["adm_username"] : '';
$category_id=isset($_POST['category_id']) ? $_POST['category_id'] : 0;
$expire=isset($_POST['expire']) ? $_POST['expire'] : null;
if($title!=''&&$body!=''&&$author!=''&&$category_id!=0&&$expire!=null)
{
$data = array(
    'title' => $title,
    'body' => $body,
    'auth' => $author,
    'category_id' => $category_id,
    'expire'=>$expire


);

// Encode the data as JSON
$json_data = json_encode($data);

// Set the URL of the API endpoint
$url = 'https://localhost/TibClau/API/api/post/create.php';

// Initialize a cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
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
}
else if($title=='')
{
echo("no title");
}
else if($body=='')
{
    echo("no body");
}
else if($author=='')
{
    echo("no author");
}
else if($category_id==0)
{
    echo("no chategory id");
}
else if($expire==null)
{
    echo("no date");
}
header("location: /TibClau/admcontrollpart/admmainpage.php");
?>