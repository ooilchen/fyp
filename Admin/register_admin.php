<?php
include 'conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['admin_username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        header("Location: register_admin.php?error=PasswordMismatch");
        exit();
    }

    // Check if the email already exists in the admin table
    $sql_check = "SELECT * FROM admin WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        header("Location: Sign_up.php?error=EmailExists");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //uniqid
    $id = uniqid();

    // Insert the admin registration into the admin table (mark as unapproved)
    $sql = "INSERT INTO admin (admin_id, admin_username, email, password, approved) VALUES (?, ?, ?, ?, FALSE)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $id, $username, $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: Sign_up.php?error=Success");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
