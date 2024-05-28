<?php

    include 'conn.php';

    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $post = file_get_contents('php://input');
    $value = json_decode($post);

    // Validate and sanitize input
    $id = mysqli_real_escape_string($conn, $value->category_id);
    $status = mysqli_real_escape_string($conn, $value->new_status);

    // Use prepared statements for better security
    $stmt = $conn->prepare("UPDATE `category` SET `status` = ? WHERE `category_id` = ?");
    $stmt->bind_param("ss", $status, $id);

    $response = array();

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Status updated successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to update status.';
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Return the response as JSON
    echo json_encode($response);

?>
