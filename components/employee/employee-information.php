<?php
if(isset($userID)){
    echo "

    <div class='container white-box-container customer-supplier-information round-edge'>
        <div class='row'>
            <div class='col'>
                <h4><b>".$user['userID']."</b></h3>
            </div>
            <div class='col d-flex justify-content-end'>
                
                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                Update
                </button>

                <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog modal-lg'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h4>Update Employee ".$user['userID']."</h4>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                ";
                                include('employee-update.php');
                                echo"
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
                User Type<br>
                Username<br>
                First Name<br>
                Last Name<br>
                Email Address<br>
                
            </div>
            <div class='col-8'>
                <b>
                    ".
                    $user['userType']."<br>".
                    $user['userName']."<br>".
                    $user['userFirstName']."<br>".
                    $user['userLastName']."<br>".
                    $user['email']."
                </b>
            </div>

        </div>
    

        </div>
    ";
    }else{
        echo "<div class ='empty-information empty-message'></div>";
    }
?>