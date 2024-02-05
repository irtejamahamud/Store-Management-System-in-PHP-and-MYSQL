<?php
require('connector.php');
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
                            if (isset($_GET['id'])) {
                                $getid =  $_GET['id'];
                                $sql = "SELECT * FROM store_product where store_product_id=$getid";
                                $query = $conn->query($sql);

                                $data = mysqli_fetch_array($query);

                                $store_product_id          = $data['store_product_id'];
                                $store_product_name        = $data['store_product_name'];
                                $store_product_qty         = $data['store_product_qty'];
                                $available_qty             = $data['available_qty'];
                                $store_product_price       = $data['store_product_price'];
                                $store_product_entrydate  = $data['store_product_entrydate'];
                            }

                            if (isset($_GET['store_product_name'])) {
                                $new_store_product_name  =  $_GET['store_product_name'];
                                $new_store_product_qty   =  $_GET['store_product_qty'];
                                $new_available_qty   =  $_GET['available_qty'];
                                $new_store_product_price =  $_GET['store_product_price'];
                                $new_store_product_entrydate  =  $_GET['store_product_entrydate'];
                                $new_store_product_id  =  $_GET['store_product_id'];

                                $sql2 = "UPDATE store_product SET store_product_name='$new_store_product_name',
                                store_product_qty='$new_store_product_qty',available_qty='$new_available_qty ',
                                store_product_price='$new_store_product_price',store_product_entrydate='$new_store_product_entrydate' WHERE store_product_id=$new_store_product_id";

                                if ($conn->query($sql2) == true) {
                                    echo "Updated Successfully";
                                } else
                                    echo "Updated Not Successfully";
                            }

                            ?>

                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                                Product: <br>
                                <select class="form-control" name="store_product_name">
                                    <?php
                                    $sql = "select * from product";
                                    $query = $conn->query($sql);

                                    while ($data = mysqli_fetch_array($query)) {
                                        $product_id = $data['product_id'];
                                        $product_name = $data['product_name'];
                                    ?>
                                        <option value='<?php echo $product_id ?>' <?php if ($store_product_name == $product_id) { echo 'selected';} ?>>
                                            <?php echo $product_name ?>
                                        </option>

                                    <?php } ?>
                                    ?>
                                </select><br><br>
                                Product Quantity: <br>
                                <input type="number" class="form-control" name="store_product_qty" value="<?php echo $store_product_qty ?>"><br><br>
                                Available Quantity: <br>
                                <input type="number" class="form-control" name="available_qty" value="<?php echo $available_qty ?>"><br><br>
                                Product Price: <br>
                                <input type="text" class="form-control" name="store_product_price" value="<?php echo $store_product_price ?>"><br><br>
                                Store Entry Date : <br>
                                <input type="date" class="form-control" name="store_product_entrydate" value="<?php echo $store_product_entrydate ?>"><br><br>
                                <input type="text" class="form-control" name="store_product_id" value="<?php echo $store_product_id ?>" hidden>
                                <div class="text-center">
                                    <input type="submit" name="Update" class="btn btn-success" value="Update">
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
} else {
    header('location:login.php');
}
?>