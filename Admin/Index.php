<?php
    // Set session timeout to 30 minutes (1800 seconds)
    ini_set('session.gc_maxlifetime', 1800);
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
    $sql_category = "SELECT category.category_name, COUNT(*) AS count 
                     FROM content 
                     JOIN category ON content.category_id = category.category_id 
                     GROUP BY category.category_name";
    $result_category = $conn->query($sql_category);
    $category_data = [];
    while ($row = $result_category->fetch_assoc()) {
        $category_data[] = $row;
    }

    // Fetch content creation trend
    $sql_trend = "SELECT DATE(date_created) as date, COUNT(*) as count 
                  FROM content 
                  GROUP BY DATE(date_created)
                  ORDER BY date_created";
    $result_trend = $conn->query($sql_trend);
    $trend_data = [];
    while ($row = $result_trend->fetch_assoc()) {
        $trend_data[] = $row;
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../sb-admin-2.min.css" rel="stylesheet">
    <link href="../fontawesome-free/css/all.min.css" rel="stylesheet">
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
                        <!-- Pending confession Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="Confess_pending.php" style="text-decoration: none;">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending approval</div>
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
                            <a href="Confess.all.php" style="text-decoration: none;">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total confession</div>
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
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user_count; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Trend</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="myLineChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Confession by Category</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="myPieChart"></canvas>
                                    <hr>
                                    <div class="row mt-4">
                                        <?php foreach ($category_data as $category) { ?>
                                            <div class="col-md-6">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $category['category_name']; ?></div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $category['count']; ?></div>
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

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Page level custom scripts -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to generate a random color in hexadecimal format
            function getRandomColor() {
                const letters = '0123456789ABCDEF';
                let color = '#';
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            // Function to generate an array of random colors
            function generateRandomColors(numColors) {
                const colors = [];
                for (let i = 0; i < numColors; i++) {
                    colors.push(getRandomColor());
                }
                return colors;
            }

            // Data for Pie Chart
            const categoryLabels = <?php echo json_encode(array_column($category_data, 'category_name')); ?>;
            const categoryCounts = <?php echo json_encode(array_column($category_data, 'count')); ?>;
            const randomColors = generateRandomColors(categoryLabels.length);
            const randomHoverColors = generateRandomColors(categoryLabels.length);

            var pieData = {
                labels: categoryLabels,
                datasets: [{
                    data: categoryCounts,
                    backgroundColor: randomColors,
                    hoverBackgroundColor: randomHoverColors,
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            };

            var ctxPie = document.getElementById("myPieChart").getContext('2d');
            new Chart(ctxPie, {
                type: 'pie',
                data: pieData,
            });

            // Data for Line Chart
            var lineData = {
                labels: <?php echo json_encode(array_column($trend_data, 'date')); ?>,
                datasets: [{
                    label: "Confession Submission Trend",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: <?php echo json_encode(array_column($trend_data, 'count')); ?>,
                }],
            };

            var ctxLine = document.getElementById("myLineChart").getContext('2d');
            new Chart(ctxLine, {
                type: 'line',
                data: lineData,
            });
        });
    </script>
</body>
</html>
