<?php
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost','root','','db_projetweb');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("Insert into registration(mail, password) values(?, ?");
        $stmt->bind_param("ss", $mail, $password);
        $stmt->execute();
        echo "Registration Successful...";
        $stmt->close();
        $conn->close();
    }

?>
