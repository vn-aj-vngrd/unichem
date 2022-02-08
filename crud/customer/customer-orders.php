<?php 
    include('../crud/db_connect.php');

    if(isset($customerID)){
        
        $getCustomerOrderInformation = "SELECT * 
                                FROM orders
                                WHERE customerID=?";

        $stmt = $conn->prepare($getCustomerOrderInformation);
        $stmt->bind_param("i", $customerID);
        $stmt->execute();

        $result2 = $stmt->get_result();
        
        if ($result2->num_rows > 0) {
            echo "<div class='scroll-list-2'>";
            while ($Order = $result2->fetch_assoc()) {
                
                $createdByquery = "SELECT * 
                            FROM inventory_users
                            WHERE userID=? LIMIT 1";
                            
                $stmtCB = $conn->prepare($createdByquery);
                $stmtCB->bind_param("i", $createdByID);
                $createdByID = $Order['createdBy'];
                $stmtCB->execute();
              
                
                $resultC = $stmtCB->get_result();
                $createdBy = $resultC->fetch_assoc();
                
                if($Order['approvedBy'] != NULL) {
                    
                    $approvedByquery = "SELECT * 
                                FROM inventory_users
                                WHERE userID=? LIMIT 1";
                    $stmtAB = $conn->prepare($approvedByquery);
                    $stmtAB->bind_param("i", $approvedByID);
                    $approvedByID = $Order['approvedBy'];
                    $stmtAB->execute();
                    
                    $resultA = $stmtAB->get_result();
                    $approvedBy = $resultA->fetch_assoc();
                }
                    
                include('../components/customer/customer-order-details.php');
                $stmtCB->close();
                if(isset($stmtAB)){
                    $stmtAB->close();
                }
                
            }
            echo "</div>";
            echo "<div class ='empty-list empty-message'></div>";
        }
    }else{
        echo "<div class ='empty-list empty-message'></div>";
    }

    $stmt->close();
    
    $conn->close();











    


     
  


