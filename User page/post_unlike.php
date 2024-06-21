<?php
session_start();
include 'conn.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "User not logged in"]);
    exit();
}

$user_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['content_id'])) {
    $content_id = $data['content_id'];

    // Check if the like exists
    $stmt = $conn->prepare("SELECT * FROM user_likes WHERE user_id = ? AND content_id = ?");
    $stmt->bind_param("ss", $user_id, $content_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Delete the like
        $stmt = $conn->prepare("DELETE FROM user_likes WHERE user_id = ? AND content_id = ?");
        $stmt->bind_param("ss", $user_id, $content_id);
        if ($stmt->execute()) {
            // Update the like count
            $stmt = $conn->prepare("UPDATE content SET like_count = like_count - 1 WHERE content_id = ?");
            $stmt->bind_param("s", $content_id);
            $stmt->execute();

            // Get the new like count
            $stmt = $conn->prepare("SELECT like_count FROM content WHERE content_id = ?");
            $stmt->bind_param("s", $content_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $new_like_count = $row['like_count'];

            echo json_encode(["success" => true, "new_like_count" => $new_like_count]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to unlike the post"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Like not found"]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Content ID not provided"]);
}

$conn->close();
?>
