<?php
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'sample');
    if($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    }else {
        $stmt = $conn->prepare("insert into Registration(name, birthdate, phone, address, username, password)values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $birthdate, $phone, $address, $username, $password);
        $stmt->execute();
        echo "Signed Up";
        $stmt->close();
        $conn->close();
    }
?>