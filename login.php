<?php
require('connector.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Store Management System | SMS</title>

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .row {
            text-align: center;
            padding-bottom: 30px;
        }

        .text-decoration-none {
            text-decoration: none !important;
        }
    </style>

</head>

<body>
    <div class="row align-items-center pb-2">
        <div class="col-sm-1">
            <img src="image/Logo.png" alt="logo" class="img-fluid" style="width:100px;">
        </div>
        <div class="col-sm-7">
            <h1 class="mb-0"><a href="#" class="text-primary text-decoration-none">Store Management System</a></h1>
            <h2 class="mb-0"><a href="#" class="text-primary text-decoration-none">Admin Login</a></h2>
        </div>

    </div>

    <?php
    if (isset($_GET['user_first_name'])) {
        $user_first_name = $_GET['user_first_name'];       //singup
        $user_last_name = $_GET['user_last_name'];
        $user_email = $_GET['user_email'];
        $user_password = md5($_GET['user_password']); // Hash the password using MD5

        $sql = "INSERT INTO users(user_first_name,user_last_name,user_email,user_password) VALUES ('$user_first_name','$user_last_name','$user_email','$user_password')";

        if ($conn->query($sql) == TRUE) {
            echo '<script>
        swal({
            title: "Good job!",
            text: "Registration Successful",
            icon: "success",
            button: "Okay"
        });
        </script>';
        } else {
            echo "Data Not Inserted";
        }
    }
    ?>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                <h1>Create Account</h1>
                <input type="text" name="user_first_name" placeholder="First Name">
                <input type="text" name="user_last_name" placeholder="Last Name">
                <input type="email" name="user_email" placeholder="Email">
                <input type="password" name="user_password" placeholder="Password">
                <button>Sign Up</button>
            </form>
        </div>

        <?php
        if (isset($_POST['user_email'])) {
            $user_email = $_POST['user_email'];
            $user_password = md5($_POST['user_password']); // Hash the entered password using MD5

            $sql = "SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password' ";

            $query = $conn->query($sql);

            if (mysqli_num_rows($query) > 0) {
                $data = mysqli_fetch_array($query);               //login

                $user_first_name  = $data['user_first_name'];
                $user_last_name  = $data['user_last_name'];

                $_SESSION['user_first_name'] = $user_first_name;
                $_SESSION['user_last_name'] = $user_last_name;

                header('location:index.php');
            } else {
                echo "Email and Password not match";
            }
        }
        ?>

        <div class="form-container sign-in">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <h1>Sign In</h1>
                <input type="email" name="user_email" placeholder="Email">
                <input type="password" name="user_password" placeholder="Password">
                <a href="userpanel/customer_login.php">Login As Customer</a>
                <button>Sign In</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
