<div class="<?php echo $Order['orderStatus']; ?> white-box-container-details-card-status"><?php echo $Order['orderStatus']; ?></div>
<div class="white-box-container-details-card-body">
    <div class="row d-flex justify-content-between">
        <div class="col">
            <h4><b>#<?php echo $Order['orderID']; ?></b></h3>
        </div>
        <div class="col-md-auto">
            <?php echo $Order['orderDate']; ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-6 col-md-4">
            Customer ID<br>
            Created By<br>
            Approved By<br>
        </div>
        <div class="col-12 col-sm-6 col-md-8">
            <b>
                <?php echo $customer['customerFName']." ". $customer['customerLName'];; ?><br>
                <?php echo $createdBy['userFirstName']." ".$createdBy['userLastName']; ?><br>
                <?php
                    if($Order['approvedBy'] != NULL){
                        echo $approvedBy['userType']." #".$Order['approvedBy']." ".$approvedBy['userFirstName']." ".$approvedBy['userLastName']; 
                    }else{
                        echo "To-Approve";
                    }
                ?>

            </b>
        </div>
    </div>
    <hr>
    <?php include('../crud/customer/customer-orderline.php') ?>
    
    <hr>
    <div class="row d-flex justify-content-between">
        <div class="col">
            TotalPrice
        </div>
        <div class="col-4 d-flex justify-content-end">
            <b>₱ <?php echo $totalPrice; ?></b>
        </div>
    </div>
</div>


