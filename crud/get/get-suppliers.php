<?php

    include('../crud/db_connect.php');

    $sql = "SELECT * FROM supplier";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

?>