<?php
require('../connector.php');
session_start();
$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
if (!empty($customer_id) && !empty($customer_name)) {

    $sql = "SELECT * FROM customer where customer_id=$customer_id";
    $query = $conn->query($sql);

    $data = mysqli_fetch_array($query);

    $customer_id          = $data['customer_id'];
    $customer_name  = $data['customer_name'];
    $customer_address   = $data['customer_address'];
    $customer_DOB   = $data['customer_DOB'];
    $customer_email       = $data['customer_email'];
    $customer_password    = $data['customer_password'];

?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>User Update</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="container bg-light">
            <!--topbar-->
            <div class="container-fluid border-bottom border-dark border-5 mb-4 py-3">
                <div class="row align-items-center pb-2">
                    <div class="col-sm-1">
                        <img src="../image/Logo.png" alt="logo" class="img-fluid" style="width:100px;">
                    </div>
                    <div class="col-sm-7">
                        <h1 class="mb-0"><a href="online_store.php" class="text-primary text-decoration-none">Store Management System </a></h1>
                    </div>
                    <div class="col-sm-4 justify-content-end">
                        <p class=" mb-0 fs-3 text-end text-dark fw-bold"><?php echo  $customer_name ?> <a href="customer_logout.php" class="text-primary text-decoration-none">Logout</a></p>
                    </div>
                </div>
            </div>

            <!--Body-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3 bg-light p-0 m-0">
                        <h4 class="bg-dark text-white p-2">Order</h4>
                        <ul class="list-group mx-4 mb-4">
                            <li class="list-group-item"><a href="order_product.php" class="text-dark text-decoration-none">Take Order</a></li>
                        </ul>
                        <h4 class="bg-dark text-white p-2">Report</h4>
                        <ul class="list-group mx-4 mb-4">
                            <li class="list-group-item"><a href="order_product_list.php" class="text-dark text-decoration-none">Order List</a></li>
                        </ul>
                        <h4 class="bg-dark text-white p-2">Profile</h4>
                        <ul class="list-group mx-4 mb-4">
                            <li class="list-group-item"><a href="customer_update.php" class="text-dark text-decoration-none">Update Profile</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9 border-start border-dark">
                        <!-- start code for this page -->
                        <div class="container p-4 m-4">
                            <?php
                            if (isset($_GET['customer_name'])) {
                                $new_customer_name  =  $_GET['customer_name'];
                                $new_customer_address   =  $_GET['customer_address'];
                                $new_customer_DOB   =  $_GET['customer_DOB'];
                                $new_customer_email =  $_GET['customer_email'];
                                $new_customer_password  =  md5($_GET['customer_password']);
                                $new_customer_id  =  $_GET['customer_id'];

                                $sql2 = "UPDATE customer SET customer_name='$new_customer_name',
                                customer_address='$new_customer_address',
                                customer_DOB='$new_customer_DOB',
                                customer_email='$new_customer_email',
                                customer_password='$new_customer_password' WHERE customer_id=$new_customer_id";

                                if ($conn->query($sql2) == true) {
                                    echo "Updated Successfully";
                                } else
                                    echo "Updated Not Successfully";
                            }
                            ?>
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                                Name: <br>
                                <input type="text" class="form-control my-3 py-2" name="customer_name" value="<?php echo $customer_name ?>">
                                Address: <br>
                                <input type="text" name="customer_address" class="form-control my-3 py-2" value="<?php echo $customer_address ?>">
                                Date of Birth: <br>
                                <input type="date" name="customer_DOB" class="form-control my-3 py-2" value="<?php echo $customer_DOB?>">
                                Email : <br>
                                <input type="email" class="form-control my-3 py-2" name="customer_email" value="<?php echo $customer_email ?>">
                                Password : <br>
                                <input type="password" class="form-control my-3 py-2" name="customer_password" value="<?php echo $customer_password ?>">
                                <input type="text" class="form-control my-3 py-2" name="customer_id" value="<?php echo $customer_id ?>" hidden>
                                <div class="text-center">
                                    <input type="submit" name="Update" class="btn btn-success" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--footer-->
            <div class="container-fluid border-bottom border-top border-dark border-5 mt-4 mb-4 py-3">
                <div class="">
                    <p class="text-center"><img src="../image/copyright.png" class="me-2" alt="logo" style="width:20px;">Copyright by Md. Hasibur Rahman and Mahmudul Hasan</p>

                </div>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
    header('location:customer_login.php');
}
?>