<?php

    include('../crud/db_connect.php');

    $sql = "SELECT * FROM product WHERE inStock > 0";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

?>