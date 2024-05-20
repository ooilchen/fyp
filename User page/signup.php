<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body class="signup-body">
<div class="signup-form">
  <h2>Create an account</h2>
    <!-- Display success or error messages -->
    <?php if (isset($_GET['message'])): ?>
    <div class="<?php echo htmlspecialchars($_GET['type']); ?>">
      <?php echo htmlspecialchars($_GET['message']); ?>
    </div>
  <?php endif; ?>
  <form onsubmit="return validateForm()" method="post" action="register.php">
    <label for="username">Username</label>
    <input class="form-control mb-3" type="text" id="username" name="username" required>

    <label for="email">Email address</label>
    <input class="form-control mb-3" type="email" id="email" name="email" required>

    <label for="password">Password</label>
    <input class="form-control mb-3" type="password" id="password" name="password" required>

    <label for="confirm-password">Confirm Password</label>
    <input class="form-control mb-3" type="password" id="confirm-password" name="confirm-password" required>

   <p>
    Register as: 
    </p>
    
    <div class="account-type">
      <input type="radio" id="admin" name="accountType" value="admin">
      <label for="admin">Admin</label>
      <input type="radio" id="user" name="accountType" value="user" checked>
      <label for="user">User</label>
    </div>
    
 

    <button type="submit" class="btn btn-primary">Register</button>
    <div id="error-message" class="error"></div>
  </form>
</div>

<script>
      function validateEmail(email) {
      const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      return re.test(email);
    }

    function validateForm() {
      // Get form elements
      const username = document.getElementById('username').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm-password').value;
      // const accountType = document.querySelector('input[name="accountType"]:checked');

      // Initialize an error message
      let errorMessage = '';

      // Check if all fields are filled
      if (!username || !email || !password || !confirmPassword || !accountType) {
        errorMessage += 'All fields are required.<br>';
      }

      // Validate email format
      if (!validateEmail(email)) {
        errorMessage += 'Invalid email address.<br>';
      }

      // Check if passwords match
      if (password !== confirmPassword) {
        errorMessage += 'Passwords do not match.<br>';
      }

      // If there are any errors, display them and prevent form submission
      if (errorMessage) {
        document.getElementById('error-message').innerHTML = errorMessage;
        return false;
      }

      // If no errors, allow form submission
      return true;
    }

</script>
</body>
</html>