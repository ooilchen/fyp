<?php
header('Content-Type: application/json');

session_start();
include('conn.php');

if(isset($_GET['id']) && isset($_SESSION['user_id'])) {
    $categoryId = mysqli_real_escape_string($conn, $_GET['id']);
    $userId = $_SESSION['user_id'];

    // Update the SQL query to include the like status
    $sql = "SELECT c.*, cat.*, 
                   (SELECT COUNT(*) FROM `user_likes` ul WHERE ul.`content_id` = c.`content_id`) AS like_count,
                   (SELECT COUNT(*) FROM `user_likes` ul WHERE ul.`content_id` = c.`content_id` AND ul.`user_id` = '$userId') AS is_liked
            FROM `content` c
            JOIN `category` cat ON c.`category_id` = cat.`category_id`
            WHERE c.`content_status` = 1 
            AND c.`category_id` = '$categoryId'";
    $result = $conn->query($sql);

    $content = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Convert is_liked to boolean
            $row['is_liked'] = $row['is_liked'] > 0;
            $content[] = $row;
        }
    }

    echo json_encode($content);
} else {
    
    echo json_encode(array('error' => 'No category ID provided or user not logged in'));
}

$conn->close();
?>
