<?php 
    include('../crud/db_connect.php');
    
    $getRepList = "SELECT *, SUM(rl.quantity * rl.priceEach) as 'Total' 
                    FROM
                    replenishment r
                    JOIN supplier s ON
                        r.supplierID = s.supplierID
                    JOIN inventory_users iu ON
                        r.createdBy = iu.userID
                    JOIN replenishment_line rl ON
                        rl.repOrderID = r.repOrderID
                    JOIN product p ON
                        rl.productID = p.productID
                    WHERE
                        r.orderStatus = 'Cancelled'
                    GROUP BY r.repOrderID";

    $stmt = $conn->prepare($getRepList);
    $stmt->execute();

    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "
            <div class=''>
            <div class='scroll-list'>
            ";
        while ($rep = $result->fetch_assoc()) {
            include('../components/replenishment/rep-list.php');
        } 
        echo "
        </div>
        </div>
    ";
    }else{
        echo "<div class ='empty-message'>There are no Cancelled Replenishments.</div>";
    }

    $stmt->close();
    $conn->close();
?>