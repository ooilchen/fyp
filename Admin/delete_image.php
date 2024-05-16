<?php

include 'conn.php';

if (isset($_POST['image_id']) && !empty($_POST['image_id'])) {
    
    $image_id = $_POST['image_id'];

    // Prepare SQL to select the image path
    $sql_select = "SELECT image_path FROM home_image WHERE image_id = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("s", $image_id);
    $stmt_select->execute();
    $stmt_select->store_result();

    // Check if the image record exists
    if ($stmt_select->num_rows > 0) {
        
        $stmt_select->bind_result($image_path);
        $stmt_select->fetch();

        $sql_delete = "DELETE FROM home_image WHERE image_id = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("s", $image_id);

        // Delete the file from the server
        unlink($image_path);

        // Execute the SQL to delete the database record
        if ($stmt_delete->execute()) {
            echo "Image and database record deleted successfully!";
        } else {
            echo "Error deleting database record: " . $stmt_delete->error;
        }

        $stmt_delete->close();

    } else {
        // Image record not found
        echo "Error: Image record not found.";
    }


    $stmt_select->close();

    $conn->close();
} else {
    // If image_id is not set or empty
    echo "Invalid request. Image ID is missing.";
}
?>

