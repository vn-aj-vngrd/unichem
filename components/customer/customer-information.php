<?php 
if(isset($customerID)){
echo "
<div class='container white-box-container customer-supplier-information round-edge'>
    <div class='row'>
        <div class='col'>
            <h4><b> #".$customer['customerID']."</b></h3>
        </div>
        <div class='col d-flex justify-content-end'>
            
            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
            Update
            </button>

            
            <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-lg'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h4>Update Customer #".$customer['customerID']."</h4>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            ";
                            include('customer-update.php');
                        echo "
                        </div>
                        <div class='modal-footer'>
                                <div class=''>
                                    <button type='submit' class='btn btn-primary' value='submit'>Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class='row'>
        <div class='col'>
        </div>
    </div>
    <br>
    <div class='row'>
        <div class='col'>
            Contact Person<br>
            Contact No<br>
            Email Address
        </div>
        <div class='col-8'>
            <b>
                ".
                $customer['customerFName']." ".$customer['customerLName']."<br>".
                $customer['contactNo']."<br>".
                $customer['email']
               ."
            </b>
        </div>

    </div>
    <hr>
    <div class='row'>
        <div class='col'>
            Address ID<br>
            Street<br>
            Barangay<br>
            City<br>
            Region<br>
            Zip<br>
            Country
        </div>
        <div class='col-8'>
            <b>
                ".
                $customer['addressID']."<br>".
                $customer['street']."<br>".
                $customer['barangay']."<br>".
                $customer['city']."<br>".
                $customer['region']."<br>".
                $customer['zip']."<br>".
                $customer['country']."
                
            </b>
        </div>

    </div>

</div>
";
}else{
    echo "<div class ='empty-information empty-message'></div>";
}

?>