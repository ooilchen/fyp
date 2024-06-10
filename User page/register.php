<?php
header('Content-Type: application/json');

include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Check if the email already exists
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE `email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Email already exists, return an error
        $response = [
            'success' => false,
            'message' => 'Email is already in use'
        ];
    } else {
        // Email does not exist, proceed with registration
        $id = uniqid();
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO `user`(`user_id`, `username`, `email`, `password`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $id, $username, $email, $hashed_password);

        // Execute the statement
        if ($stmt->execute()) {
            $response = [
                'success' => true,
                'message' => 'New account created successfully'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Error: ' . $stmt->error
            ];
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Return JSON response
    echo json_encode($response);
    exit();
}
?>
