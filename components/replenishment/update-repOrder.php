<form method="post" action="../crud/replenishment/update-repOrder.php">
    <div class="modal fade" id="<?php echo $modal ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex flex-row">
                        <div class="p-2">
                            <h5 class="modal-title" id="exampleModalLabel">Update Information</h5>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <?php if ($rep['orderStatus'] != "Awaiting-Approval") { ?>
                            <div class="p-2">
                                <select class="form-select" name="orderStatus">
                                    <option value="<?php echo $rep['orderStatus'] ?>" selected disabled><?php echo $rep['orderStatus'] ?></option>
                                    <option value="Awaiting-Payment">Awaiting-Payment</option>
                                    <option value="Processing-Order">Processing-Order</option>
                                    <option value="Awaiting-Shipment">Awaiting-Shipment</option>
                                    <option value="Awaiting-Pickup">Awaiting-Pickup</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Manaul-Verification-Required">Manual-Verification-Required</option>
                                    <option value="Refunded">Refunded</option>
                                </select>
                            </div>
                            <!-- ELSE IF USER TYPE = MANAGER -->
                        <?php } else if ($_SESSION['userType'] == "Manager") { ?>
                            <div class="p-2">
                                <select class="form-select" name="orderStatus">
                                    <option value="<?php echo $rep['orderStatus'] ?>" selected disabled><?php echo $rep['orderStatus'] ?></option>
                                    <option value="Awaiting-Payment">Awaiting-Payment</option>
                                    <option value="Processing-Order">Processing-Order</option>
                                    <option value="Awaiting-Shipment">Awaiting-Shipment</option>
                                    <option value="Awaiting-Pickup">Awaiting-Pickup</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Manaul-Verification-Required">Manual-Verification-Required</option>
                                    <option value="Refunded">Refunded</option>
                                </select>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <input type="hidden" name="defaultOrderStatus" value="<?php echo $rep['orderStatus'] ?>">
                <div class="modal-body">

                    <div class="row g-3">
                        <b>Product Information</b>
                        <?php
                        include("../crud/get/get-repOrder.php");
                        
                        if ($rs->num_rows > 0) { 
                            while ($row = $rs->fetch_assoc()) {
                        ?>

                            <div class="col-md-6">
                                <label class="col-form-label">Product</label>
                                <input type="hidden" class="form-control" name="product[]" value="<?php echo $row['productID']?>"/>
                                <input type="text" class="form-control" value="<?php echo $row['tradeName']?>" readonly/>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label">Quantity</label>
                                <input type="text" class="form-control" name="quantity[]" value="<?php echo $row['quantity'] ?>" readonly/>
                            </div>

                        <?php      
                            } 
                        }
                        ?>

                        <div class="col-md-6">
                            <label class="col-form-label">Order Date</label>
                            <input type="date" class="form-control" name="orderDate" value="<?php echo $rep['repOrderDate'] ?>" />
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">Ship Required Date</label>
                            <input type="date" class="form-control" name="shippingDate" value="<?php echo $rep['shipRequiredDate'] ?>" />
                        </div>

                        <hr>
                        <b>Supplier Information</b>

                        <div class="col-md-4">
                            <label class="col-form-label">Company Name</label>
                            <input type="text" class="form-control" name="companyName" value="<?php echo $rep['companyName'] ?>" disabled />
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Contact First Name</label>
                            <input type="text" class="form-control" name="contactFName" value="<?php echo $rep['contactFName'] ?>" disabled />
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Contact Last Name</label>
                            <input type="text" class="form-control" name="contactLName" value="<?php echo $rep['contactLName'] ?>" disabled />
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $rep['email'] ?>" disabled />
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Contact Number</label>
                            <input type="text" class="form-control" name="contactNo" value="<?php echo $rep['contactNo'] ?>" disabled />
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type='hidden' name='repOrderID' value=" <?php echo $rep['repOrderID'] ?>">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <?php if ($rep['orderStatus'] == "Cancelled" || $rep['orderStatus'] == "Completed" || $rep['orderStatus'] == "Refunded") { ?>
                        <a href="../crud/delete.php?id=<?php echo $rep['repOrderID']?>&delete=replenishment&status=<?php echo $rep['orderStatus']?>" type="submit" class="btn btn-danger">Delete</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </div>
        </div>
    </div>
</form>