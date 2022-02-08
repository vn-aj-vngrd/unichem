<?php

include('../crud/db_connect.php');

if(!isset($_GET['supplierID'])){

    $getSupplierList = "SELECT * FROM supplier LIMIT 1";
    $stmt = $conn->prepare($getSupplierList);
    $stmt->execute();
    if ($result = $stmt->get_result()) {
        if ($defaultSupplier = $result->fetch_assoc()) {
            $_GET['supplierID'] = $defaultSupplier['supplierID'];
        }
    }
    $stmt->close();

    
    
   
}
$conn->close();