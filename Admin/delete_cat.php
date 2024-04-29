<?php

include 'conn.php';

// Check if image_id is set and not empty
if (isset($_POST['cat_id']) && !empty($_POST['cat_id'])) {
    // Get the image_id from POST data
    $cat_id = $_POST['cat_id'];

    // Prepare SQL statement to delete the image
    $sql = "DELETE FROM category WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cat_id);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Image deleted successfully
        echo "Category deleted successfully!";
    } else {
        // Error deleting image
        echo "Error: " . $stmt->error;
    }

    // Close prepared statement
    $stmt->close();
    // Close database connection
    $conn->close();
} else {
    // If image_id is not set or empty
    echo "Invalid request. Category ID is missing.";
}
?>
