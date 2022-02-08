<?php
    include('../../crud/db_connect.php');

    $query = "SELECT orderStatus, COUNT(*) AS Quantity FROM `replenishment` GROUP BY orderStatus";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $exec = $stmt->get_result();
    $stmt->close();

    $conn->close();
?>