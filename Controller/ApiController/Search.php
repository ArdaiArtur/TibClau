<?php
 require_once 'Lookup.php';
/*$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://localhost/PHP%20REST%20API%20tutorial/api/post/read.php", 
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
$data = json_decode($response, true);
//var_dump($data);
if (isset($data['data'])) 
    $dataok = $data['data']; // access the data array
$postId = 3;
$postBody = getPostBodyById($postId, $dataok);


function getPostBodyById($id, $posts) {
    foreach ($posts as $post) {
        if (isset($post["id"]) && $post["id"] == $id) {
            return $post["body"];
        }
    }
    return null; // Post with given ID not found
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
</head>
<link rel="stylesheet" href="plus.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<div style="display:flex;">
  <div class="d-flex">
    <!-- This is where the sidebar content goes -->
    <?php require_once('nav.html');?> 
  </div>
  <div class="d-flex flex-column bd-highlight mb-3 sidebar-padding">
    <!-- This is where the main content goes -->
    <form id=formSearch action="Search.php" method="GET">
<input id="search" name="search" type="text" placeholder="Type here">
<input id="submit" type="submit" value="Search">
</form>
  
  <?php
  if ($matchingPosts === null) {
      echo "No matching posts found.";
  } else {
      foreach ($matchingPosts as $post) {
          echo "<div>";
          echo "<h3>" . htmlspecialchars($post["title"]) . "</h3>";
          echo "<p>" . htmlspecialchars($post["body"]) . "</p>";
          echo "<p>By " . htmlspecialchars($post["author"]) . "  ID " . htmlspecialchars($post["id"]) . "</p>";
          echo "<hr>";
          echo "</div>";
      }
  }
  ?>
 
  </div>
</div>
</body>
</html>
