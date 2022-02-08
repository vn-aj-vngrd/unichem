<?php 
    include('../crud/db_connect.php');
    
    $getSupplierList = "SELECT * FROM supplier";
    $stmt = $conn->prepare($getSupplierList);
    $stmt->execute();

    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "
            <div class=''>
            <h6>Supplier List</h6>
                        <br>
            <div class='scroll-list'>
            ";
        while ($Supplier = $result->fetch_assoc()) {
            
                include('../components/supplier/supplier-list.php');
            
            
        }  
        echo "
            </div>
            </div>
        ";
    }else{
        echo "<div class ='empty-list empty-message'>There are no Suppliers.</div>";
    }
    $stmt->close();
    $conn->close();
