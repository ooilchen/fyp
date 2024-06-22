<?php
include 'conn.php';

if (isset($_POST['cat_id']) && !empty($_POST['cat_id'])) {
    $cat_id = $_POST['cat_id'];

    $sql = "DELETE FROM category WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cat_id);

    if ($stmt->execute()) {
        echo "Category deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request. Category ID is missing.";
}
?>
