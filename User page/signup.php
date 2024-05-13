<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Signup</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .signup-form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
  }
  h2 {
    text-align: center;
  }
  form {
    display: flex;
    flex-direction: column;
  }
  label {
    margin-top: 10px;
  }
  input[type="text"],
  input[type="email"],
  input[type="password"] {
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  .account-type {
    margin: 10px 0;
  }
  button[type="submit"],
  button[type="button"] {
    background-color: #5cb85c;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-top: 10px;
    cursor: pointer;
  }
  button[type="submit"]:hover,
  button[type="button"]:hover {
    background-color: #4cae4c;
  }
  .login-section {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
  }
  a {
    color: #337ab7;
    text-decoration: none;
  }
  a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>
<div class="signup-form">
  <h2>Create an account</h2>
  <form>
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>

    <label for="email">Email address</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <label for="confirm-password">Confirm Password</label>
    <input type="password" id="confirm-password" name="confirm-password" required>

   <p>
    Register as: 
    </p>
    
    <div class="account-type">
      <input type="radio" id="admin" name="accountType" value="admin">
      <label for="admin">Admin</label>
      <input type="radio" id="user" name="accountType" value="user" checked>
      <label for="user">User</label>
    </div>
    
 

    <button type="submit">Register</button>
  </form>
</div>
</body>
</html>