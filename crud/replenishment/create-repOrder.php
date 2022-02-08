<?php
    include('../db_connect.php');
    session_start();
    $bool = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /* Rep Information */
        $createdBy = $_SESSION['userID']; 
        $supplierID = $_POST['supplierID'];
        $orderDate = date('Y-m-d');
        $shipRequiredDate = date('Y-m-d', strtotime($_POST['shippingDate']));
        $orderStatus = 'Awaiting-Approval';

        /* Query to insert replenishment information */
        $sql = "INSERT INTO replenishment
                    (supplierID, createdBy, repOrderDate, orderStatus, shipRequiredDate)
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('issss', $supplierID, $createdBy, $orderDate, $orderStatus, $shipRequiredDate);
        
        if ($stmt->execute()) {
            echo '<br /> Replenishment Information is successfully added.';
            $repOrderID = $conn->insert_id;
        }  else {
            echo '<br /> Replenishment Information is not successfully added. ' . $conn->error;
            $bool = false;
        }

        /* RepLine Information */
        $productID = $_POST['productID'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        /* Loop through the array of products and quantity */
        foreach($productID as $index => $elemID) {
            $prodID = $elemID;
            $qty = $quantity[$index];
            $priceEach = $price[$index];

            /* Query to insert replenishment line */
            $sql = "INSERT INTO replenishment_line
                        (repOrderID, productID, quantity, priceEach)
                    VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('iiid', $repOrderID, $prodID, $qty, $priceEach);        

            if ($stmt->execute()) {
                echo '<br /> A Replenishment Line is successfully added.';
            }  else {
                echo '<br /> A Replenishment Line is not successfully added. ' . $conn->error;
                $bool = false;
            }
        }

        $stmt->close();

    } else {
        $bool = false;
    }

    if ($bool)
        $_SESSION['msg'] = "Replenishment order is successfully created.";
    else 
        $_SESSION['msg'] = "Failed to create replenishment order.";

    $conn->close();

    header('location: ../../sections/replenishments.php');
?>