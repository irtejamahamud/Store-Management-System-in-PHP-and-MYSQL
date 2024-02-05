<?php
require('../connector.php');
?>

<!DOCTYPE html>

<html>

<head>
    <title>Customer Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card">
                    <div class="card-body mx-5">
                        <?php
                        if (isset($_GET['customer_name'])) {
                            $customer_name = $_GET['customer_name'];
                            $customer_address = $_GET['customer_address'];
                            $customer_DOB = $_GET['customer_DOB'];
                            $customer_email = $_GET['customer_email'];
                            $customer_password = $_GET['customer_password'];

                            $sql = "INSERT INTO customer(customer_name,customer_address,customer_DOB,customer_email,customer_password) VALUES ('$customer_name','$customer_address','$customer_DOB','$customer_email','$customer_password')";

                            if ($conn->query($sql) == TRUE) {
                                echo "User Register Success";
                            } else {
                                echo "Data Not Inserted";
                            }
                        }
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                            Your Name: <br>
                            <input type="text" name="customer_name" class="form-control my-3 py-2" placeholder="customer Name">
                            Customer Address: <br>
                            <input type="text" name="customer_address" class="form-control my-3 py-2" placeholder="customer Address">
                            Date of Birth: <br>
                            <input type="date" name="customer_DOB" class="form-control my-3 py-2" placeholder="customer DOB">
                            Email : <br>
                            <input type="email" name="customer_email" class="form-control my-3 py-2" placeholder="Email">
                            Password : <br>
                            <input type="password" name="customer_password" class="form-control my-3 py-2" placeholder="Password">
                            <div class="text-center">
                                <input type="submit" name="Register" class="btn btn-primary px-5"></br>
                                <h4 class="my-2">If already Register, then <a href="customer_login.php" class='btn btn-success my-4'>Login</a> </h4>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>