<?php
    function data_list($tablename, $col1, $col2)
    {
        require('connector.php');
        $sql = "select * from $tablename";
        $query = $conn->query($sql);
    
        while ($data = mysqli_fetch_array($query)) {
            $data_id = $data[$col1];
            $data_name = $data[$col2];
            
            echo "<option value='$data_id'>$data_name</option>";
        }
    }

    function totalAmountSpend($customer_id)
    {
        require('connector.php');
        $sql = "select sum(order_product_qty * order_product_price) as sumamount from orders where order_customer_id=$customer_id and order_status='approved'";
        $query = $conn->query($sql);
        $data = mysqli_fetch_array($query);
        $sumamount=$data['sumamount'];
        return $sumamount;
    }

    function pendingOrders()
    {
        require('connector.php');
        $sql = "select count(order_status) as totalOrder from orders where order_status='pending'";
        $query = $conn->query($sql);
        $data = mysqli_fetch_array($query);
        $totalOrder=$data['totalOrder'];
        return $totalOrder;
    }

    function totalCustomer()
    {
        require('connector.php');
        $sql = "select count(customer_id) as totalCustomer from customer";
        $query = $conn->query($sql);
        $data = mysqli_fetch_array($query);
        $totalCustomer=$data['totalCustomer'];
        return $totalCustomer;
    }

    function totalSales()
    {
        require('connector.php');
        $sql = "select sum(order_product_qty * order_product_price) as sumamount from orders";
        $query = $conn->query($sql);
        $data = mysqli_fetch_array($query);
        $sumamount=$data['sumamount'];
        return $sumamount;
    }
?>