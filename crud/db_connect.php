<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $name = "info_mngmnt_db";
    
    $conn = new mysqli($host, $user, $pass, $name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>



