                    <form method="post" action="../crud/update.php" class="row g-3">
                        <input type="hidden" name="update" value="customer">
                        <input type="hidden" name="customerID" value="<?php echo $customer['customerID']; ?>">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name="customerFName" required value="<?php echo $customer['customerFName']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="inputPassword4" name="customerLName" required value="<?php echo $customer['customerLName']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="" placeholder="" name="email" required value="<?php echo $customer['email']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="inputCity" name="dateofBirth" required value="<?php echo $customer['dateofBirth']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="inputState" class="form-select">
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="inputZip" name="contactNo" required value="<?php echo $customer['contactNo']; ?>">
                        </div>

                        <br><br><br><br><br><hr>
                        <br><br>

                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Street</label>
                            <input type="text" class="form-control" id="inputEmail4" name="street" required value="<?php echo $customer['street']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Barangay</label>
                            <input type="text" class="form-control" id="inputEmail4" name="barangay" required value="<?php echo $customer['barangay']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">City</label>
                            <input type="text" class="form-control" id="inputPassword4" name="city" required value="<?php echo $customer['city']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">Region</label>
                            <input type="text" class="form-control" id="inputCity" name="region" required value="<?php echo $customer['region']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Country</label>
                            <input type="text" class="form-control" id="inputCity" name="country" required value="<?php echo $customer['country']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="inputZip" name="zip" required value="<?php echo $customer['zip']; ?>">
                            
                        </div>
                        