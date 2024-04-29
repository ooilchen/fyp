<?php

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $prefix = 'IMG-'; 
    $img_id = $prefix . uniqid();

    // Check if an image was uploaded
    if (!empty($_FILES["carousel_image"]["name"])) {

        // File upload handling
        $targetDirectory = "../images/"; 
        $targetFile = $targetDirectory . basename($_FILES["carousel_image"]["name"]); 

        // Check if file was uploaded successfully
        if (move_uploaded_file($_FILES["carousel_image"]["tmp_name"], $targetFile)) {
            
            $stmt = $conn->prepare("INSERT INTO `home_image`(`image_id`, `image_path`) VALUES (?, ?)");
            $stmt->bind_param("ss", $img_id, $targetFile);
        } else {
            // Error uploading file
            echo "Error uploading file.";
            exit; 
        }
    } 

    // Execute prepared statement
    if ($stmt->execute()) {

        echo "Image added successfully!";
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
