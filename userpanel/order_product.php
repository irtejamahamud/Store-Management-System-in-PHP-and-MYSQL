<?php
require('../connector.php');

function findProductID($store_product_id)
{
    require('../connector.php');
    $sql3 = "select * from store_product WHERE store_product_id=$store_product_id";
    $query3 = $conn->query($sql3);
    $data3 = mysqli_fetch_array($query3);
    $productID = $data3['store_product_name'];
    return $productID;
}

function findProductName($data_name)
{
    require('../connector.php');
    $sql2 = "select * from product WHERE product_id=$data_name";
    $query2 = $conn->query($sql2);
    $data2 = mysqli_fetch_array($query2);
    $productName = $data2['product_name'];
    return $productName;
}

function data_list($tablename, $col1, $col2)
{
    require('../connector.php');
    $sql1 = "select * from $tablename";
    $query1 = $conn->query($sql1);

    while ($data1 = mysqli_fetch_array($query1)) {
        $store_product_id = $data1[$col1];
        $product_id = $data1[$col2];

        $productName = findProductName($product_id);

        echo "<option value='$store_product_id'>$productName</option>";
    }
}

session_start();
$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
if (!empty($customer_id) && !empty($customer_name)) {

?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Sell Product</title>
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
                            <li class="list-group-item"><a href="order_product_list.php" class="text-dark text-decoration-none">Order Info</a></li>
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
                            if (isset($_GET['order_product_id'])) {

                                $order_product_id = $_GET['order_product_id'];
                                $available_product_qty = $_GET['available_product_qty'];
                                $order_product_qty = $_GET['order_product_qty'];
                                $order_product_price = $_GET['order_product_price'];
                                $order_product_entrydate = $_GET['order_product_entrydate'];
                                $order_customer_id = $_GET['order_customer_id'];

                                $product_id = findProductID($order_product_id);

                                $sql = "INSERT INTO orders(order_product_id,order_product_qty,order_product_price,order_customer_id,order_product_entrydate) 
                                                VALUES ('$product_id','$order_product_qty','$order_product_price','$order_customer_id','$order_product_entrydate')";

                                if ($conn->query($sql) == TRUE) {
                                    echo "Order Successfull";
                                } else {
                                    echo "Order not Successfull";
                                }
                            }
                            if (isset($_GET['order_product_id'])) {

                                $order_product_id = $_GET['order_product_id'];
                                $available_product_qty = $_GET['available_product_qty'];
                                $order_product_qty = $_GET['order_product_qty'];
                                $updated_value = $available_product_qty - $order_product_qty;
                                $sql4 = "UPDATE store_product SET available_qty='$updated_value' WHERE store_product_id=$order_product_id";
                                $conn->query($sql4);
                            }

                            ?>

                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="order_product_form" method="GET">
                                Product: <br>
                                <select name="order_product_id" class="form-control" id="product_select">
                                    <option value=""> Select Product</option>
                                    <?php
                                    data_list('store_product', 'store_product_id', 'store_product_name');
                                    ?>
                                </select><br><br>
                                Available Product Quantity: <br>
                                <input type="number" class="form-control" name="available_product_qty" readonly value="<?php echo  $store_product_qty ?>"><br><br>
                                Order Product Quantity: <br>
                                <input type="number" class="form-control" name="order_product_qty"><br><br>
                                Product Price: <br>
                                <input type="text" class="form-control" name="order_product_price" readonly value="<?php ?>"><br><br>
                                Order Entry Date : <br>
                                <input type="date" class="form-control" name="order_product_entrydate"><br><br>
                                Customer ID : <br>
                                <input type="text" class="form-control" name="order_customer_id" readonly value="<?php echo  $customer_id ?>"><br><br>
                                <div class="text-center">
                                    <input type="submit" name="Order" class="btn btn-success" value="Order">
                                </div>
                            </form>


                            <script>
                                const order_product = document.getElementById("order_product_form");
                                document.getElementById("product_select").addEventListener("change", function(e) {
                                    const product_id = e.target.value;
                                    fetch(`../service/products.sevice.php?id=${product_id}`)
                                        .then(res => res.json())
                                        .then(data => {
                                            const product = data?.[0];
                                            if (!product) throw new Error("Product not found.");
                                            console.log(product)
                                            order_product.querySelector("[name='available_product_qty']").value = product?.available_qty;
                                            order_product.querySelector("[name='order_product_price']").value = +product?.store_product_price * 1.05;
                                        })
                                        .catch((message) => {
                                            console.log(err.message);
                                        })
                                })
                            </script>
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