<?php
include "conn.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the confession text
    $content = $_POST['newText'];
    $cat_id = $_POST['category'];
    // Generate a unique ID for the content
    $id = uniqid();

    // Check if file is uploaded
    if(isset($_FILES['image'])) {
        // Define a folder to save uploaded images
        $uploadDir = '../images/';

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        // Extract file information
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $fileType = $_FILES['image']['type'];

        // Generate a unique file name
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $uniqueFileName = $id . '.' . $fileExt;

        // Check if file uploaded without errors
        if ($fileError === 0) {
            // Move uploaded file to the specified folder
            $uploadPath = $uploadDir . $uniqueFileName;
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                // File uploaded successfully, now insert the content into database
                $sql = "INSERT INTO `content`(`content_id`,`category_id`, `content`, `image`) VALUES ('$id', '$cat_id', '$content', '$uploadPath')";
                $result = $conn->query($sql);
                if ($result) {
                    $response['success'] = true;
                } else {
                    $response['error'] = 'Failed to insert content into database';
                }
            } else {
                $response['error'] = 'Failed to move uploaded file';
            }
        } else {
            $response['error'] = 'Error occurred while uploading file';
        }
    } else {
        $response['error'] = 'No file uploaded';
    }
} else {
    $response['error'] = 'Invalid request method';
}

// Output JSON response
echo json_encode($response);
?>
