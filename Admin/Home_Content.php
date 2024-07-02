<?php

    // Set session timeout to 30 minutes (1800 seconds)
    ini_set('session.gc_maxlifetime', 180);
    session_start();


    // Redirect to login page if user is not logged in
    if (!isset($_SESSION['username'])) {
        header("Location: Sign_In.php");
        exit();
    }

    include 'conn.php';

    $conn->close();
?>

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
                        <?php include 'navbar.php'; ?>
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

                                                // Check if the query was successful and contains rows
                                                if ($result && $result->num_rows > 0) {
                                                    // Fetch the single record
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["announce_id"] . "</td>";
                                                        echo "<td>" . $row["announcement"] . "</td>";
                                                        echo "<td><img src='" . $row["announcement_img"] . "' width='150'></td>";
                                                        echo "<td>" . $row["date_announce"] . "</td>";
                                                        echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#editAnnounce' data-id='" . $row["announce_id"] . "' data-content='" . htmlspecialchars($row["announcement"], ENT_QUOTES) . "' data-img='" . $row["announcement_img"] . "' id='newsbyadmin'>Edit</button></td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='5'>No announcements found.</td></tr>";
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End of announcement by admin -->
                            </div>

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
                                                        echo "<td><a href='" . $row["image_path"] . "' target='_blank'><img src='" . $row["image_path"] . "' width='100'></a></td>";
                                                        echo "<td><button class='btn btn-danger' onclick='deleteImage(\"" . $row["image_id"] . "\")'>Delete</button></td>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4'>No image found. </td></tr>";
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

        <!-- Edit Announcement Modal -->
        <div class="modal fade" id="editAnnounce" tabindex="-1" role="dialog" aria-labelledby="editAnnouncementModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form id="editAnnouncementForm" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAnnouncementModalLabel">Edit Announcement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="announcementId" name="announcementId">
                            <div class="col-md-12 mb-3">
                                <label for="announcementContent">Content:</label>
                                <div class="input-group">
                                    <textarea class="form-control" id="announcementContent" name="announcementContent"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="announcementImageLink">Image Link:</label>
                                <div class="input-group">
                                    <a id="announcementImageLink" href="#" target="_blank"></a>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="announcementImage">Change Image:</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="announcementImage" name="announcementImage">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Edit Announcement Modal -->                                    

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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>

    // ------Validate image not empty------
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

    // ------Delete announcement image------
    function deleteImage(image_id) {
        if (confirm("Are you sure you want to delete this image?")) {
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_image.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    
                    console.log(xhr.responseText);
                    alert("Image deleted successfully!");
                    location.reload(); 
                } else {
                    
                    console.error('Request failed. Status: ' + xhr.status);
                    alert("Failed to delete image. Please try again later.");
                }
            };
            xhr.onerror = function() {
                
                console.error('Request failed. Network error.');
            };
            
            xhr.send('image_id=' + image_id);
        }
    }

    // ------Populate data in modal-------
    document.addEventListener('DOMContentLoaded', function() {
        $('#editAnnounce').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var content = button.data('content');
            var img = button.data('img');

            // Update the modal's content
            var modal = $(this);
            modal.find('#announcementId').val(id);
            modal.find('#announcementContent').val(content);
            modal.find('#announcementImageLink').attr('href', img).text(img);
        });

        // -------Update announcment by admin------
        $('#editAnnouncementForm').on('submit', function(event) {
            event.preventDefault();
            
            var formData = new FormData(this);

            $.ajax({
                url: 'admin_update.php', 
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle the response from the server
                    alert(response);
                    // Close the modal
                    $('#editAnnounce').modal('hide');
                    // Optionally reload the page or the table to reflect the changes
                    location.reload();
                },
                error: function() {
                    alert('There was an error updating the announcement.');
                }
            });
        });
    });


    </script>
      


</body>
</html>