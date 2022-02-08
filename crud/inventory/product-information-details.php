<?php 
    include('../crud/db_connect.php');

    if (isset($_GET['productID'])) {
        $productID = $_GET['productID'];
        
        $getProductInformation = "SELECT * 
                                    FROM product
                                    WHERE productID=$productID LIMIT 1";
        
        if ($stmt = $conn->prepare($getProductInformation)) {
            $stmt->execute();
            $result = $stmt->get_result();
            $inventory = $result->fetch_assoc();
        };
        $stmt->close();
    }
    $conn->close();
?>