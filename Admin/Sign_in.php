<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Custom styles for this template-->
    <link href="../sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>
<body class="login-body">
    <div class="login-container p-4 mt-5 border rounded">
        <h2>Welcome back, Admin!</h2>

        <?php
            if(isset($_GET['error'])) {
                $error = $_GET['error'];
                if($error === "InvalidCredentials") {
                    echo "<p class='error-message'>Invalid email or password. Please try again.</p>";
                } elseif($error === "UserNotFound") {
                    echo "<p class='error-message'>User not found. Please register first.</p>";
                }
            }
        ?>
        
        <form action="login_admin.php" method="post">
            <label for="username">Email:</label>
            <input class="form-control mb-3" type="text" placeholder="example@email.com" id="username" name="username" required>

            <label for="password">Password:</label>
            <input class="form-control mb-3" type="password" placeholder="password" id="password" name="password" required>

            <input type="submit" class="btn btn-primary" value="Login">
        </form>
        <div class="login-links mt-3">
            <a href="/forgot-password">Forgot password?</a>
        </div>
    </div>
</body>
</html>