<?php

include('../crud/db_connect.php');

if(!isset($_GET['customerID'])){

    $getCustomerList = "SELECT * FROM customer LIMIT 1";
    $stmt = $conn->prepare($getCustomerList);
    $stmt->execute();
    if ($result = $stmt->get_result()) {
    // if ($result = mysqli_query($conn, $getCustomerList)) {
        if ($defaultCustomer = $result->fetch_assoc()){
            $_GET['customerID'] = $defaultCustomer['customerID'];
        }
    }
    $stmt->close();
    
    
}
$conn->close();