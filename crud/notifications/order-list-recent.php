<?php
    include('../crud/db_connect.php');

    $getRecentOrders = "SELECT * 
                            FROM orders o 
                            WHERE DATEDIFF(o.orderDate, CURDATE()) <= 0 
                            AND DATEDIFF(o.orderDate, CURDATE()) >= -1";

    $stmt = $conn->prepare($getRecentOrders);
    $stmt->execute();
    $recentOrderQuery = $stmt->get_result(); 

    if ($recentOrderQuery->num_rows > 0) {
        while ($row = $recentOrderQuery->fetch_array()) {
            $getCustomerInfo = "SELECT * 
                                    FROM customer c 
                                    WHERE c.customerID = '$row[customerID]'";

            $stmt = $conn->prepare($getCustomerInfo);
            $stmt->execute();
            $result1 = $stmt->get_result(); 
            $row2 = $result1->fetch_array();

            $getProductID = "SELECT * 
                                FROM order_line ol 
                                WHERE ol.orderID = '$row[orderID]'";

            $stmt = $conn->prepare($getProductID);
            $stmt->execute();
            $productIDQuery = $stmt->get_result(); 

            while ($row3 = $productIDQuery->fetch_array()) {
                $getProdInfo = "SELECT * 
                                    FROM product p 
                                    WHERE p.productID = '$row3[productID]'";

                $stmt = $conn->prepare($getProdInfo);
                $stmt->execute();
                $prodInfoQuery = $stmt->get_result(); 
                $row4 = $prodInfoQuery->fetch_array();

                include("../components/notifications/order-list-recent.php");
            }
        }
    }  else {
        echo "<p class='text-muted'>There are no new orders.</p>";
    }
    
    $stmt->close();
    $conn->close();
?> 