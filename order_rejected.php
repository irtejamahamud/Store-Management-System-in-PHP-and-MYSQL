<?php
    require('connector.php');
    $order_id = $_GET['id']; 

    $sql = "SELECT * FROM orders WHERE order_id=$order_id";
    $query = $conn->query($sql); 
    $data = mysqli_fetch_array($query);
    $order_product_id = $data['order_product_id'];
    $order_product_qty = $data['order_product_qty'];

    $sql2 = "UPDATE orders SET order_status='rejected' WHERE order_id=$order_id";
    $conn->query($sql2);

    $sql3 = "SELECT * FROM store_product WHERE store_product_name=$order_product_id";
    $query3 = $conn->query($sql3);
    $data3 = mysqli_fetch_array($query3);
    $available_qty = $data3['available_qty'];

    $updated_value= $available_qty+$order_product_qty;

    $sql4 = "UPDATE store_product SET available_qty='$updated_value' WHERE store_product_name=$order_product_id";
    $conn->query($sql4);
    header('location:pending_orders.php');
?>