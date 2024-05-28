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
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        
        
                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">
        
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
            

        return true; // Allow form submission
    }

    async function reply_click({
			id,
			status_cat
		}) {

            var newId = id.replace('switchbtn', '');
            var newStatus;

            var body = {
               id: newId,
               status_cat: newStatus
			   }

            rawResponse = await fetch('update_category_status.php', {
				async: false,
				method: 'POST',
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
				},
				body: JSON.stringify(body)
			   });
            const content = await rawResponse.json();

            alert("Your status has been changed.");
            window.location.reload();
    }

    function toggleStatus(categoryId, currentStatus) {
    var newStatus = currentStatus === '1' ? '0' : '1'; // Toggle status
    // Send AJAX request to update status
    $.ajax({
        type: 'POST',
        url: 'update_category_status.php',
        data: JSON.stringify({ category_id: categoryId, new_status: newStatus }), // Match variable names
        contentType: 'application/json', // Specify content type
        dataType: 'json', // Expect JSON response
        success: function(response) {
            // Handle JSON response
            if (response.status === 'success') {
                console.log(response.message);
                location.reload();
                // Update UI or do something else
            } else {
                console.error(response.message);
                // Handle error
            }
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error('Error:', xhr.responseText); // Log the full response text
        }
    });
}




    </script>
      


</body>
</html>