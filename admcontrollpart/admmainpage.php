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
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 bg-dark sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            Create Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Update Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Delete Post
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Sidebar -->

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h1 class="mt-4">Welcome to the Admin Dashboard</h1>
            <p>This is the main content area where you can view, create, update, and delete posts.</p>
        </main>
        <!-- End Main Content -->
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
