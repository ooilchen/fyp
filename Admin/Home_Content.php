<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard - Home Content</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="../sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include 'sidebar.php'; ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">
        
                        <!-- Topbar -->
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        
                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
        
                            <!-- Topbar Search -->
                            <form
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
        
                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">
        
                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                <li class="nav-item dropdown no-arrow d-sm-none">
                                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-search fa-fw"></i>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                        aria-labelledby="searchDropdown">
                                        <form class="form-inline mr-auto w-100 navbar-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small"
                                                    placeholder="Search for..." aria-label="Search"
                                                    aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
        
                                <!-- Nav Item - Alerts -->
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-bell fa-fw"></i>
                                        <!-- Counter - Alerts -->
                                        <span class="badge badge-danger badge-counter">3+</span>
                                    </a>
                                    <!-- Dropdown - Alerts -->
                                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="alertsDropdown">
                                        <h6 class="dropdown-header">
                                            Alerts Center
                                        </h6>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-file-alt text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">December 12, 2019</div>
                                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-success">
                                                    <i class="fas fa-donate text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">December 7, 2019</div>
                                                $290.29 has been deposited into your account!
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-warning">
                                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">December 2, 2019</div>
                                                Spending Alert: We've noticed unusually high spending for your account.
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </li>
        
                                <!-- Nav Item - Messages -->
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-envelope fa-fw"></i>
                                        <!-- Counter - Messages -->
                                        <span class="badge badge-danger badge-counter">7</span>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="messagesDropdown">
                                        <h6 class="dropdown-header">
                                            Message Center
                                        </h6>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="../images/FB_IMG_1691993414822.jpg"
                                                    alt="...">
                                                <div class="status-indicator bg-success"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                                    problem I've been having.</div>
                                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="../images/nct-doyoung-31.jpeg"
                                                    alt="...">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div>
                                                <div class="text-truncate">I have the photos that you ordered last month, how
                                                    would you like them sent to you?</div>
                                                <div class="small text-gray-500">Jae Chun · 1d</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="../images/UNIMAS-logo.png"
                                                    alt="...">
                                                <div class="status-indicator bg-warning"></div>
                                            </div>
                                            <div>
                                                <div class="text-truncate">Last month's report looks great, I am very happy with
                                                    the progress so far, keep up the good work!</div>
                                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                                    alt="...">
                                                <div class="status-indicator bg-success"></div>
                                            </div>
                                            <div>
                                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                                    told me that people say this to all dogs, even if they aren't good...</div>
                                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                    </div>
                                </li>
        
                                <div class="topbar-divider d-none d-sm-block"></div>
        
                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                        <img class="img-profile rounded-circle"
                                            src="../images/undraw_Female_avatar_efig.png">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Settings
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Activity Log
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>
        
                            </ul>
        
                        </nav>
                        <!-- End of Topbar -->
        
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
        
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Homepage Content</h1>
                            </div>
        
                            <!-- Content Row -->

                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Announcement by Admin</h6>
                                    <div class="col-2 ml-auto text-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newAnnounce" id="newsbyadmin">Create New</button>
                                    </div>
                                </div>
                                
                                <!-- Announcement by Admin -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Content</th>
                                                    <th>Image</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                include 'conn.php';

                                                // Retrieve announcement data from the database
                                                $sql = "SELECT * FROM admin_annnouncement";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    // Output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["announce_id"] . "</td>";
                                                        echo "<td>" . $row["announcement"] . "</td>";
                                                        echo "<td><img src='" . $row["announcement_img"] . "' width='100'></td>";
                                                        echo "<td>" . $row["date_announce"] . "</td>";
                                                        echo "<td>" . $row["date_announce"] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4'>No announcements found. </td></tr>";
                                                }

                                                $conn->close();
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End of announcement by admin -->

                            <!-- Carousel Image -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Carousel Image(Banner)</h6>
                                    <div class="col-2 ml-auto text-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newHomeImg" id="carouselimg">Upload New Image</button>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                include 'conn.php';

                                                // Retrieve announcement data from the database
                                                $sql = "SELECT * FROM home_image";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    // Output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["image_id"] . "</td>";
                                                        echo "<td><img src='" . $row["image_path"] . "' width='100'></td>";
                                                        echo "<td><button class='btn btn-danger' onclick='deleteImage(\"" . $row["image_id"] . "\")'>Delete</button></td>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4'>No announcements found. </td></tr>";
                                                }

                                                $conn->close();
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End of carousel image -->
        
                            <!-- Content Row -->

        
                        </div>
                        <!-- /.container-fluid -->

        
                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Unimas Confession 2023/24</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->


                    
        </div>
        <!-- End of Content Wrapper -->

        <!--Create announcement by admin modal-->
        <div class="modal fade" id="newAnnounce" tabindex="-1" role="dialog" aria-labelledby="newsByAdminLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <!-- <form method = 'POST' enctype='multipart/form-data' action=".php"> -->
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New Announcement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal content goes here -->
                        <div class="col-md-12 mb-3">
                            <label>Announcement</label>
                            <div class="input-group">
                                <textarea class="form-control" name="announcement" id="announcement" ></textarea>
                            </div>`
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Upload image(Optional)</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="admin_image" name="admin_image" accept="image/*" >
                            </div>
                        </div>
                    </div>
                    
                    <div id="alertContainer" ></div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="validateContent()">Submit</button>
                    </div>
                    
                    </div>
                <!-- </form> -->
            </div>
        </div>   
        <!--End of modal-->

        <!--Upload carousel image -->
        <div class="modal fade" id="newHomeImg" tabindex="-1" role="dialog" aria-labelledby="homepageImgLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <!-- <form method = 'POST' enctype='multipart/form-data' action=".php"> -->
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Carousel image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <label>Upload image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="carousel_image" name="carousel_image" accept="image/*" >
                            </div>
                        </div>
                    </div>
                    
                    <div id="errorContainer" ></div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="validateImg()">Submit</button>
                    </div>
                    
                    </div>
                <!-- </form> -->
            </div>
        </div>   
        <!--End of upload image-->       

        

    </div>
    <!-- End of Page Wrapper -->


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>

    // Validate announcement, not empty
    function validateContent() {

        var newAnnounce = document.getElementById("announcement").value; 
        var alertContainer = document.getElementById("alertContainer");

        if (newAnnounce.trim() === '' ) {
            var alertDiv = document.createElement("div");
            alertDiv.className = "alert alert-danger";
            alertDiv.setAttribute("role", "alert");
            alertDiv.innerHTML = `
                Please fill in all fields
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            `;
            // Clear any previous alerts
            while (alertContainer.firstChild) {
                alertContainer.removeChild(alertContainer.firstChild);
            }

            // Append the new alert
            alertContainer.appendChild(alertDiv);

            return false; // Prevent form submission
        }

        // Clear any previous alerts
        while (alertContainer.firstChild) {
            alertContainer.removeChild(alertContainer.firstChild);
        }

        var formData = new FormData();
        formData.append('newAnnounce', newAnnounce);
        
        // Get the file input element
        var fileInput = document.getElementById('admin_image');
        // Check if a file is selected
        if (fileInput.files.length > 0) {
            // Append the file to FormData
            formData.append('admin_image', fileInput.files[0]);
        }

        var xhr = new XMLHttpRequest();
                xhr.open('POST', 'home_add_announce.php', true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Handle successful response from PHP script
                        console.log(xhr.responseText);
                        alert("Announcement is added!");
                        location.reload();
                        
                    } else {
                        // Handle error
                        console.error('Request failed. Status: ' + xhr.status);
                        alert("Please try again later.")
                    }
                };
                xhr.onerror = function() {
                    // Handle network error
                    console.error('Request failed. Network error.');
                };
                xhr.send(formData);
            

        return true; 
    }

    //Validate image not empty
    function validateImg() {

        var errorContainer = document.getElementById("errorContainer");

        var formData = new FormData();

        var fileInput = document.getElementById('carousel_image');

        // Check if a file is selected
        if (fileInput.files.length > 0) {
            // Append the file to FormData
            formData.append('carousel_image', fileInput.files[0]);
        }else{

            var alertDiv = document.createElement("div");
            alertDiv.className = "alert alert-danger";
            alertDiv.setAttribute("role", "alert");
            alertDiv.innerHTML = `
                Please select an image
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            `;
            // Clear any previous alerts
            while (errorContainer.firstChild) {
                errorContainer.removeChild(errorContainer.firstChild);
            }
            // Append the new alert
            errorContainer.appendChild(alertDiv);

            return false; // Prevent form submission
        }

        var xhr = new XMLHttpRequest();
                xhr.open('POST', 'home_img.php', true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Handle successful response from PHP script
                        console.log(xhr.responseText);
                        alert("Image saved!");
                        location.reload();
                        
                    } else {
                        // Handle error
                        console.error('Request failed. Status: ' + xhr.status);
                        alert("Please try again later.")
                    }
                };
                xhr.onerror = function() {
                    // Handle network error
                    console.error('Request failed. Network error.');
                };
                xhr.send(formData);
            

        return true; 
    }

    function deleteImage(image_id) {
        if (confirm("Are you sure you want to delete this image?")) {
            // Call a PHP script to delete the image
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_image.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Handle successful response from PHP script
                    console.log(xhr.responseText);
                    alert("Image deleted successfully!");
                    location.reload(); // Reload the page to reflect changes
                } else {
                    // Handle error
                    console.error('Request failed. Status: ' + xhr.status);
                    alert("Failed to delete image. Please try again later.");
                }
            };
            xhr.onerror = function() {
                // Handle network error
                console.error('Request failed. Network error.');
            };
            // Send the image_id to the PHP script for deletion
            xhr.send('image_id=' + image_id);
        }
    }

    </script>
      


</body>
</html>