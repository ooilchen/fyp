
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UC Admin - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../sb-admin-2.min.css" rel="stylesheet">

    <?php
        include 'conn.php';
    ?>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 narrow-card">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div>
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username"
                                        placeholder="Username" onkeyup="check_username()"> 
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="userEmail" name="userEmail"
                                        placeholder="Email Address" onkeyup="check_email()">
                                </div>
                                <div class="form-group">
                                   
                                        <input type="password" class="form-control form-control-user"
                                            id="userInputPassword" name="userInputPassword" placeholder="Password">
                                </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="userRepeatPassword" name="userRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                    <button type='submit' class="btn btn-primary btn-user btn-block" name="signUp">
                                
                                    Register Account
                                </button>
                                
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="sign_in.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php

    // if (isset($_POST['signUp'])) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_POST["username"];
            $email = $_POST["userEmail"];
            $pw = $_POST["userInputPassword"];
            $user_id = uniqid();

            $sql = "INSERT INTO `user`(`user_id`, `username`, `email`, `password`, `signup_date`) VALUES ('$user_id','$username','$email','$pw', current_timestamp())";

            $result = $conn->query($sql);

        }
    // }
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

<script>

    //
    function check_username(){

    }
</script> 

</body>

</html>