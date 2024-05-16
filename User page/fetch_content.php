<?php
header('Content-Type: application/json');

include('conn.php');

if(isset($_GET['id'])) {
    
    $categoryId = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch active content from database where content_status is 1 and category_id matches the fetched id
    $sql = "SELECT `content_id`, `date_created`, `category_id`, `content`, `content_status`, `image` 
            FROM `content` 
            WHERE `content_status` = 1 
            AND `category_id` = '$categoryId'";
    $result = $conn->query($sql);

    $content = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $content[] = $row;
        }
    }

    echo json_encode($content);
} else {
    // Return an error message if no category ID provided
    echo json_encode(array('error' => 'No category ID provided'));
}

$conn->close();
?>
