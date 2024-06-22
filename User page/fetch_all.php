<?php
    include 'conn.php';

    $query = "SELECT c.*, cat.category_name 
            FROM content c 
            JOIN category cat ON c.category_id = cat.category_id 
            WHERE c.content_status = 1 
            ORDER BY c.date_created DESC";

    $result = mysqli_query($conn, $query);

    $contentArray = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $contentArray[] = $row;
        }
    }

    mysqli_close($conn);

    header('Content-Type: application/json');
    echo json_encode($contentArray);
?>