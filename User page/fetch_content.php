<?php
header('Content-Type: application/json');


include('conn.php');

if(isset($_GET['id'])) {
    
    $categoryId = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT c.*, cat.`category_name` 
            FROM `content` c
            JOIN `category` cat ON c.`category_id` = cat.`category_id`
            WHERE c.`content_status` = 1 
            AND c.`category_id` = '$categoryId'
            ORDER BY c.`date_created` DESC";
    $result = $conn->query($sql);

    $content = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $content[] = $row;
        }
    }

    echo json_encode($content);
} else {
    
    echo json_encode(array('error' => 'No category ID provided'));
}

$conn->close();
?>