<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "store_management_system";

    // database conncet
    $conn = new mysqli($hostname,$username,$password,$dbname);

    //check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
?>

