<?php 
    include('../crud/db_connect.php');
    
    $getEmployeeList = "SELECT * FROM inventory_users WHERE userType='User'";
    $stmt = $conn->prepare($getEmployeeList);
    $stmt->execute();

    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "
            <div class=''>
            <h6>Employee List</h6>
                        <br>
            <div class='scroll-list-2'>
            ";
        while ($user = $result->fetch_assoc()) {
            
            include('../components/employee/employee-list.php');
            
            
        }  
        echo "
            </div>
            </div>
        ";
    }else{
        echo "<div class ='empty-list empty-message'>There are no employees.</div>";
    }
    $stmt->close();
    $conn->close();

    
?>













