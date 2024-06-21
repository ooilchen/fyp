<?php
header('Content-Type: application/json');

include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Check if the username already exists
    $stmt_username = $conn->prepare("SELECT * FROM `user` WHERE `username` = ?");
    $stmt_username->bind_param("s", $username);
    $stmt_username->execute();
    $result_username = $stmt_username->get_result();

    if ($result_username->num_rows > 0) {
        
        $response = [
            'success' => false,
            'message' => 'Username is already in use'
        ];
    } else {
        // Check if the email already exists
        $stmt = $conn->prepare("SELECT * FROM `user` WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            
            $response = [
                'success' => false,
                'message' => 'Email is already in use'
            ];
        } else {
            
            $id = uniqid();
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt_insert = $conn->prepare("INSERT INTO `user`(`user_id`, `username`, `email`, `password`) VALUES (?, ?, ?, ?)");
            $stmt_insert->bind_param("ssss", $id, $username, $email, $hashed_password);

            if ($stmt_insert->execute()) {
                $response = [
                    'success' => true,
                    'message' => 'New account created successfully'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Error: ' . $stmt_insert->error
                ];
            }
        }
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
    exit();
}
?>
