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

    // Count total content
    $sql_total = "SELECT COUNT(*) AS total_count FROM content";
    $result_total = $conn->query($sql_total);
    $total_count = $result_total->fetch_assoc()['total_count'];

    // Count pending confessions
    $sql_pending = "SELECT COUNT(*) AS count FROM content WHERE content_status = 0";
    $result_pending = $conn->query($sql_pending);
    $pending_count = $result_pending->fetch_assoc()['count'];

    // Count total registered users
    $sql_users = "SELECT COUNT(*) AS user_count FROM user";
    $result_users = $conn->query($sql_users);
    $user_count = $result_users->fetch_assoc()['user_count'];

    // Fetch count of content by category
    $sql_category = "SELECT category_id, COUNT(*) AS count FROM content GROUP BY category_id";
    $result_category = $conn->query($sql_category);
    $category_data = [];
    while ($row = $result_category->fetch_assoc()) {
        $category_data[] = $row;
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

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
        
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                            </div>
        
                            <!-- Content Row -->
                            <div class="row">
        
                                <!-- Pending confession Card  -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <a href="pending.php" style="text-decoration: none;" >
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Pending confession</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending_count; ?></div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
        
                                <!-- Total confession Card -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <a href="confession.php" style="text-decoration: none;" >
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                            Total confession</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_count; ?></div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>    
                                </div>
        
                                <!-- Total user card -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $user_count; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <!-- Total category Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Pending Requests</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Content Row -->
        
                            <div class="row">
        
                                <!-- Area Chart -->
                                <div class="col-xl-8 col-lg-7">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Active Category</h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <!-- <div class="chart-area">
                                                <canvas id="myAreaChart"></canvas>
                                            </div> -->
                                            <?php foreach ($category_data as $category) { ?>
                                                <div class="col-xl-4 col-md-6 mb-4">
                                                    <div class="card border-left-info shadow h-100 py-2">
                                                        <div class="card-body">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col mr-2">
                                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                                        <?php echo $category['category_id']; ?></div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
        
                                <!-- Pie Chart -->
                                <div class="col-xl-4 col-lg-5">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">Dropdown Header:</div>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="myPieChart"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-primary"></i> Direct
                                                </span>
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-success"></i> Social
                                                </span>
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-info"></i> Referral
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Donut Chart -->
                                <div class="col-xl-4 col-lg-5">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Content by Category</h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="chart-pie pt-4">
                                                <canvas id="myPieChart"></canvas>
                                            </div>
                                            <hr>
                                            <div class="row mt-4">
                                                <?php foreach ($category_data as $category) { ?>
                                                    <div class="col-md-6">
                                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                            <?php echo $category['category_id']; ?></div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <?php echo $category['count']; ?></div>
                                                    </div>
                                                <?php } ?>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>
</html>