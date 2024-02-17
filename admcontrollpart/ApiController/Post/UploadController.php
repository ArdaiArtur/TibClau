<?php
session_start();
$upload_path = '';
if(isset($_FILES['image'])) {
    // File uploaded successfully
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];

    // Check if the file is an image
    $allowed_extensions = array("jpeg", "png", "gif", "jpg");
    $uploaded_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    
    if(in_array($uploaded_extension, $allowed_extensions)) {
        // Move the uploaded file to the desired location
        $upload_directory = '../../../Image/PostIMG/';
        if (!file_exists($upload_directory)) {
            mkdir($upload_directory, 0777, true);
        }

        // Move the uploaded file to the desired location
        $upload_path = $upload_directory . $image_name;
        move_uploaded_file($image_tmp, $upload_path);

        // Add the image URL to the data array
        $data['img_url'] = $upload_path;
    } else {
        echo "Error: Only JPEG, PNG, and GIF images are allowed.";
    }
} else {
    echo "Error: No image uploaded.";
}



$title=isset($_POST['title']) ? $_POST['title'] : '';
$body=isset($_POST['body']) ? $_POST['body'] : '';
$author = isset($_SESSION["adm_username"]) ? $_SESSION["adm_username"] : '';
$category_id=isset($_POST['category_id']) ? $_POST['category_id'] : 0;
$expire=isset($_POST['expire']) ? $_POST['expire'] : null;
if($title!=''&&$body!=''&&$author!=''&&$category_id!=0&&$expire!=null&&$upload_path!='')
{
$data = array(
    'title' => $title,
    'body' => $body,
    'auth' => $author,
    'category_id' => $category_id,
    'expire'=>$expire,
    'img_url' => $upload_path

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