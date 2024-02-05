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

    session_start();
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

    if(!empty($user_first_name) && !empty($user_last_name)){
?>

<!DOCTYPE html>

<html>

<head>
    <title>List of store products</title>
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
                            $sql = "SELECT * FROM store_product";
                            $query = $conn->query($sql);

                            echo "<table class='table table-striped table-hover'><tr><th>Name</th><th>Quantity</th><th>Available Quantity</th><th>Price</th><th>Entry Date</th><th>Action</th></tr>";
                            while ($data = mysqli_fetch_array($query)) {
                                $store_product_id = $data['store_product_id'];
                                $store_product_name = $data['store_product_name'];
                                $store_product_qty = $data['store_product_qty'];
                                $available_qty = $data['available_qty'];
                                $store_product_price = $data['store_product_price'];
                                $store_product_entrydate = $data['store_product_entrydate'];

                                echo "<tr>
                                    <td>$data_list[$store_product_name]</td>
                                    <td>$store_product_qty</td>
                                    <td>$available_qty</td>
                                    <td>$store_product_price</td>
                                    <td>$store_product_entrydate</td>
                                    <td><a href='store_product_update.php?id=$store_product_id' class='btn btn-success'>Update</td>
                                </tr>";
                            }
                            echo "</table>"

                            ?>
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