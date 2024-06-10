<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$userId = $_SESSION['user_id'];
$postId = json_decode(file_get_contents('php://input'), true)['postId'];
$likeId = uniqid('like-', true);


include('conn.php');

$sql = "INSERT INTO likes (like_id, content_id, user_id) VALUES ('$likeId', '$postId', '$userId')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => $conn->error]);
}

$conn->close();
?>
