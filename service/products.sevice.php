<?php
    try{
        include "../connector.php";
        $product_id = $_GET["id"];
        $sql = "SELECT * FROM store_product WHERE store_product_id=$product_id";
        $query= $conn->query($sql);
        $data = array();
        while($row =mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
        echo json_encode($data);
    }catch(Exception $e){
        echo json_encode($e->getMessage());
    }
?>