<?php

include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    // $confirm_password = htmlspecialchars($_POST['confirm-password']);
    // $accountType = htmlspecialchars($_POST['accountType']);

    // Check if passwords match
    // if ($password !== $confirm_password) {
    //     $message = "Passwords do not match.";
    //     $type = "error";
    //     header("Location: index.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    //     exit();
    // }

    $id = uniqid();
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `user`(`user_id`, `username`, `email`, `password`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss",$id, $username, $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        $message = "New account created successfully";
        $type = "success";
    } else {
        $message = "Error: " . $stmt->error;
        $type = "error";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the form with a message
    header("Location: index.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
?>
