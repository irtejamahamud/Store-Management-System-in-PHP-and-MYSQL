<?php
    require('connector.php');

    session_start();
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

    if(!empty($user_first_name) && !empty($user_last_name)){
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Add Product</title>
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
                                if(isset($_GET['product_name'])){
                                    $product_name = $_GET['product_name'];
                                    $product_category = $_GET['product_category'];
                                    $product_code = $_GET['product_code'];
                                    $product_entrydate = $_GET['product_entrydate'];

                                    $sql = "INSERT INTO product(product_name,product_category,product_code,product_entrydate) 
                                        VALUES ('$product_name','$product_category','$product_code','$product_entrydate')";

                                    if ($conn->query($sql) == TRUE) {
                                        echo "Data Inserted";
                                    } else {
                                        echo "Data Not Inserted";
                                    }
                                }
                            ?>

                            <?php 
                                $sql = "select * from category";
                                $query = $conn->query($sql);
                            ?>

                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                                Product Name: <br>
                                <input type="text" class="form-control" name="product_name"><br><br>
                                Product Category: <br>
                                <select class="form-control" name="product_category">
                                    <?php
                                        while($data = mysqli_fetch_array($query)){
                                        $category_id = $data['category_id'];
                                        $category_name= $data['category_name'];

                                        echo "<option value='$category_id'>$category_name</option>";
                                        }
                                    ?> 
                                </select><br><br> 
                                Product Code: <br>
                                <input type="text" class="form-control" name="product_code"><br><br>
                                Product Entry Date : <br>
                                <input type="date" class="form-control" name="product_entrydate"><br><br>
                                <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-success">
                                </div>
                            </form>
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