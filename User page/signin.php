<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Sign In</title>

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="login-body">
    <div class="login-container">
        <h2>Welcome back!</h2>
        <form id="login-form">
            <label for="user_email">Email:</label>
            <input class="form-control mb-3" type="email" id="user_email" name="user_email" required>

            <label for="password">Password:</label>
            <input class="form-control mb-3" type="password" id="password" name="password" required>

            <button type="submit" class="btn btn-primary">Login</button>
            <div id="error-message" class="text-danger"></div>
        </form>
        <div class="login-links">
            <a href="/forgot-password">Forgot password?</a> | 
            <a href="signup.php">Signup</a>
        </div>
        <div class="admin-link">
            <a href="../Admin/Sign_in.php">Login as Admin</a>
        </div>
    </div>

    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault(); 

            // Clear previous error message
            document.getElementById('error-message').innerHTML = '';

            const formData = new FormData(this);

            // Send login data to server for validation
            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Login successful, redirect to user dashboard or homepage
                    window.location.href = 'Index.php'; 
                } else {
                    // Login failed, display error message
                    document.getElementById('error-message').innerHTML = data.message;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>