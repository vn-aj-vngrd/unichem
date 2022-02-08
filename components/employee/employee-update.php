                    <form method="post" action="../crud/update.php" class="row g-3">
                        <input type="hidden" name="update" value="user">
                        <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name="userFirstName" required value="<?php echo $user['userFirstName']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="inputPassword4" name="userLastName" required value="<?php echo $user['userLastName']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="" placeholder="" name="email" required value="<?php echo $user['email']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="userType" class="form-label">User Type</label>
                            <select name="userType" id="inputState" class="form-select">
                                <option value="User">User</option>
                                <option value="Manager">Manager</option>
                                
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Username</label>
                            <input type="text" class="form-control" id="inputEmail4" name="userName" required value="<?php echo $user['userName']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="text" class="form-control" id="inputPassword4" name="password" required value="<?php echo $user['password']; ?>">
                        </div>
                        