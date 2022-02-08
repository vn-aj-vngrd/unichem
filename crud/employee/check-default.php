<?php

include('../crud/db_connect.php');

if(!isset($_GET['userID'])){

    $getEmployeeList = "SELECT * FROM inventory_users WHERE userType=? LIMIT 1";
    $stmt = $conn->prepare($getEmployeeList);
    $stmt->bind_param("s", $User);
    $User = "User";
    $stmt->execute();

    $result = $stmt->get_result();
       
    if ($defaultEmployee =  $result->fetch_assoc())
        $_GET['userID'] = $defaultEmployee['userID'];

    $stmt->close();
   
}
$conn->close();