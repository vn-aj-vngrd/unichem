<?php 
    include('../crud/db_connect.php');

    $orderID = $Order['orderID'];

    $getCustomerOrderLine = "SELECT * FROM order_line ol, product p 
                            WHERE orderID=?
                            AND ol.productID=p.productID";
    $stmt = $conn->prepare($getCustomerOrderLine);
    $stmt->bind_param("i", $orderID);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $totalPrice=0;
    while ($OrderLine = $result->fetch_assoc()) {
        
        include('../components/customer/customer-orderline.php');
        $totalPrice += $totalEach;
    }
  

    $stmt->close();
