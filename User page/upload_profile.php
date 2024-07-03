<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == 0) {
    $user_id = $_SESSION['user_id'];
    $target_dir = "../images/";
    
    // Create the target directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if file is an image
    $check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
    if ($check !== false) {
        // Allow certain file formats
        if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
                // Update the user's profile picture in the database
                $sql_update = "UPDATE user SET profile_pic = ? WHERE user_id = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("ss", $target_file, $user_id);
                if ($stmt_update->execute()) {
                    $_SESSION['Profile_pic'] = $target_file;
                    header("Location: Profile.php");
                } else {
                    echo "Error updating profile picture.";
                }
                $stmt_update->close();
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        echo "File is not an image.";
    }
} else {
    echo "No file uploaded or there was an upload error.";
}

$conn->close();
?>
