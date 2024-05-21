<?php

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $prefix = 'IMG-'; 
    $img_id = $prefix . uniqid();
    
    // Check if an image was uploaded
    if (!empty($_FILES["carousel_image"]["name"])) {

        $targetDirectory = "../images/"; 
        $fileExtension = pathinfo($_FILES["carousel_image"]["name"], PATHINFO_EXTENSION);
        $newFileName = $img_id . '.' . $fileExtension; // Rename the file to the image ID
        $targetFile = $targetDirectory . $newFileName; 

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
        // Error inserting image
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
