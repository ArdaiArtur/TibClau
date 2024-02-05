<!-- template.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle=empty($pageTitle)?"TibClau":$pageTitle; ?></title>
</head>
<body>
    <?php include 'Content\Header.html'; ?>

    <!-- Content of your webpage -->
    <?php include $pageContent; ?>

    <?php include 'Content\Footer.html'; ?>
</body>
</html>