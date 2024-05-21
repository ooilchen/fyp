<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH');

include 'conn.php';

$post = file_get_contents('php://input');
$value = json_decode($post);

//update status
$id = $value->id;
$status = $value->status_cat;
$sql = "UPDATE `category` SET `status`='".$status."' WHERE `category_id`='".$id."'";
    
if(mysqli_query($con, $sql)){
    echo json_encode("SUCCESS");
}else{
    echo json_encode("FAILED");
}

$con->close();

?>
