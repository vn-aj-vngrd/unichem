<?php
include('../crud/db_connect.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST['create']) {
        case "customer":

            $sql = "INSERT INTO `customer` (`customerFName`, `CustomerLName`, `dateofBirth`, `gender`, `contactNo`, `email`)
            VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $customerFname, $customerLname, $dateOfBirth, $gender, $contactNo, $email);

            /* Customer Information */
            $customerFname = $_POST['customerFName'];
            $customerLname = $_POST['customerLName'];
            $email = $_POST['email'];
            $dateOfBirth = date('Y-m-d', strtotime($_POST['dateofBirth']));
            $gender = $_POST['gender'];
            $contactNo = $_POST['contactNo'];

            if ($stmt->execute()) {
                $last_id = $conn->insert_id;

                /* Query to insert customer address */
                $sql = "INSERT INTO customer_address (customerID, street, barangay, city, region, country, zip)
                            VALUES (?, ?, ?, ?, ?, ?, ?)"; 
                            
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("issssss", $last_id, $street, $barangay, $city, $region, $country, $zip);
                            
                /* Customer Address */
                $street = $_POST['street'];
                $barangay = $_POST['barangay'];
                $city = $_POST['city'];
                $region = $_POST['region'];
                $country = $_POST['country'];
                $zip = $_POST['zip'];

                if ($stmt->execute()) {
                    echo '<br /> Created successfully.';
                }
                $stmt->close();
                $conn->close();
                header('Location: ../sections/customers.php');
                
            } else {
                echo "Creation is unsuccessful: " . $conn->error;
            }

            break;

        case "supplier":
            $insertInformation = "INSERT INTO `supplier` (`companyName`, `contactFName`, `contactLName`, `email`, `contactNo`)
                                            VALUES (?,?,?,?,?)";
            $stmtI = $conn->prepare($insertInformation);
            $stmtI->bind_param("sssss", $companyName, $contactFName, $contactLName, $email, $contactNo);

            $companyName = $_POST['companyName'];
            $contactFName = $_POST['contactFName'];
            $contactLName = $_POST['contactLName'];
            $email = $_POST['email'];
            $contactNo = $_POST['contactNo'];

            if ($stmtI->execute()) {
                $last_id = $conn->insert_id;

                $insertAddress = "INSERT INTO `supplier_address` (`supplierID`, `street`, `barangay`, `city`, `region`, `country`, `zip`)
                                            VALUES (?,?,?,?,?,?,?)";
                $stmtA = $conn->prepare($insertAddress);
                $stmtA->bind_param("issssss", $last_id, $street, $barangay, $city, $region, $country, $zip);
    
                $street = $_POST['street'];
                $barangay = $_POST['barangay'];
                $city = $_POST['city'];
                $region = $_POST['region'];
                $country = $_POST['country'];
                $zip = $_POST['zip'];
                $stmtA->execute();

                echo "Created successfully";
                $stmtI->close();
                $stmtA->close();
                $conn->close();
                header("Location: ../sections/suppliers.php");
            } else {
                echo "Creation is unsuccessful: " . $conn->error;
            }

            break;

        case "product":
            $insertProduct = "INSERT INTO `product` (`tradeName`, `brandName`, `description`, `dateContained`, `price`, `applicationType`,
                `cureTime`, `color`, `form`, `packageType`, `packageSize`, `minOperatingTemp`,`maxOperatingTemp`, `viscosity`, `chemicalComposition`,
                `operatingTempRange`, `productImage`, `inStock`, `minimumStock`)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($insertProduct);

            $stmt->bind_param("ssssisssssssssssiis",$tradeName, $brandName, $description, $dateContained, $price, $applicationType,
            $cureTime, $color, $form, $packageType, $packageSize, $minOperatingTemp,$maxOperatingTemp, $viscosity, $chemicalComposition,
            $operatingTempRange, $filename, $inStock, $minimumStock);

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

            $filename = $_FILES["productImage"]["name"];
            $tempname = $_FILES["productImage"]["tmp_name"];
            $folder = "../assets/images/".$filename;

            if ($stmt->execute()) {
                if (move_uploaded_file($tempname, $folder)) {
                    $msg = "Image uploaded successfully";
                } else {
                    $msg = "Failed to upload image";
                }
                echo "Created successfully";
                $stmt->close();
                $conn->close();
                header("Location: ../sections/inventory.php");
            } else {
                echo "Creation is unsuccessful: " . $conn->error;
            }

            break;

        case "user":
            $insertEmployee = "INSERT INTO `inventory_users`(`userID`, `userType`, `userFirstName`, `userLastName`, `userName`, `email`, `password`)
                VALUES (?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($insertEmployee);
            $stmt->bind_param("issssss", $userID,$userType,$userFirstName,$userLastName,$userName,$email,$password);

            $userID = $_POST['userID'];
            $userFirstName = $_POST['userFirstName'];
            $userLastName = $_POST['userLastName'];
            $email = $_POST['email'];
            $userType = $_POST['userType'];
            $userName = $_POST['userName'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if ($stmt->execute()) {
                echo "Created successfully";

                $stmt->close();
                $conn->close();
                header("Location: ../sections/employees.php");
            } else {
                echo "Creation is unsuccessful: " . $conn->error;
            }
    }
}