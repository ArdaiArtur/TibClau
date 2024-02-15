<!-- template.php -->
<?php 
session_start();

// Check if the session variables exist and have the expected values
if (isset($_SESSION["adm_id"]) && isset($_SESSION["adm_username"])) {
    $userId = $_SESSION["adm_id"];
    $username = $_SESSION["adm_username"];
    // Add similar checks for other session variables if needed

    // Output the values for verification
    echo "User ID: $userId<br>";
    echo "Username: $username<br>";
    // Output other session variables as needed
} else {
    echo "Session variables not set or incomplete.";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/TibClau/View/Content/Extracss/header.css">
    <title><?php echo isset($pageTitl) ? htmlspecialchars($pageTitl) : "TibClau"; ?></title>
</head>
<body>
    <?php include 'Content/Header.html'; ?>
    
    <!-- Content of your webpage -->
    <?php
    if(!empty($pageTitle) && !empty($imgName)) {
        include 'Content/StartImg.php';
    }
    // Load page content
    if (isset($pageContent)) {
        $contentPath = 'Content/' . $pageContent;
        if (file_exists($contentPath)) {
            include $contentPath;
        } else {
            echo "Error: Page content '$pageContent' not found.";
        }
    } else {
        echo "Error: Page content not specified.";
    }
    ?>

    <?php include 'Content/Footer.html'; ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>
