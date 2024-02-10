
<div class=""> 
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Introductory Text -->
        <div class="col-md-4 mt-5">
            <div class="card" style="background-image: linear-gradient(to bottom right, #d7f0fa, #e1fae1);">
                <div class="card-body">
                    <h2 class="card-title">Have a Question?</h2>
                    <p>If you have any questions or concerns, please feel free to send us a message using the form below.</p>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="col-md-4 mb-5 mt-5">
            <div class="card" style="background-image: linear-gradient(to bottom right, #d7f0fa, #e1fae1);">
                <div class="card-body">
                    <h2 class="card-title">Contact Information</h2>
                    <p><strong>Address:</strong> </p>
                    <p><strong>Phone:</strong> </p>
                    <p><strong>Email:</strong> </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form -->
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-image: linear-gradient(to bottom right, #d7f0fa, #e1fae1);">
                <div class="card-body">
                    <h2 class="card-title">Contact Us</h2>
                    <form action="../Controller/ContactController.php" method="post">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn btn-outline-light rounded-pill" style="width:200px;">Submit <i class="fas fa-arrow-right"></i></button>
                        </div>
                        <div class="text-center mt-1">
                            <?php
                            if (isset($_GET['error'])) {
                                $errorMessage = $_GET['error'];
                                echo "<h3 class='text-danger'>$errorMessage</h3>";
                            }

                            // Check for success messages
                            if (isset($_GET['success'])) {
                                $successMessage = $_GET['success'];
                                echo "<h3 class='text-success'>$successMessage</h3>";
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2718.919927272127!2d21.902554676884765!3d47.041802026808035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474647c1dbf4e675%3A0xf29fb8f73c1d2926!2sClub%20sportiv%20Tibclau!5e0!3m2!1sro!2sro!4v1707244463231!5m2!1sro!2sro" width="800" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
</div>


