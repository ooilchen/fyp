<?php

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newAnnounce = $_POST['newAnnounce'];

    $prefix = 'INFO-'; 
    $announce_id = $prefix . uniqid();

    // Check if an image was uploaded
    if (!empty($_FILES["admin_image"]["name"])) {
        // File upload handling
        $targetDirectory = "../images/"; 
        $targetFile = $targetDirectory . basename($_FILES["admin_image"]["name"]); 

        // Check if file was uploaded successfully
        if (move_uploaded_file($_FILES["admin_image"]["tmp_name"], $targetFile)) {
            // Insert announcement data into database with image
            $stmt = $conn->prepare("INSERT INTO `admin_annnouncement`(`announce_id`, `announcement`, `announcement_img`, `date_announce`) VALUES (?, ?, ?, NOW())");
            $stmt->bind_param("sss", $announce_id, $newAnnounce, $targetFile);
        } else {
            // Error uploading file
            echo "Error uploading file.";
            exit; // Exit script if file upload fails
        }
    } else {
        // Insert announcement data into database without image
        $stmt = $conn->prepare("INSERT INTO `admin_annnouncement`(`announce_id`, `announcement`, `date_announce`) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $announce_id, $newAnnounce);
    }

    // Execute prepared statement
    if ($stmt->execute()) {
        // Announcement inserted successfully
        echo "Announcement added successfully!";
    } else {
        // Error inserting announcement
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
    // Close connection
    $conn->close();
    
} else {
    echo "Invalid request.";
}
?>
