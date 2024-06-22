<?php
session_start();
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $contentId = $_POST['content_id'];
    $commentText = $_POST['comment_text'];
    $userId = $_SESSION['user_id']; 

    $commentId = uniqid('COMMENT_'); 

    // Insert the comment into the database
    $query = "INSERT INTO comments (comment_id, content_id, user_id, comment_text, date_commented) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssss', $commentId, $contentId, $userId, $commentText);
    
    if ($stmt->execute()) {
        // Comment inserted successfully
        echo json_encode(['success' => true]);
    } else {
        // Error inserting comment
        echo json_encode(['success' => false, 'message' => 'Error inserting comment']);
    }

    $stmt->close();
    $conn->close();
} else {
    
    http_response_code(405); 
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
}
?>
