<div class="container-fluid p-0 mb-5 overflow-hidden d-flex justify-content-center align-items-center">
    <div class="row">
        <!-- Vertical image to take you to the screen vertically -->
        <div class="col-12 p-0 position-relative">
            <img src="\TibClau\Image\<?php echo htmlspecialchars($imgName); ?>.jpg" class="img-fluid rounded" alt="Vertical Image" style="width: 100%; height: auto; max-height: 600px;">
            <!-- H1 heading on top of the image -->
            <h1 class="position-absolute w-100 text-center text-white display-3 black-outline" style="top: 50%; transform: translateY(-50%);"><?php echo isset($pageTitle) ? $pageTitle : "Default Title"; ?></h1>
        </div>
    </div>
</div>
