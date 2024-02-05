<?php
require('connector.php');
require('datafunction.php');

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
                    <div class="col-sm-6 border-start border-success">
                        <!-- start code for this page -->
                        <div class="container p-4 m-4 text-center">
                            <h1 class="text-center mb-4 text-danger">Top Three Customers</h1>
                            <?php
                            $sql = "select order_customer_id, sum(order_product_qty * order_product_price) as sumamount from orders where order_status='approved' group by order_customer_id order by sumamount desc limit 3";
                            $query = $conn->query($sql);

                            echo "<table class='table table-striped table-hover'><tr><th>Customer Name</th><th>Total Spend</th></tr>";
                            while ($data = mysqli_fetch_array($query)) {
                                $order_customer_id = $data['order_customer_id'];
                                $totalSpend=$data['sumamount'];
                                $customer_name=getCustomerName($order_customer_id);
                                
                                echo "<tr>
                                    <td>$customer_name</td>
                                    <td>$totalSpend</td>
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
