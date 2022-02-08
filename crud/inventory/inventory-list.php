<?php 
    include('../crud/db_connect.php');
    $bool = false;
    $getproduct = "SELECT * FROM product";
    
    $stmt = $conn->prepare($getproduct);
    $stmt->execute();
    $result = $stmt->get_result();
    
        echo "
        <div class='container-header d-flex'>
                <div class='list-cell-2'>
                        Product ID
                </div>
                
                <div class='list-cell-2'>
                        Trade Name
                </div>
                
                <div class='list-cell-2'>
                        Price
                </div>

                <div class='list-cell-2'>
                        Quantity
                </div>
        </div>
            
   <br>
    <div class='scroll-list-2'>
            ";
        if ($result->num_rows > 0) {
                while ($inventory = $result->fetch_assoc()) {
                
                        include('../components/inventory/inventory-list.php');
                        $bool = true;
                }  

        } else {
                echo "<div class ='empty-message'>There are no products in the inventory.</div>";           
        }

        echo "
        </div>
        ";
$stmt->close();
$conn->close();
?>