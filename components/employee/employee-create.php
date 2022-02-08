<div class="container white-box-container round-edge">
                    <form method="post" action="../crud/create.php" class="row g-3">
                        <input type="hidden" name="create" value="user">
                        <h4>Create Employee</h4>
                        <input type="hidden" name="userID">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name="userFirstName" required >
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="inputPassword4" name="userLastName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="" placeholder="" name="email" required >
                        </div>
                        <div class="col-md-6">
                            <label for="userType" class="form-label">User Type</label>
                            <select name="userType" id="inputState" class="form-select" required>
                                <option value=""></option>
                                <option value="Manager">Manager</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Username</label>
                            <input type="text" class="form-control" id="inputEmail4" name="userName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="text" class="form-control" id="inputPassword4" name="password" required>
                        </div>
                        <div class="col-md-4"><br>
                            <button type="submit" class="btn btn-primary" value="submit">Create</button>
                        </div>
                        
                    </form>
                </div>