<?php 
    include('../crud/db_connect.php');

    if (isset($_GET['userID'])) {
        $userID = $_GET['userID'];
        
        if(isset($userID)){
            $getEmployeeInformation = "SELECT * 
                                        FROM inventory_users
                                        WHERE userID=?";

            $stmt = $conn->prepare($getEmployeeInformation);
            $stmt->bind_param("i", $userID);
            
            $stmt->execute();

            if ($result = $stmt->get_result()) {
                $user = $result->fetch_assoc();
            }   
            $stmt->close();
            
        } 
    
    }
    $conn->close();
?>













