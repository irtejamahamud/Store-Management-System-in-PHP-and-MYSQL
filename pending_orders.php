<?php
require('connector.php');

//to load category name
$sql2 = "SELECT * FROM product";
$query2 = $conn->query($sql2);

$data_list = array();

while ($data2 = mysqli_fetch_array($query2)) {
    $product_id = $data2['product_id'];
    $product_name = $data2['product_name'];
    $data_list[$product_id] = $product_name;
}

function getCustomerName($customer_id)
{
    require('connector.php');
    $sql3 = "SELECT * FROM customer WHERE customer_id=$customer_id";
    $query3 = $conn->query($sql3);
    $data3 = mysqli_fetch_array($query3);
    $customer_name = $data3['customer_name'];
    return $customer_name;
}

session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];

if (!empty($user_first_name) && !empty($user_last_name)) {
?>
    <!DOCTYPE html>

    <html>

    <head>
        <title>Store Product Update</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="container bg-light">
            <!--topbar-->
            <div class="container-fluid border-bottom border-dark border-5 mb-4 py-3">
                <?php include('fixed_part/topbar.php'); ?>
            </div>

            <!--Body-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3 bg-light p-0 m-0">
                        <?php include('fixed_part/left_part.php'); ?>
                    </div>
                    <div class="col-sm-9 border-start border-dark">
                        <!-- start code for this page -->
                        <div class="container p-4 m-4">
                            <?php
                            $sql = "SELECT * FROM orders where order_status='pending'";
                            $query = $conn->query($sql);

                            echo "<table class='table table-striped table-hover'><tr><th>Product Name</th><th>Quantity</th><th>Price(Per Qty)</th><th>Entry Date</th><th>Order By</th><th>Status</th><th>Action</th><th>Action</th></tr>";
                            while ($data = mysqli_fetch_array($query)) {
                                $order_id  = $data['order_id'];
                                $order_product_id = $data['order_product_id'];
                                $order_product_qty = $data['order_product_qty'];
                                $order_product_price = $data['order_product_price'];
                                $order_product_entrydate = $data['order_product_entrydate'];
                                $order_customer_id = $data['order_customer_id'];
                                $order_status = $data['order_status'];
                                $customer_name=getCustomerName($order_customer_id);
                                echo "<tr>
                                    <td>$data_list[$order_product_id]</td>
                                    <td>$order_product_qty</td>
                                    <td>$order_product_price</td>
                                    <td>$order_product_entrydate</td>
                                    <td>$customer_name</td>
                                    <td><button type='button' class='btn btn-warning'>$order_status</button></td>
                                    <td><a href='order_approved.php?id=$order_id' class='btn btn-success'>Approve</a></td>
                                    <td><a href='order_rejected.php?id=$order_id' class='btn btn-danger'>Reject</a></td>
                                </tr>";
                            }
                            echo "</table>"
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--footer-->
            <div class="container-fluid border-bottom border-top border-dark border-5 mt-4 mb-4 py-3">
                <?php include('fixed_part/footer.php'); ?>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header('location:login.php');
}
?>
