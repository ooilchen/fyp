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
$stmt = $conn->prepare("SELECT * FROM admin WHERE admin_username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fetch pending admin requests
$pending_stmt = $conn->prepare("SELECT * FROM admin WHERE approved = 0");
$pending_stmt->execute();
$pending_requests = $pending_stmt->get_result();

// Fetch approved admins
$approved_stmt = $conn->prepare("SELECT * FROM admin WHERE approved = 1");
$approved_stmt->execute();
$approved_admins = $approved_stmt->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Requests</title>

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

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Admin Requests</h6>
                                        </div>
                                        <div class="card-body">
                                            <h4>Pending Requests</h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="pendingTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Admin ID</th>
                                                            <th>Email</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($row = $pending_requests->fetch_assoc()): ?>
                                                            <tr>
                                                                <td><?php echo htmlspecialchars($row['admin_id']); ?></td>
                                                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                                                <td>
                                                                    <a href="admin_request.php?action=approve&id=<?php echo htmlspecialchars($row['admin_id']); ?>" class="btn btn-success btn-sm">Approve</a>
                                                                    <a href="admin_request.php?action=reject&id=<?php echo htmlspecialchars($row['admin_id']); ?>" class="btn btn-danger btn-sm">Reject</a>
                                                                </td>
                                                            </tr>
                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <hr>

                                            <h4>Approved Admins</h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="approvedTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Admin ID</th>
                                                            <th>Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($row = $approved_admins->fetch_assoc()): ?>
                                                            <tr>
                                                                <td><?php echo htmlspecialchars($row['admin_id']); ?></td>
                                                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                                            </tr>
                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                            </div>
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

</body>
</html>
