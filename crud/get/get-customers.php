<?php

    include('../crud/db_connect.php');

    $sql = "SELECT * FROM customer";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

?>