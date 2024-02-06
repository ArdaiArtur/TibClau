<!-- template.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : "TibClau"; ?></title>
</head>
<body>
    <?php include 'Content/Header.html'; ?>

    <!-- Content of your webpage -->
    <?php
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
</body>
</html>
