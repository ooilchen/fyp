<?php
include "conn.php";

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $content = $_POST['newText'];
    $cat_id = $_POST['category'];
    $id = "conf-" . uniqid();

    // Initialize variables for file handling
    $uploadPath = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadDir = '../images/';

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $uniqueFileName = $id . '.' . $fileExt;

        // Move uploaded file to the specified folder
        $uploadPath = $uploadDir . $uniqueFileName;
        if (!move_uploaded_file($fileTmpName, $uploadPath)) {
            $response['error'] = 'Failed to move uploaded file';
            echo json_encode($response);
            exit;
        }
    }

    // Prepare and bind
    if ($uploadPath) {
        $stmt = $conn->prepare("INSERT INTO `content`(`content_id`, `category_id`, `content`, `image`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $id, $cat_id, $content, $uploadPath);
    } else {
        $stmt = $conn->prepare("INSERT INTO `content`(`content_id`, `category_id`, `content`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $id, $cat_id, $content);
    }

    // Execute the statement
    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['error'] = 'Failed to insert content into database: ' . $stmt->error;
    }

    $stmt->close();
} else {
    $response['error'] = 'Invalid request method';
}

$conn->close();

// Output JSON response
echo json_encode($response);
?>
