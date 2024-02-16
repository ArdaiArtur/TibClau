<?php

$url = "https://localhost/TibClau/API/api/post/read.php";
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';//daca are valoare primeste valoare daca nu nu
//curl request pentru api
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
//executa si verifica daca e o eroare
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
//ia datele daca nu e null
$data = json_decode($response, true);
if (isset($data['data'])) {
    $dataok = $data['data']; // access the data array
} else {
    $dataok = $data;
}


//cauta dupa titlu si author
function getMatchingPosts($posts, $searchTerm) {
    $matching = array();
    foreach ($posts as $post) {
        if (stripos($post["title"], $searchTerm) !== false || stripos($post["author"], $searchTerm) !== false) {
            $matching[] = $post;
        }
    }
    if (empty($matching)) {
        return null; // No matching posts found
    } else {
        return $matching;
    }
}
//afiseaza ce gaseste
$matchingPosts = getMatchingPosts($dataok, $searchTerm);
/*
if ($matchingPosts === null) {
    echo "No matching posts found.";
} else {
    foreach ($matchingPosts as $post) {
        echo "<h3>" . htmlspecialchars($post["title"]) . "</h3>";
        echo "<p>" . htmlspecialchars($post["body"]) . "</p>";
        echo "<p>By " . htmlspecialchars($post["author"]) . "</p>";
        echo "<hr>";
    }
}
*/
?>
