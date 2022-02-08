<div class='d-flex align-items-center justify-content-between white-box-container one-supplier-customer-list-long round-edge'>
    <div class='column d-flex align-items-center reports-left-data'>
        <img src='../assets/images/low-stock-notif.png' width='20' height='20'>
        &nbsp
        &nbsp
        &nbsp
        <div>
            <div>
                <b class="text-danger">Low On Stock</b>
            </div>

            <div>
                <?php
                if ($row['inStock'] == $row['minimumStock']) {
                    echo "" . $row['tradeName'] . " is at minimum stock.";
                } elseif ($row['inStock'] < $row['minimumStock'] and $row['inStock'] > 0) {
                    echo "" . $row['tradeName'] . " is below minimum stock.";
                } elseif ($row['inStock'] == 0) {
                    echo "" . $row['tradeName'] . " stock is at 0!";
                }
                echo " </div> ";
                ?>
            </div>
        </div>

        <div class='column reports-right-data'>
            <?php echo "Product ID: " . $row['productID'] ?>
        </div>
        <div class='column reports-right-data'>
            <?php echo  $row['tradeName'] ?>
        </div>
        <div class='column reports-right-data'>
            <?php echo "Qty: " . $row['inStock'] ?>
        </div>
</div>