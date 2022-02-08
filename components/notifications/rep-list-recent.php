<div class='d-flex align-items-center justify-content-between white-box-container one-supplier-customer-list-long round-edge'>
    <div class='column d-flex align-items-center reports-left-data'>
        <div>
            <b> <?php echo $row2['supplierID']."# ".$row2['companyName'] ?></b>
        </div>
    </div>
    <div class='column reports-right-data'>
        <?php echo "Rep ID: ".$row['repOrderID'] ?>
    </div>
    <div class='column reports-right-data'>
        <?php echo $row4['tradeName'] ?>
    </div>
    <div class='column reports-right-data'>
        <?php echo "Qty: ".$row3['quantity'] ?>
    </div>
    <div class='column reports-right-data'>
        <?php echo "₱ ".$row3['quantity']*$row3['priceEach'] ?>
    </div>
</div>