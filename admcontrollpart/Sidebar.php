<div class="col-md-3 col-lg-2 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark position-fixed vh-100">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Admin Panel</span>
            </a>
            <hr>
            <div id="selectedPostId"></div>
            <div id ="selectedPostUrl"></div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <!-- Your existing menu items -->
               
                <!-- Add upload, update, delete buttons -->
                <li class="nav-item">
                        <button class="btn btn-light text-dark mb-2 btn-block" data-toggle="modal" data-target="#uploadModal"><i class="fas fa-upload"></i> Upload</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-light text-dark mb-2 btn-block" data-toggle="modal" data-target="#updateModal"><i class="fas fa-edit"></i> Update</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-light text-dark mb-2 btn-block" onclick="submitForm()"><i class="fas fa-trash-alt"></i> Delete</button>
                    </li>
            </ul>
            <hr>
            <div class="dropdown pb-5">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#person-circle"></use></svg>
                    <strong><?php echo $username; ?></strong>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" id="signOutBtn">Sign Out</a></li>
                </ul>
            </div>
        </div>
<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Create Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="../admcontrollpart/ApiController/Post/UploadController.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" id="body" name="body"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="">Select Category</option>
                            <option value="1">Event</option>
                            <option value="2">Text</option>
                            <option value="3">Notice</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="expire">Expiration Date</label>
                        <input type="date" class="form-control" id="expire" name="expire">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <!-- End Upload Modal -->

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <!-- Update modal content -->
        </div>
    </div>

