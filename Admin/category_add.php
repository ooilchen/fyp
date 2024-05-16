<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newCat = $_POST['newCat'];
    $catDesc = $_POST['catDesc'];

    $sql = "INSERT INTO `category`(`category_id`, `category_name`, `category_desc`) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sss", $new_id, $newCat, $catDesc);

    $getLastIdSql = "SELECT `category_id` FROM `category` ORDER BY `category_id` DESC LIMIT 1";
    $lastIdResult = $conn->query($getLastIdSql);

    if ($lastIdResult->num_rows > 0) {
        
        $row = $lastIdResult->fetch_assoc();
        $last_id = $row["category_id"];
        // Extract the numeric part of the ID and increment it
        $numeric_part = (int)substr($last_id, 4); // Extract digits after "CAT-"
        $new_id = "CAT-" . sprintf('%04d', $numeric_part + 1); // Format with leading zeros
        
    } else {
        // If there are no records in the table, start with ID CAT-0001
        $new_id = "CAT-0001";
    }

    if ($stmt->execute()) {
        echo "New category added!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();
}
?>
