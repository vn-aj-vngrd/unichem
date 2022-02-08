<?php
    include('../crud/db_connect.php');

    $getRecentReps = "SELECT * 
                        FROM replenishment r 
                        WHERE DATEDIFF(r.repOrderDate, CURDATE()) <= 0 
                        AND DATEDIFF(r.repOrderDate, CURDATE()) >= -1";

    $stmt = $conn->prepare($getRecentReps);
    $stmt->execute();
    $recentRepsQuery = $stmt->get_result(); 

    if ($recentRepsQuery->num_rows > 0){
        while($row = $recentRepsQuery->fetch_array()) {

            $getSupplierInfo = "SELECT *
                                    FROM supplier s 
                                    WHERE s.supplierID = '$row[supplierID]'";

            $stmt = $conn->prepare($getSupplierInfo);
            $stmt->execute();
            $supplierInfoQuery = $stmt->get_result(); 
            $row2 = $supplierInfoQuery->fetch_array();

            $getProductID = "SELECT * 
                                FROM replenishment_line rl 
                                WHERE rl.repOrderID = '$row[repOrderID]'";

            $stmt = $conn->prepare($getProductID);
            $stmt->execute();
            $productIDQuery = $stmt->get_result(); 

            while($row3 = $productIDQuery->fetch_array()) {

                $getProdInfo = "SELECT * 
                                    FROM product p 
                                    WHERE p.productID = '$row3[productID]'";

                $stmt = $conn->prepare($getProdInfo);
                $stmt->execute();
                $prodInfoQuery = $stmt->get_result(); 
                $row4 = $prodInfoQuery ->fetch_array();

                include("../components/notifications/rep-list-recent.php");
            }
        }
    } else {
        echo "<p class='text-muted'>There are no new replenishments.</p>";
    }

    $stmt->close();
    $conn->close();
?>