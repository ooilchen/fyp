<?php

include "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $content = $_POST['newText'];
    $id = uniqid();

    $sql = "INSERT INTO `content`(`content_id`, `content`) VALUES ('$id','$content')";

    $result = $conn->query($sql);

    if($result){
        $response['success'] = true;
    }
}
echo json_encode($response);
?>