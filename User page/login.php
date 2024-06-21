<?php

session_start();

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['user_email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['user_id']; 
            $response = array("success" => true, "message" => "Login successful");

        } else {
            // Password is incorrect
            $response = array("success" => false, "message" => "Incorrect password");
        }
    } else {
        // User does not exist
        $response = array("success" => false, "message" => "User not found");
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
