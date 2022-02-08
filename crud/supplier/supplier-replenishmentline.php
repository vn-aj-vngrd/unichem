<?php 
    include('../crud/db_connect.php');

    $repOrderID = $Replenishment['repOrderID'];

    $getSupplierOrderLine = "SELECT * FROM replenishment_line rl, product p 
                            WHERE repOrderID=?
                            AND rl.productID=p.productID";
    $stmt = $conn->prepare($getSupplierOrderLine);
    $stmt->bind_param("i", $repOrderID);
    $stmt->execute();

    $result = $stmt->get_result();
    $totalPrice=0;
    while ($ReplenishmentLine = $result->fetch_assoc()) {
            
        include('../components/supplier/supplier-replenishment.php');
        $totalPrice += $totalEach;
    }
    $stmt->close();


