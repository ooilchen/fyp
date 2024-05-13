<?php
include "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $content = $_POST['newText'];
    $cat_id = $_POST['category'];
    
    $id = "conf-".uniqid();

    if(isset($_FILES['image'])) {
        
        $uploadDir = '../images/';

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];

        // Generate a unique file name
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $uniqueFileName = $id . '.' . $fileExt;

            // Move uploaded file to the specified folder
            $uploadPath = $uploadDir . $uniqueFileName;
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                
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
        $sql = "INSERT INTO `content`(`content_id`,`category_id`, `content`) VALUES ('$id', '$cat_id', '$content')";
        $result = $conn->query($sql);

        if ($result) {
            $response['success'] = true;
        } else {
            $response['error'] = 'Failed to insert content into database';
        }
    }
} else {
    $response['error'] = 'Invalid request method';
}

// Output JSON response
echo json_encode($response);
?>
