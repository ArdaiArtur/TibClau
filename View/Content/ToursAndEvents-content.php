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
            <div class="row mb-5 p-5 bg-light rounded">
                <div class=" col-md -12 text-center">
                    <!-- Title -->
                    <h2 class="news-title"><?php echo htmlspecialchars($post["title"]); ?></h2>
                    <hr>
                </div>
                <div class="col-md-12 text-center rounded">
                    <!-- Image -->
                    <img src="<?php echo $img_url; ?>" alt="Post Image" class="img-fluid mb-3 rounded">
                    
                </div>
                <div class="col-md-12">
                    
                    <!-- Content -->
                    <div class="news-content">
                        <?php echo htmlspecialchars($post["body"]); ?>
                    </div>
                    <!-- Date -->
                    <div class="news-date text-end">
                      Date of the trip:  <?php echo htmlspecialchars($post["expire"]); ?><i class="fa fa-calendar" aria-hidden="true" style="margin-left:4px;"></i>
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
