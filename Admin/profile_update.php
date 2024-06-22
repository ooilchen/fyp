<?php
include ("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Handle file upload
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_pic']['tmp_name'];
        $fileName = basename($_FILES['profile_pic']['name']);
        $uploadFileDir = '../images/';

        if (!file_exists($uploadFileDir)) {
            mkdir($uploadFileDir, 0777, true); 
        }

        $dest_path = $uploadFileDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // File is uploaded successfully
            $profilePicPath = $dest_path;
        } else {
            // Handle file upload error
            echo 'There was an error moving the uploaded file.';
            exit;
        }
    } else {
        
        $profilePicPath = $user['profile_pic']; 
    }

    $sql = "UPDATE admin
            SET admin_username = ?, email = ?, password = ?, profile_pic = ?
            WHERE user_id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssss", $username, $email, $password, $profilePicPath, $userid);

    if ($stmt->execute()) {
        echo 'Profile updated successfully';
    } else {
        echo 'Error updating profile: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
