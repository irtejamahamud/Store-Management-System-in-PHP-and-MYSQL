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
        <title>Update Category</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            if (isset($_GET['id'])) {
                                $getid =  $_GET['id'];
                                $sql = "SELECT * FROM category where 	category_id=$getid";
                                $query = $conn->query($sql);

                                $data = mysqli_fetch_array($query);

                                $category_id = $data['category_id'];
                                $category_name = $data['category_name'];
                                $category_entrydate = $data['category_entrydate'];
                            }

                            if (isset($_GET['category_name'])) {

                                $new_category_id =  $_GET['category_id'];
                                $new_category_name =  $_GET['category_name'];
                                $new_category_entrydate =  $_GET['category_entrydate'];

                                $sql2 = "UPDATE category SET category_name='$new_category_name',category_entrydate='$new_category_entrydate' WHERE category_id=$new_category_id";

                                if ($conn->query($sql2) == true) {
                                    echo "Updated Successfully";
                                } else
                                    echo "Updated Not Successfully";
                            }

                            ?>
                            <form action="category_update.php" method="GET">
                                Category Name : <br>
                                <input type="text" class="form-control" name="category_name" value="<?php echo $category_name ?>"><br><br>
                                Category Entry Date : <br>
                                <input type="date" class="form-control" name="category_entrydate" value="<?php echo $category_entrydate ?>"><br><br>
                                <input type="text" class="form-control" name="category_id" value="<?php echo $category_id ?>" hidden>

                                <div class="text-center">
                                    <input type="submit" name="Update" class="btn btn-success" value="Update">
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
} else {
    header('location:login.php');
}
?>