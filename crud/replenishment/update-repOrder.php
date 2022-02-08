<?php
    session_start();
    include('../db_connect.php');

    $active = "../../sections/replenishments.php?repActive=".$_POST['defaultOrderStatus'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product = $_POST['product'];
        $quantity = $_POST['quantity'];

        /* Update Order quantity if status is changed to completed*/
        if (!isset($_POST['orderStatus'])) {
            $orderStatus = $_POST['defaultOrderStatus'];
        }
        else {
            $orderStatus = $_POST['orderStatus'];
            if ($orderStatus == "Completed") {
                foreach($product as $index => $prodID) {
                    $productID = $prodID;
                    $qty = $quantity[$index];
        
                    /* Query to update InStock */
                    $sql = "UPDATE product
                                SET inStock = inStock + '$qty'
                                WHERE productID = (?) ";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('i', $productID);
                    
                    if ($stmt->execute()) {
                        echo '<br /> Product In Stock is successfully updated';
                    }else {
                        echo '<br /> Product In Stock is not successfully updated ' . $conn->error;
                    }
                }
            }
        }

        /* Replenishment Information */
        $orderDate = $_POST['orderDate'];
        $shippingDate = $_POST['shippingDate'];
        $repOrderID = $_POST['repOrderID'];

        /* Query to update repOrder information */
        /* First check if order status is awaiting-approval, then allow admin to approve the order */

        if ($_POST['defaultOrderStatus'] == 'Awaiting-Approval' && $orderStatus != 'Awaiting-Approval') {
            $approvedBy = $_SESSION['userID'];

            $sql = "UPDATE replenishment
                        SET repOrderDate = (?), shipRequiredDate = (?),
                            orderStatus = (?), approvedBy = (?)
                        WHERE repOrderID = (?) ";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssii', $orderDate, $shippingDate, $orderStatus, $approvedBy, $repOrderID);

            if ($stmt->execute()) {
                echo '<br /> Replenishment Order Information is successfully updated.';
            } else {
                echo '<br /> Replenishment Order Information is not successfully updated. ' . $conn->error;
            }
        } else {
            $sql = "UPDATE replenishment
                        SET repOrderDate = (?), shipRequiredDate = (?),
                            orderStatus = (?)
                        WHERE repOrderID = (?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssi', $orderDate, $shippingDate, $orderStatus, $repOrderID);

            if ($stmt->execute()) {
            echo '<br /> Replenishment Order Information is successfully updated.';
            } else {
            echo '<br /> Replenishment Order Information is not successfully updated. ' . $conn->error;
            }
        }
        $stmt->close();
    }
     
   
    $conn->close();

    header("location: $active");
?>