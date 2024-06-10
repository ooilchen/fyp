<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$userId = $_SESSION['user_id'];
$postId = json_decode(file_get_contents('php://input'), true)['postId'];
$commentText = json_decode(file_get_contents('php://input'), true)['commentText'];
$commentId = uniqid('comment-', true);

// Here, perform the database operations to comment on the post
// For example, insert a new record into the comments table
$conn = new mysqli("localhost", "username", "password", "fyp");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO comments (comment_id, content_id, user_id, comment_text) VALUES ('$commentId', '$postId', '$userId', '$commentText')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => $conn->error]);
}

$conn->close();
?>
