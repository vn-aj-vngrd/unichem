<?php
include('../crud/db_connect.php');

if (isset($_GET['repID'])) {
    $repID = $_GET['repID'];

    $getRepInformation = "SELECT *, SUM(rl.quantity * rl.priceEach) as 'Total' 
                            FROM replenishment r
                            JOIN replenishment_line rl ON rl.repOrderID = r.repOrderID
                            JOIN product p ON rl.productID = p.productID
                            JOIN supplier s ON s.supplierID = r.supplierID
                            WHERE rl.repOrderID = $repID
                            GROUP BY r.repOrderID";

    $getRepLine = "SELECT *
                        FROM replenishment r
                        JOIN replenishment_line rl ON rl.repOrderID = r.repOrderID
                        JOIN product p ON rl.productID = p.productID
                        JOIN supplier s ON s.supplierID = r.supplierID
                        WHERE rl.repOrderID = $repID
                        GROUP BY rl.replenishmentLineID";


    $stmt = $conn->prepare($getRepInformation );
    $stmt->execute();
    $result1 = $stmt->get_result();

    $stmt = $conn->prepare($getRepLine);
    $stmt->execute();
    $result2 = $stmt->get_result();


    if ($result1->num_rows > 0) {
        echo "<div class='scroll-list-2'>";
        if ($rep = mysqli_fetch_assoc($result1)) {

            $createdByID = $rep['createdBy'];
            $approvedByID = $rep['approvedBy'];

            $createdByquery = "SELECT * 
                            FROM inventory_users
                            WHERE userID=$createdByID LIMIT 1";

            $approvedByquery = "SELECT * 
                            FROM inventory_users
                            WHERE userID=$approvedByID LIMIT 1";

            $stmt = $conn->prepare($createdByquery);
            $stmt->execute();
            $createdByResult = $stmt->get_result();
            $createdBy = $createdByResult->fetch_assoc();

            if (isset($approvedByID)) {
                $stmt = $conn->prepare($approvedByquery);
                $stmt->execute();
                $approvedByResult = $stmt->get_result();
                $approvedBy = $approvedByResult->fetch_assoc();
                $stmt->close();
            } else {
                $approvedByResult = false;
            }

            include('../components/replenishment/rep-information.php');
        }
        echo "</div>";
    }
}

$conn->close();

?>