<?php
    require('connector.php');

    //to load category name
    $sql2 = "SELECT * FROM category";
    $query2 = $conn->query($sql2);

    $data_list = array();

    while ($data2 = mysqli_fetch_array($query2)) {
        $category_id = $data2['category_id'];
        $category_name = $data2['category_name'];
        $data_list[$category_id] = $category_name;
    }

    session_start();
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

    if(!empty($user_first_name) && !empty($user_last_name)){
?>

<!DOCTYPE html>

<html>

<head>
    <title>Product List</title>
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
                        <div class="container p-4 m-4 ">
                            <?php
                            $sql = "SELECT * FROM product";
                            $query = $conn->query($sql);

                            echo "<table class='table table-striped table-hover'><tr><th>Name</th><th>Category</th><th>Code</th><th>Action</th></tr>";
                            while ($data = mysqli_fetch_array($query)) {
                                $product_id = $data['product_id'];
                                $product_name = $data['product_name'];
                                $product_category = $data['product_category'];
                                $product_code = $data['product_code'];

                                echo "<tr>
                                                <td>$product_name</td>
                                                <td>$data_list[$product_category]</td>
                                                <td>$product_code</td>
                                                <td><a href='product_update.php?id=$product_id' class='btn btn-success'>Update</a></td>
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
    }
    else{
        header('location:login.php');
    }
?>