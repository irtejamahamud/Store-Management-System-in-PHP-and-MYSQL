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
                            if(isset( $_GET['id'])){
                                $getid =  $_GET['id'];
                                $sql = "SELECT * FROM users where user_id=$getid";
                                $query = $conn->query($sql);

                                $data = mysqli_fetch_array($query);

                                $user_id          = $data['user_id'];
                                $user_first_name  = $data['user_first_name'];
                                $user_last_name   = $data['user_last_name'];
                                $user_email       = $data['user_email'];
                                $user_password    = $data['user_password'];
                            }

                            if(isset( $_GET['user_first_name'])){
                                $new_user_first_name  =  $_GET['user_first_name'];
                                $new_user_last_name   =  $_GET['user_last_name'];
                                $new_user_email =  $_GET['user_email'];
                                $new_user_password  =  $_GET['user_password'];
                                $new_user_id  =  $_GET['user_id'];
                                
                                $sql2 = "UPDATE users SET user_first_name='$new_user_first_name',
                                user_last_name='$new_user_last_name',
                                user_email='$new_user_email',
                                user_password='$new_user_password' WHERE user_id=$new_user_id";

                                if($conn->query($sql2) == true){
                                    echo "Updated Successfully";
                                }
                                else
                                    echo "Updated Not Successfully";
                            }

                            ?>
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                                User First Name: <br>
                                <input type="text" class="form-control" name="user_first_name" value="<?php echo $user_first_name?>"><br><br>
                                User Last Name: <br>
                                <input type="text" class="form-control" name="user_last_name" value="<?php echo $user_last_name?>"><br><br>
                                Email : <br>
                                <input type="email" class="form-control" name="user_email" value="<?php echo $user_email?>"><br><br>
                                Password : <br>
                                <input type="password" class="form-control" name="user_password" value="<?php echo $user_password?>"><br><br>
                                <input type="text" class="form-control" name="user_id" value="<?php echo $user_id?>" hidden>
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