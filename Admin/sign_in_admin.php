<?php

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE `email` = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        
        $row = $result->fetch_assoc();
        $hashed_password = $row['Password'];
        if (password_verify($password, $hashed_password)) {
            
            session_start();
            $_SESSION['email'] = $email;
            header("Location: Index.php");
            exit();

        } else {
            
            header("Location: Sign_In.php?error=InvalidCredentials");
            exit();
        }
    } else {
        
        header("Location: Sign_In.php?error=UserNotFound");
        exit();
    }
}

$conn->close();
?>
