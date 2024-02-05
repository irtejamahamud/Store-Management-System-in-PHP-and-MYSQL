<?php
    require('connector.php');
    $order_id = $_GET['id']; 
    echo '$order_id';  
    $sql = "UPDATE orders SET order_status='approved' WHERE order_id=$order_id";
    $conn->query($sql);
    header('location:pending_orders.php');
?>