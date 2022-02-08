<?php
    include('../../crud/db_connect.php');

    $query = "SELECT MONTH(o.orderDate) AS month, YEAR(o.orderDate) AS year, SUM(ol.quantity) AS quantity
                FROM orders o 
                JOIN order_line ol 
                ON o.orderID=ol.orderID 
                JOIN product p ON ol.productID=p.productID 
                WHERE o.orderStatus='Completed'
                GROUP BY MONTH(o.orderDate), YEAR(o.orderDate) 
                ORDER BY o.orderDate ASC
                LIMIT 24";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $conn->close();
?>