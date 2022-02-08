
<?php
    include('../../crud/db_connect.php');

    $query = "SELECT MONTH(repOrderDate) AS month, YEAR(repOrderDate) AS year, COUNT(*) AS repCount
                FROM replenishment
                GROUP BY MONTH(repOrderDate), YEAR(repOrderDate) 
                ORDER BY repOrderDate ASC
                LIMIT 24";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $conn->close();     
?>