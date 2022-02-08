
        <?php
        
        $CustomerID = $customer["customerID"];
        $CustomerFName = $customer["customerFName"];
        $CustomerLName = $customer["customerLName"];
        
            echo "
                    <form method='get' action='customers.php'>
                        
                        <div class='d-flex align-items-center justify-content-between white-box-container one-supplier-customer-list round-edge'>
                            <div class='column list-name'>
                                <b>" . "$CustomerID" . "# </b>" . "$CustomerFName" . " " . "$CustomerLName" . "
                            </div>
                            <div class=''>
                                    <form method='get' action='../sections/customers.php'>
                                        <input type='hidden' name='customerID' value='".$CustomerID."'>
                                        <button type='submit' class='btn btn-link btn-preview'>Preview</button>
                                    </form>
                            </div>

                            <div class=''>
                                    <form method='get' action='../crud/delete.php'>
                                        <input type='hidden' name='delete' value='customer'>
                                        <input type='hidden' name='customerID' value='".$CustomerID."'>
                                        <button type='submit' class='btn btn-link btn-delete'>Delete</button>
                                    </form>
                            </div>
                        </div>
                    </form>
                ";
        

        ?>

