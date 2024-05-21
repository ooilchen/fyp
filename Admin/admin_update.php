<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $announce_id = $_POST['announcementId'];
    $announcement_content = $_POST['announcementContent'];
    $announcement_image = $_FILES['announcementImage'];
    
    if ($announcement_image['size'] > 0) {
        $target_dir = "../images"; 
        $target_file = $target_dir . basename($announcement_image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($announcement_image["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            exit;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($announcement_image["tmp_name"], $target_file)) {
                // File upload successful, save the path in the database
                $announcement_img_path = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }
        }
    }

        // Update announcement in the database
        if (isset($announcement_img_path)) {
            $sql = "UPDATE admin_annnouncement SET announcement = ?, announcement_img = ?, date_announce = CURRENT_TIMESTAMP WHERE announce_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $announcement_content, $announcement_img_path, $announce_id);
        } else {
            $sql = "UPDATE admin_annnouncement SET announcement = ? WHERE announce_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $announcement_content, $announce_id);
        }
    
        if ($stmt->execute()) {
            echo "Announcement updated successfully.";
        } else {
            echo "Error updating announcement: " . $conn->error;
        }

    // Close statement
    $stmt->close();
    // Close connection
    $conn->close();
}