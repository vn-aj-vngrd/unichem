<div class="container white-box-container round-edge">
                    <form method="post" action="../crud/create.php" class="row g-3">
                        <input type="hidden" name="create" value="customer">
                        <h4>Create Customer</h4>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name="customerFName" required?>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="inputPassword4" name="customerLName" required >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="" placeholder="" name="email" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="inputCity" name="dateofBirth" required>
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="inputState" class="form-select" required>
                                <option value=""></option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="inputZip" name="contactNo" required>
                        </div>

                        <br><br><br><br><br><hr>
                        <br><br>

                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Street</label>
                            <input type="text" class="form-control" id="inputEmail4" name="street" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Barangay</label>
                            <input type="text" class="form-control" id="inputEmail4" name="barangay" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">City</label>
                            <input type="text" class="form-control" id="inputPassword4" name="city" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">Region</label>
                            <input type="text" class="form-control" id="inputCity" name="region" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Country</label>
                            <input type="text" class="form-control" id="inputCity" name="country" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="inputZip" name="zip" required>
                            
                        </div>
                        <div class="col-md-4"><br>
                            <button type="submit" class="btn btn-primary" value="submit">Create</button>
                        </div>
                        
                    </form>
                </div>