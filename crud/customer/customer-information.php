<?php 
    include('../crud/db_connect.php');

    if (isset($_GET['customerID'])) {
        $customerID = $_GET['customerID'];
    }
    
    if(isset($customerID)){
        $getCustomerInformation = "SELECT * 
                                    FROM customer c, customer_address ca
                                    WHERE c.customerID=? 
                                    AND ca.customerID=?";
        $stmt = $conn->prepare($getCustomerInformation);
        $stmt->bind_param("ii", $customerID, $customerID);
        
        
        $stmt->execute();

        if ($result = $stmt->get_result()) {
            $customer = $result->fetch_assoc();
        }
        $stmt->close();
        
    }  
    $conn->close();
?>













