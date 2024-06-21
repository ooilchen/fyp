<?php
// Include your database connection file
include 'conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['user_email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement to fetch user data based on email
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        // User exists, fetch user details
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, login successful
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
