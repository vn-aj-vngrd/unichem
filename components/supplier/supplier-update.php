                    <form method="post" action="../crud/update.php" class="row g-3">
                        <input type="hidden" name="update" value="supplier">
                        
                        <input type="hidden" name="supplierID" value="<?php echo $supplier['supplierID']; ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="" placeholder="" name="companyName" required value="<?php echo $supplier['companyName']; ?>">
                        </div> 
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name="contactFName" required value="<?php echo $supplier['contactFName']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="inputPassword4" name="contactLName" required value="<?php echo $supplier['contactLName']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="" placeholder="" name="email" required value="<?php echo $supplier['email']; ?>">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="inputZip" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="inputZip" name="contactNo" required value="<?php echo $supplier['contactNo']; ?>">
                        </div>

                        <br><br><br><br><br><hr>
                        <br><br>

                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Street</label>
                            <input type="text" class="form-control" id="inputEmail4" name="street" required value="<?php echo $supplier['street']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Barangay</label>
                            <input type="text" class="form-control" id="inputEmail4" name="barangay" required value="<?php echo $supplier['barangay']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">City</label>
                            <input type="text" class="form-control" id="inputPassword4" name="city" required value="<?php echo $supplier['city']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">State</label>
                            <input type="text" class="form-control" id="inputCity" name="region" required value="<?php echo $supplier['region']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Country</label>
                            <input type="text" class="form-control" id="inputCity" name="country" required value="<?php echo $supplier['country']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="inputZip" name="zip" required value="<?php echo $supplier['zip']; ?>">
                            
                        </div>
                        