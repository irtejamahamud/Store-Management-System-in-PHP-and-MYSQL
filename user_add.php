<?php
require('connector.php');
?>

<!DOCTYPE html>

<html>

<head>
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card">
                    <div class="card-body mx-5">
                        <?php
                        if (isset($_GET['user_first_name'])) {
                            $user_first_name = $_GET['user_first_name'];
                            $user_last_name = $_GET['user_last_name'];
                            $user_email = $_GET['user_email'];
                            $user_password = $_GET['user_password'];

                            $sql = "INSERT INTO users(user_first_name,user_last_name,user_email,user_password) VALUES ('$user_first_name','$user_last_name','$user_email','$user_password')";

                            if ($conn->query($sql) == TRUE) {
                                echo "User Register Success";
                            } else {
                                echo "Data Not Inserted";
                            }
                        }
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                            User First Name: <br>
                            <input type="text" name="user_first_name" class="form-control my-3 py-2" placeholder="First Name">
                            User Last Name: <br>
                            <input type="text" name="user_last_name" class="form-control my-3 py-2" placeholder="Last Name">
                            Email : <br>
                            <input type="email" name="user_email" class="form-control my-3 py-2" placeholder="Email">
                            Password : <br>
                            <input type="password" name="user_password" class="form-control my-3 py-2" placeholder="Password">
                            <div class="text-center">
                                <input type="submit" name="Register" class="btn btn-primary px-5"></br>
                                <h4 class="my-2">If already Register, then <a href="login.php" class='btn btn-success my-4'>Login</a> </h4>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>