<?php
    require('connector.php');
    require('datafunction.php');

    session_start();
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

    if(!empty($user_first_name) && !empty($user_last_name)){
?>

<!DOCTYPE html>

<html>

<head>
    <title>Store Product Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
        <div class="container bg-light">
            <!--topbar-->
            <div class="container-fluid border-bottom border-success border-5 mb-4 py-3">
                <?php include('fixed_part/topbar.php'); ?>
            </div>

            <!--Body-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3 bg-light p-0 m-0">
                        <?php include('fixed_part/left_part.php'); ?>
                    </div>
                    <div class="col-sm-9 border-start border-success">
                        <!-- start code for this page -->
                        <div class="container p-4 m-4">
                            <?php
                            if (isset($_GET['store_product_name'])) {
                                $store_product_name = $_GET['store_product_name'];
                                $store_product_qty = $_GET['store_product_qty'];
                                $store_product_price = $_GET['store_product_price'];
                                $store_product_entrydate = $_GET['store_product_entrydate'];

                                $sql = "INSERT INTO store_product(store_product_name,store_product_qty,available_qty,store_product_price,store_product_entrydate) 
                                            VALUES ('$store_product_name','$store_product_qty',
                                            '$store_product_qty','$store_product_price','$store_product_entrydate')";

                                $sql2 = "INSERT INTO available_product(available_product_id,available_product_qty) VALUES ('$store_product_name','$store_product_qty')";

                                if ($conn->query($sql) == TRUE) {
                                    echo "Data Inserted";
                                } else {
                                    echo "Data Not Inserted";
                                }
                            }
                            ?>

                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                                Product: <br>
                                <select class="form-control"  name="store_product_name">
                                    <?php
                                    data_list('product', 'product_id', 'product_name');
                                    ?>
                                </select><br><br>
                                Product Quantity: <br>
                                <input type="text" class="form-control"  name="store_product_qty"><br><br>
                                Product Price: <br>
                                <input type="text" class="form-control"  name="store_product_price"><br><br>
                                Store Entry Date : <br>
                                <input type="date" class="form-control"  name="store_product_entrydate"><br><br>
                                <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--footer-->
            <div class="container-fluid border-bottom border-top border-success border-5 mt-4 mb-4 py-3">
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