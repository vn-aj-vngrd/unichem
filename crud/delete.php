<?php 
    include('db_connect.php');
    session_start();
    
    switch($_GET['delete']){
        case "customer": 
            $deleteCustomer = "DELETE FROM customer WHERE customerID=?";
            $stmt = $conn->prepare($deleteCustomer);
            $stmt->bind_param("i", $customerID);
            $customerID = $_GET['customerID'];
            $stmt->execute();
           
            $stmt->close();
            $conn->close();
            header("Location: ../sections/customers.php");      
            break;
        case "supplier": 
            $deleteSupplier = "DELETE FROM supplier WHERE supplierID=?";
            $stmt = $conn->prepare($deleteSupplier);
            $stmt->bind_param("i", $supplierID);
            $supplierID = $_GET['supplierID'];
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header("Location: ../sections/suppliers.php");      
            break;
        case "inventory":
            $deleteproduct = "DELETE FROM product WHERE productID=?";
            $stmt = $conn->prepare($deleteproduct);
            $stmt->bind_param("i", $productID);
            $productID = $_GET['productID'];
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header("Location: ../sections/inventory.php");      
            break;

        case "employee":
            $deleteEmp = "DELETE FROM inventory_users WHERE userID=?";
            $stmt = $conn->prepare($deleteEmp);
            $stmt->bind_param("i", $userID);
            $userID = $_GET['userID'];
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header("Location: ../sections/employees.php");      
            break;

        case "order":
            $orderID = $_GET['id'];
            $active = "../sections/orders.php?orderActive=" .$_GET['status'];

            $deleteOrder = "DELETE FROM orders WHERE orderID = (?)";
            $stmt = $conn->prepare($deleteOrder);
            $stmt->bind_param('i', $orderID);

            if ($stmt->execute()) 
                $_SESSION['msg'] = "Order is successfully deleted.";
            else 
                $_SESSION['msg'] = "Failed to delete order.";

            $stmt->close();
            $conn->close();
            header("Location: $active"); 
            break;      
        case "replenishment":
            $repID = $_GET['id'];
            $active = "../sections/replenishments.php?repActive=" .$_GET['status'];
            
            $deleteRep = "DELETE FROM replenishment WHERE repOrderID = (?)";
            $stmt = $conn->prepare($deleteRep);
            $stmt->bind_param('i', $repID);

            if ($stmt->execute()) 
                $_SESSION['msg'] = "Replenishment order is successfully deleted.";
            else 
                $_SESSION['msg'] = "Failed to delete replenishment order.";
  
            $stmt->close();
            $conn->close();
            header("Location: $active"); 
            break;   
         
    }  
    
    
?>
