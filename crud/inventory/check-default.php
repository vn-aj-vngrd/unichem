<?php

include('../crud/db_connect.php');

if(!isset($_GET['productID'])){

    $getProductList = "SELECT * FROM product LIMIT 1";

    if ($stmt = $conn->prepare($getProductList)) {
        $stmt->execute();
        $result = $stmt->get_result();
        if ($defaultproduct = $result->fetch_assoc()) {
            $_GET['productID'] = $defaultproduct['productID'];
        }
    }

    $stmt->close();
}

$conn->close();

?>