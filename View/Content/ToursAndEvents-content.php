<!-- Active Events Container -->
<?php 
include_once(__DIR__ . '/../../Controller/ApiController/Post/LookupController.php');
?>


<div class="container ">
    <?php
    if ($matchingPosts === null) {
        echo "<div class='row mb-3'>
                <div class='col'>
                    <div class='alert alert-info' role='alert'>No matching posts found.</div>
                </div>
            </div>";
    } else {
        foreach ($matchingPosts as $post) {
            $img_url = !empty($post["img_url"]) ? htmlspecialchars($post["img_url"]) : '\TibClau\Image\PostIMG\no.jpg';
            ?>
            <div class="row mb-5 p-5 bg-light">
                <div class="col-md-4 ">
                    <!-- Image -->
                    <img src="<?php echo $img_url; ?>" alt="Post Image" class="img-fluid mb-3">
                    <!-- Date -->
                    <div class="news-date">
                        <?php echo htmlspecialchars($post["expire"]); ?><i class="fa fa-calendar" aria-hidden="true" style="margin-left:4px;"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Title -->
                    <h2 class="news-title"><?php echo htmlspecialchars($post["title"]); ?></h2>
                    <!-- Content -->
                    <div class="news-content">
                        <?php echo htmlspecialchars($post["body"]); ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>



<!-- Link to Archive Page -->
<div class="container-fluid text-center">
    <a href="../index.php?route=work" class="btn btn-primary">Check out all the journeys we had</a>
</div>
