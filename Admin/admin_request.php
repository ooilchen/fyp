<?php
include 'conn.php';

// Check if action and admin_id parameters exist in the URL
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $admin_id = $_GET['id'];

    if ($action === 'approve') {
        // Update the admin record to mark as approved
        $stmt = $conn->prepare("UPDATE admin SET approved = 1 WHERE admin_id = ?");
        $stmt->bind_param("s", $admin_id);
        $stmt->execute();
    } elseif ($action === 'reject') {
        // Delete the admin request
        $stmt = $conn->prepare("DELETE FROM admin_requests WHERE admin_id = ?");
        $stmt->bind_param("i", $admin_id);
        $stmt->execute();
    }

    // Redirect back to admin request page after handling the request
    header("Location: Request.php");
    exit();
} else {
    // Redirect to admin request page if action or admin_id parameters are missing
    header("Location: Request.php");
    exit();
}

$conn->close();
?>
