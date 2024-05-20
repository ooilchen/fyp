

<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $row['username'];
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

    $stmt->close();

    $conn->close();
}
?>

