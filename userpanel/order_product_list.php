<?php
require('../connector.php');

//to load category name
$sql2 = "SELECT * FROM product";
$query2 = $conn->query($sql2);

$data_list = array();

while ($data2 = mysqli_fetch_array($query2)) {
    $product_id = $data2['product_id'];
    $product_name = $data2['product_name'];
    $data_list[$product_id] = $product_name;
}

session_start();
$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
if (!empty($customer_id) && !empty($customer_name)) {

?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>List of sell products</title>
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
                        <p class=" mb-0 fs-3 text-end text-success fw-bold"><?php echo  $customer_name ?> <a href="customer_logout.php" class="text-dark text-decoration-none">Logout</a></p>
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
                            $sql = "SELECT * FROM orders where order_customer_id=$customer_id";
                            $query = $conn->query($sql);

                            echo "<table class='table table-striped table-hover'><tr><th>Product Name</th><th>Quantity</th><th>Price(Per Qty)</th><th>Entry Date</th><th>Order By</th><th>Status</th></tr>";
                            while ($data = mysqli_fetch_array($query)) {
                                $order_id  = $data['order_id'];
                                $order_product_id = $data['order_product_id'];
                                $order_product_qty = $data['order_product_qty'];
                                $order_product_price = $data['order_product_price'];
                                $order_product_entrydate = $data['order_product_entrydate'];
                                $order_status = $data['order_status'];
                                echo "<tr>
                                    <td>$data_list[$order_product_id]</td>
                                    <td>$order_product_qty</td>
                                    <td>$order_product_price</td>
                                    <td>$order_product_entrydate</td>
                                    <td>$customer_name</td>";

                                    if($order_status=='approved')echo "<td><button type='button' class='btn btn-success'>$order_status</button></td>";
                                       
                                    if($order_status=='pending')echo "<td><button type='button' class='btn btn-warning'>$order_status</button></td>";

                                    if($order_status=='rejected')echo "<td><button type='button' class='btn btn-danger'>$order_status</button></td>";
                                    
                                    
                                echo "</tr>";
                            }
                            echo "</table>"
                            ?>
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