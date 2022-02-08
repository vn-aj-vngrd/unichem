
        <?php
        
        $userID = $user["userID"];
        $userFName = $user["userFirstName"];
        $userLName = $user["userLastName"];
        
            echo "
                    <form method='get' action='employees.php'>
                        
                        <div class='d-flex align-items-center justify-content-between white-box-container one-supplier-customer-list round-edge'>
                            <div class='column list-name'>
                                <b>" . "$userID" . "# " . "$userFName" . " " . "$userLName" . "</b>
                            </div>
                            <div class=''>
                                    <form method='get' action='../sections/employees.php'>
                                        <input type='hidden' name='userID' value='".$userID."'>
                                        <button type='submit' class='btn btn-link btn-preview'>Preview</button>
                                    </form>
                            </div>

                            <div class=''>
                                    <form method='get' action='../crud/delete.php'>
                                        <input type='hidden' name='delete' value='employee'>
                                        <input type='hidden' name='userID' value='".$userID."'>
                                        <button type='submit' class='btn btn-link btn-delete'>Delete</button>
                                    </form>
                            </div>
                        </div>
                    </form>
                ";
        

        ?>

