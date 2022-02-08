<?php
    $modal = $order['orderStatus'] . $order['orderID'];

    echo "
        <div class='d-flex align-items-center justify-content-between white-box-container one-order-replenishment-list round-edge'>
            <div class='list-cell'>
                <b> #" . $order['orderID'] . "</b>
            </div>

            <div class='list-cell'>
            " . $order['customerLName'] . ", " . $order['customerFName'] . "
            </div>
            
            <div class='list-cell'>
                " . $order['orderDate'] . "
            </div>

            <div class='list-cell'>
                " . $order['contactNo'] . "
            </div>
                
            <div class='list-cell'>
            " . "₱ " . $order['Total'] . "
            </div>

            <div>
                <form method='get' action='orders.php'>
                    <input type='hidden' name='orderID' value='" . $order['orderID'] . "'>
                    <input type='hidden' name='orderActive' value='" . $order['orderStatus'] . "'>
                    <button type='submit' class='btn btn-link btn-preview'>Preview</button>
                </form>
            </div>

            <div>
                <a type='button' class='btn btn-link btn-update' data-bs-toggle='modal' data-bs-target='" . "#" . $modal . "'>Update</a>
            </div>

        </div>
    ";

    // Update Modal
    include("../components/order/update-order.php");
?>

