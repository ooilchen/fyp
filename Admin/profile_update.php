<?php

 include ("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $userid = $conn->real_escape_string($_POST['userid']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // Handle file upload
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_pic']['tmp_name'];
        $fileName = basename($_FILES['profile_pic']['name']);
        $uploadFileDir = './images/';
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
    
    // Update the database
    $sql = "UPDATE user SET username = '$username', email = '$email', password = '$password', profile_pic = '$profilePicPath' WHERE user_id = '$userid'";
    
    if ($conn->query($sql) === TRUE) {
        echo 'Profile updated successfully';
    } else {
        echo 'Error updating profile: ' . $conn->error;
    }
    
    // Close the connection
    $conn->close();
}
?>
