<?php
require('../connector.php');
require('../datafunction.php');
session_start();
$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
if (!empty($customer_id) && !empty($customer_name)) {

?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Store Management System</title>
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
                        <p class=" mb-0 fs-3 text-end text-success fw-bold"><?php echo  $customer_name ?> <a href="customer_logout.php" class="text-primary text-decoration-none">Logout</a></p>
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
                        <div class="row row-cols-2 p-4 g-4">
                            <div class="">
                                <div class="card  shadow border-0 align-items-center justify-content-between">
                                    <div class="row  g-2 align-items-center p-3">
                                        <img src="../image/money.png" class="col-5" alt="" style="aspect-ratio:1;object-fit:contain;object-position: center center;">
                                        <div class="card-body col-7">
                                            <h4 class="card-title mb-1">Amount Spend</h5>
                                                <h2 class="mb-0 font-18 text-danger ">
                                                    <?php 
                                                    echo totalAmountSpend($customer_id);
                                                     ?>
                                                </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--footer-->
            <div class="container-fluid border-bottom border-top border-dark border-5 mt-4 mb-4 py-3">
                <div class="">
                    <p class="text-center"><img src="../image/copyright.png" class="me-2" alt="logo" style="width:20px;">Copyright by Irteja Mahmud</p>
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