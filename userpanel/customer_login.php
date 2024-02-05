<?php
require('../connector.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style1.css">
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
            <img src="Logo.png" alt="logo" class="img-fluid" style="width:100px;">
        </div>
        <div class="col-sm-7">
            <h1 class="mb-0"><a href="#" class="text-primary text-decoration-none">Store Management System</a></h1>
            <h2 class="mb-0"><a href="#" class="text-primary text-decoration-none">Customer Login</a></h2>
        </div>
    </div>

    <?php
    if (isset($_GET['customer_name'])) {
        $customer_name = $_GET['customer_name'];
        $customer_address = $_GET['customer_address'];
        $customer_DOB = $_GET['customer_DOB'];
        $customer_email = $_GET['customer_email'];
        $customer_password = md5($_GET['customer_password']); // Hash the password using MD5

        $sql = "INSERT INTO customer(customer_name,customer_address,customer_DOB,customer_email,customer_password) VALUES ('$customer_name','$customer_address','$customer_DOB','$customer_email','$customer_password')";

        if ($conn->query($sql) == TRUE) {
            echo "User Register Success";
        } else {
            echo "Data Not Inserted";
        }
    }
    ?>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                <h1>Create Account</h1>
                <input type="text" name="customer_name" placeholder="Name">
                <input type="text" name="customer_address" placeholder="Address">
                <input type="date" name="customer_DOB" placeholder="Date Of Birth">
                <input type="email" name="customer_email" placeholder="Email">
                <input type="password" name="customer_password" placeholder="Password">
                <button>Sign Up</button>
            </form>
        </div>

        <?php
        if (isset($_POST['customer_email'])) {
            $customer_email = $_POST['customer_email'];
            $customer_password = md5($_POST['customer_password']); // Hash the entered password using MD5

            $sql = "SELECT * FROM customer WHERE customer_email='$customer_email' AND customer_password='$customer_password'";

            $query = $conn->query($sql);

            if (mysqli_num_rows($query) > 0) {
                $data = mysqli_fetch_array($query);

                $customer_id    = $data['customer_id'];
                $customer_name  = $data['customer_name'];

                $_SESSION['customer_id'] = $customer_id;
                $_SESSION['customer_name'] = $customer_name;

                header('location:online_store.php');
            } else {
                echo "Email and Password not match";
            }
        }
        ?>

        <div class="form-container sign-in">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <h1>Sign In</h1>
                <input type="email" name="customer_email" placeholder="Email">
                <input type="password" name="customer_password" placeholder="Password">
                <a href="../login.php">Login As Admin</a>
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

   <script src="script1.js"></script>
</body>

</html>
