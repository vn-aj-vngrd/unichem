<?php
    $modal = $rep['orderStatus'] . $rep['repOrderID'];

    echo "
        <div class='d-flex align-items-center justify-content-between white-box-container one-order-replenishment-list round-edge'>
            <div class='list-cell'>
                <b> #" . $rep['repOrderID'] . "</b>
            </div>

            <div class='list-cell'>
            " . $rep['companyName'] ."
            </div>
            

            <div class='list-cell'>
                ". $rep['repOrderDate'] ."
            </div>

            <div class='list-cell'>
                ". $rep['contactNo'] ."
            </div>
                
            <div class='list-cell'>
            ". "₱ " . $rep['Total'] ."
            </div>

            <div>
                <form method='get' action='replenishments.php'>
                    <input type='hidden' name='repID' value='".$rep['repOrderID']."'>
                    <input type='hidden' name='repActive' value='" . $rep['orderStatus'] . "'>
                    <button type='submit' class='btn btn-link btn-preview'>Preview</button>
                </form>
            </div>

            <div>
                <a type='button' class='btn btn-link btn-update' data-bs-toggle='modal' data-bs-target='" . "#" . $modal . "'>Update</a>
            </div>

        </div>

    ";

    // Update Modal
    include("../components/replenishment/update-repOrder.php")
?>





