<?php
    include('../db_connect.php');
    session_start();
    $bool = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['old'])) {
            $customerID = $_POST['customer'];
        } else {
            /* Query to insert customer information */
            $sql = "INSERT INTO customer (customerFName, CustomerLName, dateofBirth, gender, contactNo, email)
                        VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $customerFname, $customerLname, $dateOfBirth, $gender, $contactNo, $email);

            /* Customer Information */
            $customerFname = $_POST['customerFname'];
            $customerLname = $_POST['customerLname'];
            $email = $_POST['emailAddress'];
            $dateOfBirth = date('Y-m-d', strtotime($_POST['dateOfBirth']));
            $gender = $_POST['gender'];
            $contactNo = $_POST['contactNo'];
            
            if ($stmt->execute()) {
                echo '<br /> Customer Information is successfully added.';
                $customerID = $conn->insert_id;
            } else {
                echo '<br /> Customer Information is not successfully added. ' .  $conn->error;
                $bool = false;
            }

            /* Query to insert customer address */
            $sql = "INSERT INTO customer_address (customerID, street, barangay, city, region, country, zip)
                        VALUES (?, ?, ?, ?, ?, ?, ?)"; 
                        
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issssss", $customerID, $street, $barangay, $city, $region, $country, $zip);
                        
            /* Customer Address */
            $street = $_POST['street'];
            $barangay = $_POST['barangay'];
            $city = $_POST['city'];
            $region = $_POST['region'];
            $country = $_POST['country'];
            $zip = $_POST['zip'];

            if ($stmt->execute()) {
                echo '<br /> Customer Address is successfully added.';
            }  else {
                echo '<br /> Customer Address is not successfully added. ' . $conn->error;
                $bool = false;
            }
        }

        /* Query to insert order information */
        $sql = "INSERT INTO orders (customerID, createdBy, orderDate, orderStatus, shipRequiredDate) 
                    VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $customerID, $createdBy, $orderDate, $orderStatus, $shippingDate);

        /* Order Information */
        $createdBy = $_SESSION['userID'];
        $orderStatus = 'Awaiting-Approval';
        $orderDate = date('Y-m-d');
        $shippingDate = date('Y-m-d', strtotime($_POST['shippingDate']));

        if ($stmt->execute()) {
            echo '<br /> Order Information is successfully added.';
            $orderID = $conn->insert_id;
        }else {
            echo '<br /> Order Information is not successfully added. ' . $conn->error;
            $bool = false;
        }

        /* Orderline Information */
        $productID = $_POST['productID'];
        $quantity = $_POST['quantity'];

        /* Loop through the array of products and quantity */
        foreach($productID as $index => $elemID)
        {
            $prodID = $elemID;
            $qty = $quantity[$index];

            /* Query to get current InStock */
            $sql = "SELECT *
                        FROM product
                        WHERE productID = (?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $prodID);
            $stmt->execute();
                        
            if ($stmt->execute()) {
                $result = $stmt->get_result(); 
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<br /> InStock: ' . $row['inStock'];
                }
                echo '<br /> In Stock is fetched successfully.';
            }else {
                echo '<br /> In Stock is not fetched successfully. ' . $conn->error;
                $bool = false;
            }

            /* Check if InStock is greater or equal to given quantity */
            if ($row['inStock'] >= $qty) {

                /* Query to insert the specific order */
                $sql = "INSERT INTO order_line (orderID, productID, quantity) VALUES (?, ?, ?)";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iii", $orderID, $prodID, $qty);

                if ($stmt->execute()) {
                    echo '<br /> An Order Line is successfully added.';
                }else {
                    echo '<br /> An Order Line is not successfully added. ' . $conn->error;
                    $bool = false;
                }

                /* Query to update InStock */
                $sql = "UPDATE product
                            SET inStock = IF(inStock >= (?), inStock - (?), inStock)
                            WHERE productID = (?) ";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iii", $qty, $qty, $prodID);
                
                if ($stmt->execute()) {
                    echo '<br /> Product In Stock is successfully updated';
                }else {
                    echo '<br /> Product In Stock is not successfully updated ' . $conn->error;
                    $bool = false;
                }
            } else {
                
                /* Query to delete order information when Instock is lesser than given quantity */
                $sql = "DELETE FROM orders 
                            WHERE orderID = (?)";
                
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iii", $orderID);

                if ($stmt->execute()) {
                    echo '<br /> Deleted successfully';
                }else {
                    echo '<br /> Deletion is unsuccessful ' . $conn->error;
                }
                $bool = false;
            }
        }

        $stmt->close(); 
        
    } else {
        $bool = false;
    }

    if ($bool) $_SESSION['msg'] = "Order is successfully created.";
    else $_SESSION['msg'] = "Failed to create order.";

    $conn->close();

    header('location: ../../sections/orders.php');
?>