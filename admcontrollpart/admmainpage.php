<?php 
session_start();


// Check if the session variables exist and have the expected values
if (!isset($_SESSION["adm_id"]) || !isset($_SESSION["adm_username"])) {
    // Redirect to the login page if not logged in
    header("Location:/TibClau/admcontrollpart/admlogadm.php"); // replace 'login.php' with the actual login page URL
    exit();
}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Admin Panel</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                        Customers
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown pb-5 ">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#person-circle"></use></svg>
        <strong>mdo</strong>
    </button>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Change Password</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign Out</a></li>
    </ul>
</div>
        </div>
        <!-- End Sidebar -->

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h1 class="mt-4">Welcome to the Admin Dashboard</h1>
            <p>This is the main content area where you can view, create, update, and delete posts.</p>
        </main>
        <!-- End Main Content -->
    </div>
</div>

<script>
    window.addEventListener('beforeunload', function(event) {
        // Send an AJAX request to destroy the session
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/TibClau/admcontrollpart/destroy_session.php', true);
        xhr.send();
    });
</script>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>
