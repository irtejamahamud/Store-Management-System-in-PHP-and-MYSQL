<?php
    require('connector.php');

    session_start();
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

    if(!empty($user_first_name) && !empty($user_last_name)){


    $sql2 = "SELECT * FROM product";
    $query2 = $conn->query($sql2);

    $data_list = array();

    while ($data2 = mysqli_fetch_array($query2)) {
        $product_id = $data2['product_id'];
        $product_name = $data2['product_name'];
        $data_list[$product_id] = $product_name;
    }
?>

<!DOCTYPE html>

<html>

<head>
    <title>Product Report</title>
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
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                                Select Product Name: 
                                <select class="form-control" name="product_name">
                                    <option>Select Option</option>
                                    <?php
                                    $sql = "SELECT * FROM product";
                                    $query = $conn->query($sql);

                                    while ($data = mysqli_fetch_array($query)) {
                                        $product_id = $data['product_id'];
                                        $product_name = $data['product_name'];
                                    ?>

                                    <option value="<?php echo $product_id ?>" > <?php echo $product_name ?> </option>

                                    <?php } ?>

                                </select>
                                From: <br>
                                <input type="date" class="form-control" name="from_date">
                                To: <br>
                                <input type="date" class="form-control" name="to_date">
                                <input type="submit" value="Generate Report" class="btn btn-success my-3">
                            </form>

                            <h1 class="text-success my-3">Store Product Report</h1>
                            <?php
                                if(isset($_GET['product_name'])){
                                    $product_name=$_GET['product_name'];
                                    $from_date=$_GET['from_date'];
                                    $to_date=$_GET['to_date'];

                                    $sql1="SELECT * FROM store_product WHERE (store_product_name=$product_name) AND ( store_product_entrydate>= '$from_date' AND store_product_entrydate<='$to_date')";

                                    $query1 = $conn-> query($sql1);

                                    echo "<table class='table table-striped table-hover'><tr><td>Store Date</td><td>Quantity</td><td>Price</td></tr>";
                                    while($data1 = mysqli_fetch_array($query1)){

                                        $store_product_name = $data1['store_product_name'];
                                        $store_product_qty = $data1['store_product_qty'];
                                        $store_product_price = $data1['store_product_price'];
                                        $store_product_entrydate = $data1['store_product_entrydate'];

                                        echo "<tr><td>$store_product_entrydate</td><td>$store_product_qty</td><td>$store_product_price</td></tr>";
                                    }
                                    echo "</table>";
                                }
                            ?>

                            </br><h1 class="text-success my-3">Sell Product Report</h1>
                            <?php
                                if(isset($_GET['product_name'])){
                                    $product_name=$_GET['product_name'];
                                    $from_date=$_GET['from_date'];
                                    $to_date=$_GET['to_date'];

                                    $sql3="SELECT * FROM orders WHERE (order_product_id=$product_name AND order_status !='pending') AND ( order_product_entrydate>= '$from_date' AND order_product_entrydate<='$to_date')";

                                    $query3 = $conn-> query($sql3);
                                    echo "<table class='table table-striped table-hover'><tr><td>Order Date</td><td>Quantity</td><td>Price</td></tr>";
                                    while($data3 = mysqli_fetch_array($query3)){

                                        $order_product_id = $data3['order_product_id'];
                                        $order_product_qty = $data3['order_product_qty'];
                                        $order_product_price = $data3['order_product_price'];
                                        $order_product_entrydate = $data3['order_product_entrydate'];

                                        echo "<tr><td>$order_product_entrydate</td><td>$order_product_qty</td><td>$order_product_price</td></tr>";
                                    }
                                    echo "</table>";
                                }
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
    }
    else{
        header('location:login.php');
    }
?>