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

    <title>Dashboard - Category</title>

    <!-- Custom styles for this template-->
    <link href="../sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

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
                                <h1 class="h3 mb-0 text-gray-800">Confession Category</h1>
                                
                            </div>
        
                            <!-- Content Row -->

                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                                        <div class="col-2 ml-auto text-right">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCategory" id="newCat">Create New</button>
                                        </div>
                                </div>
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Category ID</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                
                                                include 'conn.php';

                                                $sql = "SELECT * FROM `category`";

                                                $result = $conn->query($sql);

                                                // Check if any rows were returned
                                                if ($result->num_rows > 0) {
                                                    // Output data into the HTML table
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["category_id"] . "</td>";
                                                        echo "<td>" . $row["category_name"] . "</td>";
                                                        echo "<td>" . $row["category_desc"] . "</td>";
                                                        echo "<td>" . ($row["status"] == '1' ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>') . "</td>";
                                                        echo "<td><button class='btn btn-primary' onclick='toggleStatus(\"" . $row["category_id"] . "\", \"" . $row["status"] . "\")'>Change Status</button></td>";
                                                        echo "<td><button class='btn btn-danger' onclick='deleteCategory(\"" . $row["category_id"] . "\")'>Delete</button></td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='3'>No data found</td></tr>";
                                                }

                                                // Close connection
                                                $conn->close();
                                            ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
        
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

        <!--Create Category modal-->
        <div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="newCategoryLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <!-- <form method = 'POST' enctype='multipart/form-data' action=".php"> -->
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal content goes here -->
                        <div class="col-md-12 mb-3">
                            <label>Category title</label>
                            <div class="input-group">
                                <textarea class="form-control" name="cat_name" id="cat_name" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <div class="input-group">
                                <textarea class="form-control" name="catDesc" id="catDesc" ></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div id="alertContainer" ></div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="validateCat()">Submit</button>
                    </div>
                    
                    </div>
                <!-- </form> -->
            </div>
        </div>   
        <!--End of modal-->

        

    </div>
    <!-- End of Page Wrapper -->


    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>

    function validateCat() {

        var newCat = document.getElementById("cat_name").value; 
        var catDesc = document.getElementById("catDesc").value;
        var alertContainer = document.getElementById("alertContainer");

        if (newCat.trim() === '' || catDesc.trim() === '') {
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
        formData.append('newCat', newCat);
        formData.append('catDesc', catDesc); 
        var xhr = new XMLHttpRequest();
                xhr.open('POST', 'category_add.php', true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Handle successful response from PHP script
                        console.log(xhr.responseText);
                        alert("New category is added!");
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

    function toggleStatus(categoryId, currentStatus) {
    var newStatus = currentStatus === '1' ? '0' : '1'; 

    $.ajax({
        type: 'POST',
        url: 'update_category_status.php',
        data: JSON.stringify({ category_id: categoryId, new_status: newStatus }), 
        contentType: 'application/json', 
        dataType: 'json', 
        success: function(response) {
            
            if (response.status === 'success') {
                console.log(response.message);
                location.reload();
                
            } else {
                console.error(response.message);
                
            }
        },
        error: function(xhr, status, error) {
            
            console.error('Error:', xhr.responseText); 
        }
    });
}


function deleteCategory(cat_id) {
      if(confirm('Are you sure you want to delete this category?')) {
        $.ajax({
          type: 'POST',
          url: 'delete_cat.php', // The PHP script to handle the request
          data: { cat_id: cat_id },
          success: function(response) {
            alert(response);
            location.reload(); // Reload the page to see the changes
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      }
    }

    </script>
      


</body>
</html>