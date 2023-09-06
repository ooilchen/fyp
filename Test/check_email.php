<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];

    // Query to check if the email already exists in the database
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<span style='color: red;'>Email is already in use.</span>";
    } else {
        echo "<span style='color: green;'>Email is available.</span>";
    }
} else {
    // Handle the case where "email" is not present in the POST data
    echo "<span style='color: red;'>Invalid request.</span>";
}
?>
