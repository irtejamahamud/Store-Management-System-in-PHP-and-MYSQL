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
        <title>Category List</title>
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
                            $sql = "SELECT * FROM category";
                            $query = $conn->query($sql);

                            echo "<table class='table table-striped table-hover' ><tr><th>Category</th><th>Date</th><th>Action</th></tr>";
                            while($data = mysqli_fetch_array($query)){
                                    $category_id = $data['category_id'];
                                    $category_name = $data['category_name'];
                                    $category_entrydate = $data['category_entrydate'];

                                    echo "<tr>
                                            <td>$category_name</td>
                                            <td>$category_entrydate</td>
                                            <td>
                                            <a href='category_update.php?id=$category_id' class='btn btn-success'>
                                            Update
                                            </td>
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