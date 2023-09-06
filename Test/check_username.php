<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];

    // Query to check if the username already exists in the database
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<span style='color: red;'>Username is not available.</span>";
    } else {
        echo "<span style='color: green;'>Username is available.</span>";
        }
} else {
    // Handle the case where "username" is not present in the POST data
    echo "<span style='color: red;'>Invalid request.</span>";
}
?>

