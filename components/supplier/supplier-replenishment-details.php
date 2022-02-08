<div class="<?php echo $Replenishment['orderStatus']; ?> white-box-container-details-card-status"><?php echo $Replenishment['orderStatus']; ?></div>
<div class="white-box-container-details-card-body">
    <div class="row d-flex justify-content-between">
        <div class="col">
            <h4><b>#<?php echo $Replenishment['repOrderID']; ?></b></h3>
        </div>
        <div class="col-md-auto">
            <?php echo $Replenishment['repOrderDate']; ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-6 col-md-4">
            Supplier ID<br>
            Created By<br>
            Approved By<br>
        </div>
        <div class="col-12 col-sm-6 col-md-8">
            <b>
                <?php echo $supplier['contactFName']." ".$supplier['contactLName']; ?><br>
                <?php echo $createdBy['userFirstName']." ".$createdBy['userLastName']; ?><br>

                <?php 
                if($Replenishment['approvedBy'] != NULL){
                    echo $approvedBy['userFirstName']." ".$approvedBy['userLastName']; 
                }else{
                    echo "To-Approve";
                }
                ?><br>
                
                

            </b>
        </div>
    </div>
    <hr>
    <?php include('../crud/supplier/supplier-replenishmentline.php') ?>
    
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


