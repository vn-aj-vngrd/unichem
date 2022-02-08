<?php 
    include('../crud/db_connect.php');
    
    $getCustomerList = "SELECT * FROM customer";
    $stmt = $conn->prepare($getCustomerList);
    $stmt->execute();
    
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "
            <div class=''>
            <h6>Customer List</h6>
                        <br>
            <div class='scroll-list-2'>
            ";
        while ($customer = $result->fetch_assoc()) {
            
            include('../components/customer/customer-list.php');
            
            
        }  
        echo "
        </div>
        </div>";
        
    }else{
        echo "<div class ='empty-list empty-message'>There are no Customers.</div>";
    }

    $stmt->close();
    $conn->close();
?>













