<?php
    // Set session timeout to 30 minutes (1800 seconds)
    ini_set('session.gc_maxlifetime', 1800);
    session_start();

    // Redirect to login page if user is not logged in
    if (!isset($_SESSION['username'])) {
        header("Location: Sign_In.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard - Pending</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="../sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
  


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
                                <h1 class="h3 mb-0 text-gray-800">Confession - Pending approve</h1>
                                
                            </div>
        
                            <!-- Content Row -->

                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                                    <div class="ml-auto">
                                        <button type="button" class="btn btn-primary" id="approveButton">Approve</button>
                                        <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                                    </div>
                                </div>
        
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <!-- <th>Content ID</th> -->
                                                    <th>Category</th>
                                                    <th>Content</th>
                                                    <th>Image</th>
                                                    <th>Date</th>
                                                    <th><input type="checkbox" id="checkAll">Select All</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    include 'conn.php';

                                                    $sql = "SELECT c.content_id, c.date_created, c.category_id, c.content, c.content_status, c.image, cat.category_name 
                                                    FROM content c 
                                                    INNER JOIN category cat ON c.category_id = cat.category_id
                                                    WHERE c.content_status = 0";


                                                    $result = $conn->query($sql);
    
                                                    // Check if any rows were returned
                                                    if ($result->num_rows > 0) {
                                                        // Output data into the HTML table
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            
                                                            echo "<td>" . $row["category_name"] . "</td>";
                                                            echo "<td>" . $row["content"] . "</td>";
                                                            echo "<td><a href='" . $row["image"] . "' target='_blank'>" . $row["image"] . "</a></td>";
                                                            echo "<td>" . $row["date_created"] . "</td>";
                                                            echo "<td><input class='form-check-input' type='checkbox' name='content_id[]' value='" . $row["content_id"] . "'></td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='3'>No pending confession for now</td></tr>";
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

        

    </div>
    <!-- End of Page Wrapper -->


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>

    <!-- Bootstrap Notify -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-notify@latest/dist/bootstrap-notify.min.js"></script>



<script>
/*--------------------------------------------------------------
# Datatable
--------------------------------------------------------------*/        
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

/*--------------------------------------------------------------
# Approve button
--------------------------------------------------------------*/

        $('#approveButton').on('click', function () {
            var selectedIds = [];
            $('input[name="content_id[]"]:checked').each(function () {
                selectedIds.push($(this).val());
            });
            
            $.ajax({
            url: 'content_update.php',
            type: 'post',
            data: {  
                content_ids: selectedIds 
            },
            success: function (response) {
                // Handle success response
                console.log(response);
                showNotification('top', 'right', 'Content approved successfully.', 'success');
                setTimeout(() => location.reload(), 4000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle error
                console.error(textStatus, errorThrown);
                showNotification('top', 'right', 'Error approving content.', 'danger');
            }
            });
            });


/*--------------------------------------------------------------
# Delete button
--------------------------------------------------------------*/

        $('#deleteButton').on('click', function () {
            var selectedIds = [];
            $('input[name="content_id[]"]:checked').each(function () {
                selectedIds.push($(this).val());
            });

            $.ajax({
            url: 'content_delete.php',
            type: 'post',
            data: { 
                content_ids: selectedIds 
            },
            success: function (response) {
                // Handle success response
                console.log(response);
                showNotification('top', 'right', 'Content deleted successfully.', 'success');
                setTimeout(() => location.reload(), 4000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle error
                console.error(textStatus, errorThrown);
                showNotification('top', 'right', 'Error deleting content.', 'danger');
            }
            });
                
                console.log('Selected IDs for delete:', selectedIds);
            });

/*--------------------------------------------------------------
# Notification
--------------------------------------------------------------*/

        function showNotification(from, align, message, type) {
            $.notify({
            icon: "fas fa-check-circle",
            message: message
            }, {
            type: type,
            //timer: 4000,
            placement: {
                from: from,
                align: align
            }
            });
        }

/*--------------------------------------------------------------
# Check All
--------------------------------------------------------------*/

        $('#checkAll').on('click', function() {
            $('input[name="content_id[]"]').prop('checked', this.checked);
        });


</script>
      


</body>
</html>