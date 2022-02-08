<?php
    session_start();
    include('../db_connect.php');

    $active = "../../sections/orders.php?orderActive=".$_POST['defaultOrderStatus'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $product = $_POST['product'];
        $quantity = $_POST['quantity'];

        /* Update Order quantity if status is changed to cancelled*/
        if (!isset($_POST['orderStatus'])) {
            $orderStatus = $_POST['defaultOrderStatus'];
        }
        else {
            $orderStatus = $_POST['orderStatus'];
            if ($orderStatus == "Cancelled") {
                foreach($product as $index => $prodID) {
                    $productID = $prodID;
                    $qty = $quantity[$index];
        
                    /* Query to update InStock */
                    $sql = "UPDATE product
                                SET inStock = inStock + (?)
                                WHERE productID = (?) ";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ii', $qty, $productID);

                    if ($stmt->execute()) {
                        echo '<br /> Product In Stock is successfully updated';
                    }else {
                        echo '<br /> Product In Stock is not successfully updated ' . $conn->error;
                    }
                }
            }
        }

        /* Order Information */
        $orderID = $_POST['orderID'];
        $orderDate = $_POST['orderDate'];
        $shippingDate = date('Y-m-d', strtotime($_POST['shippingDate']));

        /* Query to update order information */
        /* First check if order status is awaiting-approval, then allow admin to approve the order */

        if ($_POST['defaultOrderStatus'] == 'Awaiting-Approval' && $orderStatus != 'Awaiting-Approval') {
            $approvedBy = $_SESSION['userID'];

            $sql = "UPDATE orders 
                        SET orderDate = (?), shipRequiredDate = (?), orderStatus = (?), approvedBy = (?)
                        WHERE orderID = (?) ";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssii', $orderDate, $shippingDate, $orderStatus, $approvedBy, $orderID);
            
            if ($stmt->execute()) {
                echo '<br /> Order Information is successfully updated.';
            } else {
                echo '<br /> Order Information is not successfully updated. ' . $conn->error;
            }
        
        } else {
            $sql = "UPDATE orders 
                        SET orderDate = (?), shipRequiredDate = (?), orderStatus = (?)
                        WHERE orderID = (?) ";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssi', $orderDate, $shippingDate, $orderStatus, $orderID);

            if ($stmt->execute()) {
                echo '<br /> Order Information is successfully updated.';
            } else {
                echo '<br /> Order Information is not successfully updated. ' . $conn->error;
            }
        }

        /* Query to update customer information */
        $sql = "UPDATE customer
                    SET customerFName = (?), customerLName = (?), dateofBirth = (?), gender = (?), 
                        contactNo = (?), email = (?)
                    WHERE customerID = (?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssi', $customerFname, $customerLname, $dateOfBirth, $gender, $contactNo, $email, $customerID);

        /* Customer Information */
        $customerID = $_POST['customerID']; 
        $customerFname = $_POST['fname'];
        $customerLname = $_POST['lname'];
        $email = $_POST['email'];
        $dateOfBirth = date('Y-m-d', strtotime($_POST['dob']));
        $gender = $_POST['gender'];
        $contactNo = $_POST['contactNo'];

        if ($stmt->execute()) {
            echo '<br /> Customer Address is successfully updated.';
        } else {
            echo '<br /> Customer Address is not successfully updated. ' . $conn->error;
        }

        /* Query to update customer address */
        $sql = "UPDATE customer_address 
                    SET street = (?), barangay = (?), city = (?), region = (?), country = (?), zip = (?)
                    WHERE addressID = (?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssi', $street, $barangay, $city, $region, $country, $zip, $addressID);

        /* Customer Address */
        $addressID = $_POST['addressID']; 
        $street = $_POST['street'];
        $barangay = $_POST['barangay'];
        $city = $_POST['city'];
        $region = $_POST['region'];
        $country = $_POST['country'];
        $zip = $_POST['zip'];
        
        if ($stmt->execute()) {
            echo '<br /> Customer Address is successfully updated.';
        } else {
            echo '<br /> Customer Address is not successfully updated. ' . $conn->error;
        }
        $stmt->close();
    } 

    $conn->close();

    header("location: $active");
?>