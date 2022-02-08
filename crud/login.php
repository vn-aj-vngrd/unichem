<?php
session_start();
include('../crud/db_connect.php');

$location = '../index.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['email'])) {
        $_SESSION['msg'] = "Email Address is required";
        header("Location: $location");
        exit;
    } else $email = $_POST['email'];

    if (empty($_POST['password'])) {
        $_SESSION['msg'] = "Password is required";
        header("Location: $location");
        exit;
    } else $password = $_POST['password'];

    $checkuser = "SELECT * 
                    FROM `inventory_users`
                    WHERE `email`= (?)
                    LIMIT 1";
                                    
    if ($stmt = $conn->prepare($checkuser)) {
        $stmt->bind_param('s', $email);

        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {

                session_regenerate_id();
                $_SESSION['userID'] = $user['userID'];
                $_SESSION['userType'] = $user['userType'];
                $_SESSION['userName'] = $user['userName'];
            
                $location = '../sections/notifications.php';
            } else {
                $_SESSION['msg'] = "Invalid Email or Password";
            }
        }
        else {
            $_SESSION['msg'] = "Invalid Email or Password";
        }

        $stmt->close();

    } else {
        $_SESSION['msg'] = "Invalid Email or Password";
    }
} 

$conn->close();

header("Location: $location");

?>

