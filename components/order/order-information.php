<div class="fadediv">
    <div class="<?php echo $order['orderStatus']; ?> white-box-container-details-card-status">
        <?php echo $order['orderStatus']; ?>
    </div>

    <div class="white-box-container-details-card-body rounded">
        <div class="row d-flex justify-content-between">
            <div class="col">
                <h5><b>#<?php echo $order['orderID'] ?></b></h5>
            </div>
            <div class="col-md-auto">
                <?php echo $order['orderDate'] ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-md-4">
                Customer Name <br>
                Created By<br>
                Approved By<br>
                Required Ship Date
            </div>
            <div class="col-12 col-sm-6 col-md-8">
                <b>
                    <?php
                    echo $order['customerFName'] . " " . $order['customerLName'] . "<br>";
                    echo $createdBy['userFirstName'] . " " . $createdBy['userLastName'] . "<br>";
                    if ($approvedByResult) {
                        echo $approvedBy['userFirstName'] . " " . $approvedBy['userLastName'] . "<br>";
                    } else {
                        echo "To-Approve" . "<br>";
                    }
                    echo $order['shipRequiredDate'];
                    ?>
                </b>
            </div>
        </div>
        <hr>
        <?php while ($row = $result2->fetch_assoc()) { ?>
            <div class="row d-flex justify-content-between">
                <div class="col">
                    <b><?php echo $row['productID']; ?>#</b>
                    <?php echo $row['tradeName']; ?>
                </div>

                <div class="col-md-auto d-flex justify-content-start">
                    x <?php echo $row['quantity']; ?>
                </div>

                <div class="col-md-auto d-flex justify-content-end">
                    ₱ <?php echo $row['price']; ?>
                </div>

                <div class="col-md-auto d-flex justify-content-end">
                    ₱ <?php echo $row['price'] * $row['quantity']; ?>
                </div>
            </div>
        <?php } ?>
        <hr>
        <div class="row d-flex justify-content-between">
            <div class="col">
                Total Price
            </div>
            <div class="col-4 d-flex justify-content-end">
                <b>₱ <?php echo $order['Total'] ?></b>
            </div>
        </div>
    </div>
</div>