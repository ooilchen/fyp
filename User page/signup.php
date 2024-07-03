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
  <div id="response-message"></div>
  <form id="signup-form" onsubmit="return validateForm()">
    <label for="username">Username</label>
    <input class="form-control mb-3" type="text" id="username" name="username" >

    <label for="email">Email address</label>
    <input class="form-control mb-3" type="text" id="email" name="email" >

    <label for="password">Password</label>
    <input class="form-control mb-3" type="password" id="password" name="password" >

    <label for="confirm-password">Confirm Password</label>
    <input class="form-control mb-3" type="password" id="confirm-password" name="confirm-password" >

    

    <button type="submit" class="btn btn-primary">Register</button>

    <a href="Signin.php">Have an account? Sign in</a>

    <div id="error-message" class="error"></div>
  </form>
</div>

<script>
  function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(email);
  }

  function validateForm() {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    let errorMessage = '';

    if (!username || !email || !password || !confirmPassword) {
      errorMessage += 'All fields are required.<br>';
    }

    if (!validateEmail(email)) {
      errorMessage += 'Invalid email address.<br>';
    }

    if (password !== confirmPassword) {
      errorMessage += 'Passwords do not match.<br>';
    }

    if (errorMessage) {
      document.getElementById('error-message').innerHTML = errorMessage;
      return false;
    }

    sendFormData();
    return false; // Prevent default form submission
  }

  function sendFormData() {
    const form = document.getElementById('signup-form');
    const formData = new FormData(form);

    // Clear any existing error message
    const errorMessageElement = document.getElementById('error-message');
    errorMessageElement.innerHTML = '';

    fetch('register.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      const responseMessage = document.getElementById('response-message');
      if (data.success) {
        responseMessage.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
        form.reset();

        setTimeout(() => {
        responseMessage.innerHTML = '';
        window.location.href = 'Signin.php';
        }, 3000); // 3 seconds delay before clearing the message
        
      } else {
        responseMessage.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }
</script>
</body>
</html>
