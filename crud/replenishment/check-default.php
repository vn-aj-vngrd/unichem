<?php

include('../crud/db_connect.php');

if(!isset($_GET['repID'])){

    $getRepList = "SELECT * FROM replenishment 
                    WHERE orderStatus = 'Awaiting-Approval'
                    LIMIT 1";

    $stmt = $conn->prepare($getRepList);
    $stmt->execute();

    if ($result = $stmt->get_result()) {
        if ($defaultRep = $result->fetch_assoc()) {
            $_GET['repID'] = $defaultRep['repOrderID'];
        }
    }

    $stmt->close();
}

$conn->close();
?>