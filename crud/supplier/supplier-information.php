<?php 
    include('../crud/db_connect.php');

    if(isset($supplierID)){
        $supplierID = $_GET['supplierID'];
        $getSupplierInformation = "SELECT * 
                                FROM supplier c, supplier_address ca
                                WHERE c.supplierID=? 
                                AND ca.supplierID=?";

        $stmt = $conn->prepare($getSupplierInformation);
        $stmt->bind_param("ii", $supplierID, $supplierID);
        $stmt->execute();
        if ($result = $stmt->get_result()) {
            $supplier = $result->fetch_assoc();
        }
        $stmt->close();
    }
    $conn->close();

    
?>













