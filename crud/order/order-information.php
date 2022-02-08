<?php
include('../crud/db_connect.php');

if (isset($_GET['orderID'])) {
    $orderID = $_GET['orderID'];
    
    $getOrderInformation = "SELECT *, SUM(ol.quantity * p.price) as 'Total' 
                                FROM orders o
                                JOIN order_line ol ON ol.orderID = o.orderID
                                JOIN product p ON ol.productID = p.productID
                                JOIN customer c on c.customerID = o.customerID
                                WHERE ol.orderID = $orderID
                                GROUP BY o.orderID";

    $getOrderLine = "SELECT *
                        FROM orders o
                        JOIN order_line ol ON ol.orderID = o.orderID
                        JOIN product p ON ol.productID = p.productID
                        JOIN customer c on c.customerID = o.customerID
                        WHERE ol.orderID = $orderID
                        GROUP BY ol.orderlineID";

    $stmt = $conn->prepare($getOrderInformation);
    $stmt->execute();
    $result1 = $stmt->get_result();

    $stmt = $conn->prepare($getOrderLine);
    $stmt->execute();
    $result2 = $stmt->get_result();

    if ($result1->num_rows > 0) {
        echo "<div class='scroll-list-2'>";
        if ($order = $result1->fetch_assoc()) {

            $createdByID = $order['createdBy'];
            $approvedByID = $order['approvedBy'];

            $createdByquery = "SELECT * 
                            FROM inventory_users
                            WHERE userID=$createdByID LIMIT 1";

            $stmt = $conn->prepare($createdByquery);
            $stmt->execute();
            $createdByResult = $stmt->get_result();
            $createdBy = $createdByResult->fetch_assoc();

            $approvedByquery = "SELECT * 
                            FROM inventory_users
                            WHERE userID=$approvedByID LIMIT 1";

            if (isset($approvedByID)) {
                $stmt = $conn->prepare($approvedByquery);
                $stmt->execute();
                $approvedByResult = $stmt->get_result();
                $approvedBy = $approvedByResult->fetch_assoc();
                $stmt->close();
            } else {
                $approvedByResult = false;
            }

            include('../components/order/order-information.php');
        }

        echo "</div>";
        
    }
}

$conn->close();

?>