<?php
session_start();
try {
    require_once 'code.php';
    if (isset($_POST['login'])) {
        if (empty($_POST['Username']) || empty($_POST['Password'])) {
            $message = "All fields are required";
        } else {
            $sql = "SELECT * FROM users WHERE Username = :Username AND Password = :Password";
            $userrow = $dbh->prepare($sql);
            $userrow->execute(array(
                'Username' => $_POST['Username'],
                'Password' => $_POST['Password'],
            ));
            $count = $userrow->rowCount();
            if ($count > 0) {
                $result = $userrow->fetch(PDO::FETCH_ASSOC);
                $_SESSION['userid'] = $result['id'];
                $_SESSION['loggedin'] = true;
                $_SESSION['role'] = $result['role'];
                header('Location: index.php'); // Redirect to the homepage after login
                exit();
            } else {
                $message = "Wrong username or password";
            }
        }
    }
} catch (Throwable $error) {
    $message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.css">


</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->

        <style>
            .card-header {
                border: none;
            }

            .custom-input {
                width: 100%;

            }
            #togglePassword {
                float: right;
                margin-left: -20px;
                margin-top: 12px;
                right: 10px;
                position: relative;
                z-index: 2;
            }
        </style>
        <div class="card">
            <div class="card-header text-center">
                <img src="../Logo/headerlogo.png" class="w-25 mt-2">
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="input-group mb-3">
                        <label for="">Username</label>
                        <input type="text" class="form-control  w-100" name="Username" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="">Password </label>
                        <div class="input-group">
                            <input type="password" class="form-control "  id="password" name="Password" required>
                            <div class="input-group-append">
                               
                                <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center ">
                        <button type="submit" name="login" class="btn btn-primary   w-100">Login</button>
                    </div>
            </div>
            </form>
            <?php
            if (isset($message))
                echo "<script>alert('Wrong Username or Password!');</script>";
            ?>
        </div>
    </div>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye slash icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>