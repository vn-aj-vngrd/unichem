<?php 
    include('../crud/db_connect.php');
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        switch($_POST['update']){
            case "customer":
                // bayot
                $customerID = $_POST['customerID'];
                $updateCustomerInformation = "UPDATE `customer`
                                            SET `customerFName`=?, 
                                            `customerLName`=?,
                                            `dateofBirth`=?,
                                            `email`=?,
                                            `gender`=?,
                                            `contactNo`=?
                                            WHERE customerID=?";

                $updateCustomerAddress = "UPDATE `customer_address`
                                            SET `street`=?,
                                            `barangay`=?,
                                            `city`=?,
                                            `region`=?,
                                            `country`=?,
                                            `zip`=?
                                            WHERE customerID=?";

                $stmtI = $conn->prepare($updateCustomerInformation);
                $stmtI->bind_param("ssssssi", $customerFname, $customerLname, $dateOfBirth, $gender, $contactNo, $email, $customerID);

                /* Customer Information */
                $customerFname = $_POST['customerFName'];
                $customerLname = $_POST['customerLName'];
                $email = $_POST['email'];
                $dateOfBirth = date('Y-m-d', strtotime($_POST['dateofBirth']));
                $gender = $_POST['gender'];
                $contactNo = $_POST['contactNo'];

                $stmtA = $conn->prepare($updateCustomerAddress);
                $stmtA->bind_param("ssssssi", $street, $barangay, $city, $region, $country, $zip, $customerID);
                                
                /* Customer Address */
                $street = $_POST['street'];
                $barangay = $_POST['barangay'];
                $city = $_POST['city'];
                $region = $_POST['region'];
                $country = $_POST['country'];
                $zip = $_POST['zip'];

                if ($stmtI->execute() && $stmtA->execute()) {
                    echo "Record updated successfully";
                    $stmtI->close();
                    $stmtA->close();
                    header('Location: ../sections/customers.php');
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                } 

                break;

            case "supplier":
                $supplierID = $_POST['supplierID'];
                
                

                $updateSupplierInformation = "UPDATE `supplier`
                                            SET `companyName`=?,
                                            `contactFName`=?, 
                                            `contactLName`=?,
                                            `email`=?,
                                            `contactNo`=?
                                            WHERE supplierID=?";

                $stmtI = $conn->prepare($updateSupplierInformation);
                $stmtI->bind_param("sssssi", $companyName, $contactFName, $contactLName, $email, $contactNo, $supplierID);
                $companyName = $_POST['companyName'];
                $contactFName = $_POST['contactFName'];
                $contactLName = $_POST['contactLName'];
                $email = $_POST['email'];
                $contactNo = $_POST['contactNo'];

                $updateSupplierAddress = "UPDATE `supplier_address`
                                            SET `street`=?,
                                            `barangay`=?,
                                            `city`=?,
                                            `region`=?,
                                            `country`=?,
                                            `zip`=?
                                            WHERE supplierID=?";

                $stmtA = $conn->prepare($updateSupplierAddress);
                $stmtA->bind_param("ssssssi", $street, $barangay, $city, $region, $country, $zip, $supplierID);
                $street = $_POST['street'];
                $barangay = $_POST['barangay'];
                $city = $_POST['city'];
                $region = $_POST['region'];
                $country = $_POST['country'];
                $zip = $_POST['zip'];

                if ($stmtI->execute() && $stmtA->execute()) {
                    echo "Record updated successfully";
                    $stmtI->close();
                    $stmtA->close();
                    header("Location: ../sections/suppliers.php");
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                } 

                break;

            case "user":
                
                $updateEmployee = "UPDATE `inventory_users`
                                            SET `userFirstName`=?, 
                                            `userLastName`=?,
                                            `email`=?,
                                            `userType`=?,
                                            `userName`=?,
                                            `password`=?
                                            WHERE userID=?";
        
                $stmt = $conn->prepare($updateEmployee);
                $stmt->bind_param("ssssssi", $userFirstName, $userLastName, $email, $userType, $userName, $password, $userID);

                $userID = $_POST['userID'];
                $userFirstName = $_POST['userFirstName'];
                $userLastName = $_POST['userLastName'];
                $email = $_POST['email'];
                $userType = $_POST['userType'];
                $userName = $_POST['userName'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                if ($stmt->execute()) {
                    echo "Record updated successfully";
                    $stmt->close();
                    header("Location: ../sections/employees.php");
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                } 

                break;

                case "product":
                    $productID = $_POST['productID'];

                    if(empty($_FILES['productImage']['name'])){
                        $updateProductInfo = "UPDATE `product`
                                                SET
                                                `tradeName`=?,
                                                `brandName`=?,
                                                `description`=?,
                                                `dateContained`=?,
                                                `price`=?,
                                                `applicationType`=?,
                                                `cureTime`=?,
                                                `color`=?,
                                                `form`=?,
                                                `packageType`=?,
                                                `packageSize`=?,
                                                `minOperatingTemp`=?,
                                                `maxOperatingTemp`=?,
                                                `viscosity`=?,
                                                `chemicalComposition`=?,
                                                `operatingTempRange`=?,
                                                `inStock`=?,
                                                `minimumStock`=?
                                                WHERE productID=?";

                        $stmt = $conn->prepare($updateProductInfo);

                        $stmt->bind_param("ssssissssssssssiisi",$tradeName, $brandName, $description, $dateContained, $price, $applicationType,
                        $cureTime, $color, $form, $packageType, $packageSize, $minOperatingTemp, $maxOperatingTemp, $viscosity, $chemicalComposition,
                        $operatingTempRange, $inStock, $minimumStock, $productID);

                        $tradeName = $_POST['tradeName'];
                        $brandName = $_POST['brandName'];
                        $description = $_POST['description'];
                        $dateContained = $_POST['dateContained'];
                        $price = $_POST['price'];
                        $applicationType = $_POST['applicationType'];
                        $cureTime = $_POST['cureTime'];
                        $color = $_POST['color'];
                        $form = $_POST['form'];
                        $packageType = $_POST['packageType'];
                        $packageSize = $_POST['packageSize'];
                        $minOperatingTemp = $_POST['minOperatingTemp'];
                        $maxOperatingTemp = $_POST['maxOperatingTemp'];
                        $viscosity = $_POST['viscosity'];
                        $chemicalComposition = $_POST['chemicalComposition'];
                        $operatingTempRange = $_POST['operatingTempRange'];
                        $inStock = $_POST['inStock'];
                        $minimumStock = $_POST['minimumStock'];

                        if ($stmt->execute()) {
                            echo "Record updated successfully";
                            $stmt->close();
                            header("Location: ../sections/inventory.php");
                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        } 

                    }else{
                        

                        $updateProductInfo = "UPDATE `product`
                                                SET
                                                `tradeName`=?,
                                                `brandName`=?,
                                                `description`=?,
                                                `dateContained`=?,
                                                `price`=?,
                                                `applicationType`=?,
                                                `cureTime`=?,
                                                `color`=?,
                                                `form`=?,
                                                `packageType`=?,
                                                `packageSize`=?,
                                                `minOperatingTemp`=?,
                                                `maxOperatingTemp`=?,
                                                `viscosity`=?,
                                                `chemicalComposition`=?,
                                                `operatingTempRange`=?,
                                                `productImage`=?,
                                                `inStock`=?,
                                                `minimumStock`=?
                                                WHERE productID=?";

                        $stmt = $conn->prepare($updateProductInfo);

                        $stmt->bind_param("ssssissssssssssssiii",$tradeName, $brandName, $description, $dateContained, $price, $applicationType,
                        $cureTime, $color, $form, $packageType, $packageSize, $minOperatingTemp,$maxOperatingTemp, $viscosity, $chemicalComposition,
                        $operatingTempRange, $filename, $inStock, $minimumStock, $productID);

                        $tradeName = $_POST['tradeName'];
                        $brandName = $_POST['brandName'];
                        $description = $_POST['description'];
                        $dateContained = $_POST['dateContained'];
                        $price = $_POST['price'];
                        $applicationType = $_POST['applicationType'];
                        $cureTime = $_POST['cureTime'];
                        $color = $_POST['color'];
                        $form = $_POST['form'];
                        $packageType = $_POST['packageType'];
                        $packageSize = $_POST['packageSize'];
                        $minOperatingTemp = $_POST['minOperatingTemp'];
                        $maxOperatingTemp = $_POST['maxOperatingTemp'];
                        $viscosity = $_POST['viscosity'];
                        $chemicalComposition = $_POST['chemicalComposition'];
                        $operatingTempRange = $_POST['operatingTempRange'];
                        $filename = $_FILES["productImage"]["name"];
                        $tempname = $_FILES["productImage"]["tmp_name"];
                        $folder = "../assets/images/".$filename;
                        $inStock = $_POST['inStock'];
                        $minimumStock = $_POST['minimumStock'];

                        if ($stmt->execute()) {
                            if (move_uploaded_file($tempname, $folder)) {
                                $msg = "Image uploaded successfully";
                            } else {
                                $msg = "Failed to upload image";
                            }
                            echo "Record updated successfully";

                            $stmt->close();
                            header("Location: ../sections/inventory.php");
                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        } 

                    }
            
                    
        
                    break;
        }
        $conn->close();
    }

