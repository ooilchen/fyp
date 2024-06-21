<?php
session_start();
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode([
            'success' => false,
            'message' => 'User not logged in'
        ]);
        exit();
    }

    $data = json_decode(file_get_contents('php://input'), true);
    $contentId = $data['content_id'];
    $userId = $_SESSION['user_id'];

    if ($contentId) {
        // Check if user already liked the post
        $query = "SELECT * FROM user_likes WHERE user_id = ? AND content_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $userId, $contentId);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo json_encode([
                'success' => false,
                'message' => 'User already liked this post'
            ]);
        } else {
            // Update the like count in the database
            $query = "UPDATE content SET like_count = like_count + 1 WHERE content_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $contentId);

            if ($stmt->execute()) {
                // Insert into user_likes table
                $query = "INSERT INTO user_likes (user_id, content_id) VALUES (?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $userId, $contentId);
                $stmt->execute();

                // Retrieve the new like count
                $query = "SELECT like_count FROM content WHERE content_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $contentId);
                $stmt->execute();
                $stmt->bind_result($newLikeCount);
                $stmt->fetch();

                echo json_encode([
                    'success' => true,
                    'new_like_count' => $newLikeCount
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Error updating like count'
                ]);
            }
        }
        $stmt->close();
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid content ID'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}

$conn->close();

?>
