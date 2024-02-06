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
    if (isset($pageContent) && file_exists($pageContent)) {
        include $pageContent;
    } else {
        echo "Error: Page content not found.";
    }
    ?>

    <?php include 'Content/Footer.html'; ?>
</body>
</html>
