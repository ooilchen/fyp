<?php

include 'conn.php';

// Check if image_id is set and not empty
if (isset($_POST['image_id']) && !empty($_POST['image_id'])) {
    // Get the image_id from POST data
    $image_id = $_POST['image_id'];

    // Prepare SQL statement to select the image path
    $sql_select = "SELECT image_path FROM home_image WHERE image_id = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("s", $image_id);
    $stmt_select->execute();
    $stmt_select->store_result();

    // Check if the image record exists
    if ($stmt_select->num_rows > 0) {
        // Bind the result
        $stmt_select->bind_result($image_path);
        $stmt_select->fetch();

        // Delete the file from the server
        if (unlink($image_path)) {
            // File deleted successfully, proceed to delete the database record
            $sql_delete = "DELETE FROM home_image WHERE image_id = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("s", $image_id);

            // Execute the SQL statement to delete the database record
            if ($stmt_delete->execute()) {
                // Image and database record deleted successfully
                echo "Image and database record deleted successfully!";
            } else {
                // Error deleting database record
                echo "Error deleting database record: " . $stmt_delete->error;
            }

            // Close prepared statement
            $stmt_delete->close();
        } else {
            // Error deleting file
            echo "Error deleting file: File not found or permission denied.";
        }
    } else {
        // Image record not found
        echo "Error: Image record not found.";
    }

    // Close prepared statement
    $stmt_select->close();
    // Close database connection
    $conn->close();
} else {
    // If image_id is not set or empty
    echo "Invalid request. Image ID is missing.";
}
?>

