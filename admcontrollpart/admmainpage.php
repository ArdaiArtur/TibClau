<?php
session_set_cookie_params(600); 
session_start();

include_once 'ApiController\Post\LookupController.php';

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="bg-secondary">

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
       <?php include_once 'Sidebar.php'; ?>
        <!-- End Sidebar -->

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="container">
                <div class="row">
                    <?php
                    if ($matchingPosts === null) {?>
                        <div class='col-2 mb-3'><a href='#' class='list-group-item list-group-item-action disabled'>No matching posts found.</a></div>
                    <?php } else {
                        foreach ($matchingPosts as $post) {  $img_url = !empty($post["img_url"]) ? htmlspecialchars($post["img_url"]) : '\TibClau\Image\PostIMG\no.jpg';?>
                            <div class='col-lg-2 mb-3'>
                                <button type='button' class='list-group-item list-group-item-action' data-post-id='<?php echo htmlspecialchars($post["id"]); ?>' posturl='<?php echo htmlspecialchars($post["img_url"]); ?>'>
                                    <img src='<?php echo'../' . htmlspecialchars($post["img_url"]); ?>' alt='Post Image' class='img-fluid'>
                                    <h3 class='mb-1' ><?php echo htmlspecialchars($post["title"]); ?></h3>
                                </button>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </main>

<script>
    // Get the list group element
    const postList = document.querySelector('.container');

    // Get the element where the selected post ID will be displayed
    const selectedPostIdElement = document.getElementById('selectedPostId');
    const selectedPostUrlElement=document.getElementById('selectedPostUrl');
    // Add click event listener to the list group
    postList.addEventListener('click', function(event) {
        // Find the closest ancestor button element with the class 'list-group-item'
        const listItemButton = event.target.closest('.list-group-item');

        // Check if a list-group-item button was clicked
        if (listItemButton) {
            // Get the data-post-id attribute value of the closest button element
            const postId = listItemButton.getAttribute('data-post-id');
            const posturl=listItemButton.getAttribute('posturl');
            // Update the selected post ID element
            selectedPostIdElement.textContent = "Selected Post ID: " + postId;
            selectedPostUrlElement.textContent=posturl;
        }
    });

    function submitForm() {
    // Create a form element
    var form = document.createElement('form');
    form.setAttribute('action', '../admcontrollpart/ApiController/Post/DeleteController.php'); // Change to your PHP file path
    form.setAttribute('method', 'get');

    // Create an input field for post ID
    var postIdInput = document.createElement('input');
    postIdInput.setAttribute('type', 'hidden'); // Hidden input
    postIdInput.setAttribute('id', 'postId');
    postIdInput.setAttribute('name', 'postId');
    postIdInput.setAttribute('value', selectedPostIdElement.textContent.split(' ')[3]); // Get post ID from the selectedPostIdElement

    // Create an input field for post URL
    var postUrlInput = document.createElement('input');
    postUrlInput.setAttribute('type', 'hidden'); // Hidden input
    postUrlInput.setAttribute('name', 'postUrl');
    postUrlInput.setAttribute('value', selectedPostUrlElement.textContent);

    // Append input fields to the form
    form.appendChild(postIdInput);
    form.appendChild(postUrlInput);

    // Append form to the document body
    document.body.appendChild(form);

    // Submit the form
    form.submit();
}
</script>


        <!-- End Main Content -->
    </div>
</div>


    <!-- End Update Modal -->

    

<script>
    document.getElementById('signOutBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        // Send an AJAX request to logout
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/TibClau/admcontrollpart/destroy_session.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Redirect to login page after successful logout
                window.location.href = '/TibClau/admcontrollpart/admlogadm.php';
            }
        };
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
