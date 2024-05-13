<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .login-container {
            border: 1px solid #000;
            padding: 40px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 400px; 
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 20px); 
            padding: 15px; 
            margin: 15px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: calc(100% - 20px); 
            padding: 15px; 
            border: none;
            background-color: #6495ED;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .login-links {
            text-align: center;
            margin-top: 20px;
        }
        .admin-link {
            display: block; 
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Welcome back, Dear Admin!</h2>
        <form action="/user-login" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
        <div class="login-links">
            <a href="/forgot-password">Forgot password?</a> | 
            <a href="/signup">Signup</a>
        </div>
    </div>
</body>
</html>