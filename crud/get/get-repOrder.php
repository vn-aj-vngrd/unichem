<?php

    include('../crud/db_connect.php');

    $id = $rep['repOrderID'];

    $sql = "SELECT *
            FROM
                replenishment r
            JOIN replenishment_line rl ON
                rl.repOrderID = r.repOrderID
            JOIN product p ON
                p.productID = rl.productID
            WHERE r.repOrderID = (?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $rs = $stmt->get_result();

?>