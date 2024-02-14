<?php
$id=isset($_POST['ID']) ? $_POST['ID'] : 0;
$title=isset($_POST['title']) ? $_POST['title'] : '';
$body=isset($_POST['body']) ? $_POST['body'] : '';
$author=isset($_POST['auth']) ? $_POST['auth'] : '';
$category_id=isset($_POST['category_id']) ? $_POST['category_id'] : 0;
$expire=isset($_POST['expire']) ? $_POST['expire'] : null;
if($title!=''&&$body!=''&&$author!=''&&$category_id!=0&&$id!=0&&$expire!=null)
{
$data = array(
    'title' => $title,
    'body' => $body,
    'auth' => $author,
    'category_id' => $category_id,
    'id'=>$id,
    'expire'=>$expire

);

// Encode the data as JSON
$json_data = json_encode($data);


$url = 'https://localhost/TibClau/API/api/image/update.php';

// start cUel
$ch = curl_init();

// setaza cURL le setezi la ce ai nevoie
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json_data)
));

// executa curl ul
$response = curl_exec($ch);

// daca exista errori
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

//close curl
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
else if($id==0)
{
    echo("no id");
}
else if($expire==null)
{
    echo("no date");
}

?>