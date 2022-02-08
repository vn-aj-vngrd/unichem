<div class='d-flex align-items-center justify-content-between white-box-container one-supplier-customer-list-long round-edge'>
    <div class='column d-flex align-items-center reports-left-data'>
        <div>
            <b> <?php echo $row2['customerID'] . "# "  . $row2['customerFName'] . " " . $row2['customerLName'] ?></b>
        </div>
    </div>
    <div class='column reports-right-data'>
        <?php echo "Order ID: " . $row['orderID'] ?>
    </div>
    <div class='column reports-right-data'>
        <?php echo $row4['tradeName'] ?>
    </div>
    <div class='column reports-right-data'>
        <?php echo "Qty: " . $row3['quantity'] ?>
    </div>
    <div class='column reports-right-data'>
        <?php echo "₱ " . $row3['quantity'] * $row4['price'] ?>
    </div>
    <div class='column reports-right-data-long'>
        <?php echo "". $row['orderStatus']?>
    </div>
</div>