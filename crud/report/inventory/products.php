<?php
    include('../../crud/db_connect.php');

    $query = "SELECT productID, tradeName, inStock from product";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $exec = $stmt->get_result();
    $stmt->close();

    $conn->close();
?>



