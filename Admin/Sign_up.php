<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>

    <!-- Custom styles for this template-->
    <link href="../sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body class="login-body">
    <div class="login-container p-4 mt-5 border rounded">
        <h2>Create a new admin account</h2>

        <?php
            if(isset($_GET['error'])) {
                $error = $_GET['error'];
                if($error === "EmailExists") {
                    echo "<p class='error-message'>Email already exists. Please use a different email.</p>";
                }elseif($error === "Success") {
                    echo "<p class='success-message'>Your registration request has been submitted for approval. Please wait for our email.</p>";
                }
            }
        ?>

        <form action="register_admin.php" method="post">
            <label for="username">Email:</label>
            <input class="form-control mb-3" type="email" placeholder="example@email.com" id="email" name="email" required>

            <label for="username">Username</label>
            <input class="form-control mb-3" type="text" placeholder="username" id="username" name="username" required>

            <label for="password">Password:</label>
            <input class="form-control mb-3" type="password" placeholder="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input class="form-control mb-3" type="password" placeholder="confirm password" id="confirm_password" name="confirm_password" required>

            <input type="submit" class="btn btn-primary" value="Register">
            <a href="Sign_in.php">Signin</a>
        </form>
    </div>
</body>
</html>
