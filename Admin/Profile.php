<?php

    include 'conn.php';

    // Set session timeout to 30 minutes (1800 seconds)
    ini_set('session.gc_maxlifetime', 180);
    session_start();

    // Redirect to login page if user is not logged in
    if (!isset($_SESSION['username'])) {
        header("Location: Sign_In.php");
        exit();
    }

    $username = $_SESSION['username'];

    // Fetch user details from the database
    $stmt = $conn->prepare("SELECT user_id, username, email, profile_pic FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();


    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Profile</title>

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

                        <!-- Logout modal -->
                        <div class="modal fade" id="logoutConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="logoutConfirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="logoutConfirmationModalLabel">Confirm Logout</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to logout?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" onclick="logout()">Logout</button>
                                    </div>
                                </div>
                            </div>
                        </div>

        
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
        
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                                        </div>
                                        <div class="card-body">
                                            <form id="editProfileForm" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="profile_pic">Profile Picture</label>
                                                    <div class="mb-3">
                                                        <img src="<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Current Profile Picture" class="img-thumbnail" width="150" height="150">
                                                    </div>
                                                    <label for="profile_pic">Profile Picture (Only .jpg, .jpeg, .png, .gif)</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" id="profile_pic" name="profile_pic" accept=".jpg, .jpeg, .png, .gif">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="useid">User ID</label>
                                                    <input type="text" class="form-control" id="userid" name="userid" value="<?php echo htmlspecialchars($user['user_id']); ?>" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">New Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Confirm New Password</label>
                                                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    </div>
    <!-- End of Page Wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-notify@latest/dist/bootstrap-notify.min.js"></script>


    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

    <script>

    document.getElementById('editProfileForm').addEventListener('submit', function (event) {
        event.preventDefault(); 
        
        // Fetch the form data
        const form = event.target;
        const formData = new FormData(form);
        
        // Perform client-side validation
        const password = formData.get('password');
        const confirmPassword = formData.get('confirmpassword');
        
        if (password !== confirmPassword) {
            showNotification('top', 'right', 'Passwords do not match', 'warning');
            return;
        } for (let [key, value] of formData.entries()) {
        console.log(`${key}: ${value}`);
    }


        // If validation passes, send the data using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'profile_update.php', true); // Update the URL as needed
        
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert('Profile updated successfully.');
                console.log(xhr.status);
                // Optionally, redirect or update the page content
            } else {
                alert('An error occurred while updating the profile.');
            }
        };
        
        xhr.onerror = function () {
            alert('An error occurred while sending the request.');
        };
        
        xhr.send(formData);
    });

    function showNotification(from, align, message, type) {
    $.notify({
      icon: "fas fa-check-circle",
      message: message
    }, {
      type: type,
      timer: 4000,
      placement: {
        from: from,
        align: align
      }
    });
}

    </script>

</body>
</html>