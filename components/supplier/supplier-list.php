
        <?php
        
        $supplierID = $Supplier["supplierID"];
        $supplierFName = $Supplier["contactFName"];
        $supplierLName = $Supplier["contactLName"];
        
            echo "
                    <form method='get' action='suppliers.php'>
                        
                        <div class='d-flex align-items-center justify-content-between white-box-container one-supplier-customer-list round-edge'>
                            <div class='column list-name'>
                                <b>#$supplierID</b> $supplierFName $supplierLName 
                            </div>
                            <div class=''>
                                    <form method='get' action='../sections/suppliers.php'>
                                        <input type='hidden' name='supplierID' value='".$supplierID."'>
                                        <button type='submit' class='btn btn-link btn-preview'>Preview</button>
                                    </form>
                            </div>

                            <div class=''>
                                    <form method='get' action='../crud/delete.php'>
                                        <input type='hidden' name='delete' value='supplier'>
                                        <input type='hidden' name='supplierID' value='".$supplierID."'>
                                        <button type='submit' class='btn btn-link btn-delete'>Delete</button>
                                    </form>
                            </div>
                        </div>
                    </form>
                ";
        

        ?>

