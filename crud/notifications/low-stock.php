<?php
    include('../crud/db_connect.php');

    $getLowStock = "SELECT * FROM product p WHERE p.inStock <= p.minimumStock";

    $stmt = $conn->prepare($getLowStock);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            include("../components/notifications/low-stock.php");
        }
    } else {
        echo "<p class='text-muted'>There are no low level stock in the inventory.</p>";
    }

    $stmt->close();
    $conn->close();
?>
