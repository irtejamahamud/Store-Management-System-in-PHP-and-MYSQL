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
    <title>User Update</title>
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
                    <div class="col-sm-9 border-start border-success">
                        <!-- start code for this page -->
                        <div class="container p-4 m-4">
                            <?php
                            $sql = "SELECT * FROM users";
                            $query = $conn->query($sql);

                            echo "<table class='table table-striped table-hover'><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr>";
                            while ($data = mysqli_fetch_array($query)) {
                                $user_id = $data['user_id'];
                                $user_first_name = $data['user_first_name'];
                                $user_last_name = $data['user_last_name'];
                                $user_email = $data['user_email'];

                                echo "<tr>
                                    <td>$user_first_name</td>
                                    <td>$user_last_name</td>
                                    <td>$user_email</td>
                                    <td><a href='user_update.php?id=$user_id' class='btn btn-success'>Update</td>
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